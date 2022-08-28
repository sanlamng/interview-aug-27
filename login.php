<?php 

include 'appfunctions.php';

$page_keywords = "";
$page_description = "";
$page_title = "Login | " . site_name;
$main_content ="";
$ModalResponse = "";
$meta_keywords = "";
$meta_description = "";
$meta_title = "";


//login
if(isset($_POST["login"]) && $_POST["login"]=="1")
{
	$user = new User($connect);
	$crud = new Crud($connect);
	$redirect_to = isset($_GET["ref"]) ? $_GET["ref"] : "";
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$user_details = $user->logIn($username, $password);

	if(!$user_details)
	{
		$ModalResponse = "<h5 class='red-text darken-2'>Login failed</h5>
		Your username or password is incorrect. Please retry!";
	}
	else
	{
        session_regenerate_id();
	    $_SESSION["duid"] = $user_details[0]["id"];
		$_SESSION["customer_name"] = $user_details[0]["customer_name"];
	    $_SESSION["username"] = $user_details[0]["username"];
	    $_SESSION["allow_user"] = sitekey;
		$_SESSION["access_level"] = $user_details[0]["access_level"];
		$_SESSION["account_status"] = $user_details[0]["account_status"];
		
	    //update last login
	    $crud->update("users", "id", $user_details[0]["id"], array( "last_login"=> date("Y-m-d H:i:s")));
	    
	    
	   
		if($user_details[0]["account_status"]=="Barred") {
			$ModalResponse = "<h5 class='red-text darken-2'>Account Suspended</h5>
			Your account has been suspended. Contact the website admin via our our contact page to have your account unsuspended!";
		}
		else if($user_details[0]["account_status"]=="Pending") {
			header("Location: forgot-password");
		}
		else {
			if(!empty($redirect_to)) {
				header("Location: $redirect_to");
			}
			else  {
				header("Location: dashboard");
			}
		}
	}
	
}


//add content
ob_start();
include 'templates/frontend/login.html.php';
$main_content .= ob_get_clean();


include 'layout.html.php';