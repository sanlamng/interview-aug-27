<?php
/*
* AUTHOR LOG
* Project: Rave Drycleaners Website
* Started: April, 2022
* Authors: Sixtus Opara (sixtusopara@gmail.com)
* 
* Description: This page contains a link to all basic classes that enable data fetching
* All php page call this page to access the DB
*/


/*
=====================================================================
START SESSION
=====================================================================
*/
if(!isset($_SESSION)){
    session_start();
}
/*
=====================================================================
autoload all classses
=====================================================================
*/
spl_autoload_register(function($class_name){
	include 'classes/'.$class_name.'.php';
});



/*
=====================================================================
SET DEFAULT TIMEZONE OFFSET
=====================================================================
*/
date_default_timezone_set("Africa/Lagos");

/*
=====================================================================
INITIALIZE CONNECTION VARIABLE
=====================================================================
*/
$kc = new DB; 
$connect = $kc->getConn();


/*
=====================================================================
FETCH GLOBAL SETTINGS OF THE WEBSITE
=====================================================================
*/
$crud = new Crud($connect);
$user = (isset($_SESSION["duid"]) && !empty($_SESSION["duid"])) ? $_SESSION["duid"]: 0;
define("sitekey", md5("finx9512"));
define("site_name", "FinApp");
define("site_logo", "./assets/img/finapp-logo.png");
define("website", "www.finapp.com");

?>