<?php 

if(!isset($_SESSION))
{
    session_start();
}
if(empty($_SESSION["allow_user"]) || $_SESSION["allow_user"]!= sitekey )
{
    header("Location: login");
    die();
}
if($_SESSION["account_status"]=="3") {
    header("Location: login");
    die();
}
if($_SESSION["account_status"]=="1") {
    header("Location: forgot-password");
    die();
}
