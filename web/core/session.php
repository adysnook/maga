<?php
session_start();
if(!isset($_SESSION['user'])) $_SESSION['user']=false;
if(!isset($_SESSION['admin'])) $_SESSION['admin']=false;
if(!isset($_SESSION['operator'])) $_SESSION['operator']=false;
if(!isset($_SESSION['cos'])){
    $_SESSION['cos']=array();
    $_SESSION['cos']['produse']=array();
    $_SESSION['cos']['total']=0;
    $_SESSION['cos']['valoare']=0;
}
$cos_produse=$_SESSION['cos']['total'];
$cos_total=$_SESSION['cos']['valoare'];
if($_SESSION['user']!==false){
    $muser=$db->real_escape_string($_SESSION['user']);
    $mpass=$db->real_escape_string($_SESSION['pass']);
    $result = $db->query("SELECT * FROM `utilizatori` WHERE `username`='$muser' AND `password`='$mpass';");
    if($result->num_rows==1){
        $rand=$result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['admin']=(bool)$rand['admin'];
        $_SESSION['operator']=(bool)$rand['operator'];
    }else{
        require_once('core/pages/logout.php');
    }
    $result->close();
}
