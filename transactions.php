<?php 

include 'appfunctions.php';
include 'login-checker.php';

$page_keywords = "";
$page_description = "";
$page_title = "Invoices | " . site_name;
$main_content ="";
$ModalResponse = "";
$meta_keywords = "";
$meta_description = "";
$meta_title = "";

$crud = new Crud($connect);
$user_id = $_SESSION["duid"];
$customer_records = $crud->select("transactions p", " p.* ", " p.user_id ='$user_id' ", " p.id DESC ");
$admin_records = $crud->select("transactions p", " p.* ", "", " p.id DESC ");

//add content
ob_start();
include 'templates/frontend/transactions.html.php';
$main_content .= ob_get_clean();


include 'layout2.html.php';