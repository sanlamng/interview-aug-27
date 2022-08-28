<?php 
include 'appfunctions.php';

$crud = new Crud($connect);

$main_content ="";
$ModalResponse = "";
$meta_keywords =  "";
$meta_description = "";
$meta_title = "Sign Up | " . site_name;


//register
if(isset($_POST["register"]) && $_POST["register"]=="1")
{
	$user_utilities = new User($connect);
	$password = $_POST["password"];
	$customer_name = $_POST["customer_name"];
	$phone =  $_POST["phone"];
	$username  = $_POST["username"];
	$dob = date("Y-m-d", strtotime($_POST["dob"]));
	$added_on = date("Y-m-d H:i:s");
	$account_status = "active";


	if(empty($customer_name) || empty($phone) || empty($username) || empty($dob) ){
		$ModalResponse = "<h4 class='red-text'>Incomplete Details</h4>
		<p class='black-text'>Sorry! it appears you have left out some required fields. 
		Please fill them in.</p>";
	}
	else {
		$newSignup = $user_utilities->signUp("users", "password", $password, "username", $username, [
			"customer_name" => $customer_name,
			"phone" => $phone,
			"dob" => $dob,
			"added_on" => $added_on,
			"account_status" => $account_status 
		]);

		if(!$newSignup)
		{
			$ModalResponse = "<h4 class='red-text'>User already exists</h4>
					<p class='black-text'>Sorry! The username you entered is already in use by another customer. 
					Please choose another.</p>";
		}
		
		else
		{
			//send welcome message to user

			session_regenerate_id();
			$_SESSION["duid"] = $newSignup;
			$_SESSION["username"] = $username;
			$_SESSION["customer_name"] = $customer_name;
			$_SESSION["allow_user"] = sitekey;
			$_SESSION["account_status"] = $account_status;
			$_SESSION["last_login"] = date("Y-m-d H:i:a");
			
			$ModalResponse = '
				<h5 class="green-text">Congratulations '.$customer_name.'</h5>
				<p class="black-text">
					Your signup to '.site_name. ' was successful. Click the link below to login" <br>

					<a href="dashboard" class="blue-action-button waves-effect waves-light" 
					style="color:#fff;">Sign in to Dashbaord</a>
				</p>
			';
	
		}
	}
	
	
}


//add content
ob_start();
include 'templates/frontend/signup.html.php';
$main_content .= ob_get_clean();


include 'layout.html.php';