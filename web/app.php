<?php
$ms_s=microtime(true);
$baseurl='/';
$basedom=$_SERVER['SERVER_NAME'];
$script=$_SERVER['SCRIPT_NAME'];
$req=$_SERVER['REQUEST_URI'];
$qs=$_SERVER['QUERY_STRING'];
$linkpath='';
if(substr($req, 0, strlen($script))==$script){
    $req=substr($req, strlen($script));
    $linkpath=$script;
}
if(strlen($qs))
	$req=substr($req, 0, -strlen($qs));
if($req[strlen($req)-1]=='?')
	$req=substr($req, 0, -1);
require_once('core/pages.php');
if(isset($page[$req]))
    $pag=$req;
else{
    header('Location: '.$linkpath.$defaultpage);
    die();
}
require_once('core/db.php');
require_once('core/session.php');
if(!isset($_SESSION['admin'])) $_SESSION['admin']=false;
if(!isset($_SESSION['cos'])){
    $_SESSION['cos']=array();
    $_SESSION['cos']['produse']=array();
    $_SESSION['cos']['total']=0;
    $_SESSION['cos']['valoare']=0;
}
$cos_produse=$_SESSION['cos']['total'];
$cos_total=$_SESSION['cos']['valoare'];
$page_title=$page[$pag]['title'];
require_once('core/pages/'.$page[$pag]['file']);
require_once('core/template.php');
$ms_e=microtime(true);
echo '
<!-- Time: '.round(($ms_e-$ms_s)*1000).'ms -->';
