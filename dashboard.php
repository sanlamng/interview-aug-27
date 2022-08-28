<?php 

include 'appfunctions.php';
include 'login-checker.php';

$page_keywords = "";
$page_description = "";
$meta_title = "Dashboard | " . site_name;
$main_content ="";
$ModalResponse = "";
$meta_keywords = "";
$meta_description = "";
$meta_title = "";

$crud = new Crud($connect);
$user_id = $_SESSION["duid"];

// $pending_pickups = $crud->select("orders", " COUNT(id) as total ", " garment_status IN ('pending_pickup', NULL) ");
// $pending_pickups = $pending_pickups[0]["total"];

// $customer_pending_pickups = $crud->select("orders", " COUNT(id) as total ", " garment_status ='pending_pickup' && generated_by <> 0 && phone='$phone' ");
// $customer_pending_pickups = $customer_pending_pickups[0]["total"];

// $offline_orders = $crud->select("orders", " COUNT(id) as total ", " order_type ='agent_generated' && generated_by = 0 ");
// $offline_orders = $offline_orders[0]["total"];

// $pending_deliveries = $crud->select("orders", " COUNT(id) as total ", " garment_status ='pending_delivery' ");
// $pending_deliveries = $pending_deliveries[0]["total"];

// $customer_pending_deliveries = $crud->select("orders", " COUNT(id) as total ", " garment_status ='pending_delivery' && phone='$phone' ");
// $customer_pending_deliveries = $customer_pending_deliveries[0]["total"];

// $customers = $crud->select("users", " COUNT(id) as total ", " access_level ='3' ");
// $customers = $customers[0]["total"];

$wallet_balance = $crud->select("users", " wallet_balance as total ", " id ='$user_id' ");
$wallet_balance = $wallet_balance[0]["total"];

// $referral_wallet_balance = $crud->select("users", " referral_wallet_balance as total ", " id = '$user_id' ");
// $referral_wallet_balance = $referral_wallet_balance[0]["total"];


// $withdrawals = $crud->select("transactions", " count(id) as total ", " status = 'pending' && transaction_type = 'withdraw' ");
// $withdrawals  = $withdrawals[0]["total"];




//add content
ob_start();
include 'templates/frontend/dashboard.html.php';
$main_content .= ob_get_clean();


include 'layout2.html.php';