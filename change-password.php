<?php 

include 'appfunctions.php';

$page_keywords = "password reset, forgot password";
$page_description = "Reset your password on " . site_name;
$page_title = "Change Password - ". site_name;
$main_content ="";
$ModalResponse = "";
$meta_keywords = "";
$meta_description = "";
$meta_title = "";

//change password
if(isset($_SESSION["changeEmail"] ) && isset($_POST["change_password"] )
&& ($_SESSION["changeEmail"] == true ) && $_POST["change_password"]=="1" ){

	$crud = new Crud($connect);
	//check reset code
	$resetCodeAccurate = $crud->select("users", "*",  " reset_code ='".$_POST["resetcode"]."' ");
	if(empty($resetCodeAccurate)){
		$ModalResponse = "<h5 class='red-text darken-2'>Invalid reset code</h5>
			The reset code you entered is invalid, 
			please enter correct code and try again.";
	}
    else if($resetCodeAccurate[0]["account_status"]=="3") {
        $ModalResponse = "<h5 class='red-text darken-2'>Failed</h5>
			Your account is suspended";
    }
	else {
		$password = $_POST["password"];
		$password = password_hash($password, PASSWORD_DEFAULT);

		$updatePassword = $crud->update("users", "email", $_SESSION["userEmail"], 
			array("password"=> $password, "account_status" => "2")
		);

	    $to = $_SESSION["userEmail"];
	    $subject = "Your password was changed successfully - " .website;
	    $message = "Dear ". $_SESSION["firstName"] .
        "	<br><br> This email is to notify you that your password was changed 
            successfully on the ".site_name." Website.<br><br>
	    	".site_name."<br>
	    	".website."
	    ";

	    $crud->sendMail($to, $subject, $message);
	    unset($_SESSION["firstName"], $_SESSION["userEmail"], $_SESSION["changeEmail"]);

	    $ModalResponse = "<h5 class='green-text darken-2'>Password changed successfully</h5>
			Your password has been changed successfully";

		
	}
	
}


//resend password
if(isset($_POST["reset_now"]) && $_POST["reset_now"]=="yes"){
	
	$crud = new Crud($connect);
    $email = $_SESSION["userEmail"];
    $firstname = $_SESSION["firstName"];
    $resetCode = $crud->generateTextPass(7);

    $updatePassword = $crud->update("users", "email", $_SESSION["userEmail"], 
        array("reset_code"=> $resetCode)
    );

    $to = $email;
    $subject = "You requested a password change - " .site_name;
    $messsage = "Dear " . $firstname. 
    " You recently requested to change your password. Please enter the reset code below
    in the required page on our website. <br><Br>
    <b>Reset Code:</b> $resetCode<bR><Br>
    Thank you.<br><br>
    ".site_name."<br>
    ".website;

    $crud->sendMail($to, $subject, $messsage);

    $ModalResponse = "<h5 class='green-text darken-2'>Code sent successfully</h5>
    Your reset code has been sent to your email successfully";

	
}

//add content
ob_start();
include 'templates/frontend/change-password.html.php';
$main_content .= ob_get_clean();


include 'layout.html.php';