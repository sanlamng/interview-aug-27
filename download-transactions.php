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


if(isset($_POST["download_record"]) && $_POST["download_record"]==1) {

    $fromDate = date_format(date_create_from_format('d/m/Y', $_POST["fromDate"]), 'Y-m-d');
    $toDate = date_format(date_create_from_format('d/m/Y', $_POST["toDate"]), 'Y-m-d');
    $download_format = $_POST["download_format"];

    $crud = new Crud($connect);
    $result = $crud->select(
        "transactions p", 
        " p.* ", 
        " user_id= '".$_SESSION["duid"]."' && date(p.payment_date) BETWEEN '$fromDate' AND '$toDate' ");

    if(!$result) {
        $ModalResponse = "<h5 class='red-text darken-2'>No Results Found!</h5>
		Your search did not yield any records and so the download failed! Please choose other date periods. ";
    }
    else {
        switch ($download_format) {
            case 'excel':
                    // Filter Customer Data
                    function filterCustomerData(&$str) {
                        $str = preg_replace("/\t/", "\\t", $str);
                        $str = preg_replace("/\r?\n/", "\\n", $str);
                        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
                        return $str;

                    
                    }

                    // File Name & Content Header For Download
                    $file_name = "customers_data.xls";
                    header("Content-Disposition: attachment; filename=\"$file_name\"");
                    header("Content-Type: application/vnd.ms-excel");

                    //To define column name in first row.
                    $column_names = false;
                    // run loop through each row in $customers_data
                    foreach($result as $row) {
                        if(!$column_names) {
                            echo implode("\t", array_keys($row)) . "\n";
                            $column_names = true;
                        }
                        array_walk($row, 'filterCustomerData');
                        echo implode("\t", array_values($row)) . "\n";
                    }
                    exit;
                break;
            
            case 'pdf':
                $ModalResponse = "<h5 class='red-text darken-2'>Format Unavailable</h5>
                The reqested format could not be downloaded at this time, please choose another. ";
                break;
            
            default:
                # code...
                break;
        }

    }



    
    
}

//add content
ob_start();
include 'templates/frontend/download-transactions.html.php';
$main_content .= ob_get_clean();


include 'layout2.html.php';