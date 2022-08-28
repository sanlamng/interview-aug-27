<?php 


include 'appfunctions.php';

$page_keywords = "password reset, forgot password";
$page_description = "Reset your password on " . site_name;
$page_title = "Forgot Password - ". site_name;
$main_content ="";
$ModalResponse = "";
$meta_keywords = "";
$meta_description = "";
$meta_title = "";

//forgot password
if(isset($_POST["check_email"]) && $_POST["check_email"]=="1"){
	
	$crud = new Crud($connect);
	$email = $_POST["email"];
	$userExists = $crud->select("users", "*", " email='$email' ");

	if(empty($userExists))
	{
		$ModalResponse = "<h5 class='red-text darken-2'>Email not found</h5>
		We are sorry, but it appears your email does not exist in our database. 
		Please check email and try again.";
	}
	else
	{
	    $_SESSION["changeEmail"] = true;
	    $_SESSION["userEmail"] = $email;
	    $_SESSION["firstName"] = $userExists[0]["firstname"];
	    $resetCode = $crud->generateTextPass(7);

	    $updatePassword = $crud->update("users", "email", $_SESSION["userEmail"], 
			array("reset_code"=> $resetCode)
		);

	    $to = $email;
	    $subject = "You requested a password change - " .$global_settings["site_name"];
	    $messsage = "Dear " . $_SESSION["firstName"]. 
        " You recently requested to change your password. Please enter the reset code below
        in the required page on our website. <br><Br>
	    <b>Reset Code:</b> $resetCode<bR><Br>
	    Thank you.<br><br>
	    ".$global_settings["site_name"]."<br>
	    ".$global_settings["website"];

	    $crud->sendMail($to, $subject, $messsage);

	    header("Location: change-password");
		

	}
}


//add content
ob_start();
include 'templates/frontend/forgot-password.html.php';
$main_content .= ob_get_clean();


include 'layout.html.php';