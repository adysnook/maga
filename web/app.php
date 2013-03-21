<?php
$ms_s=microtime(true);
$baseurl='/';
$basedom=$_SERVER['SERVER_NAME'];
$script=$_SERVER['SCRIPT_NAME'];
$req=$_SERVER['REQUEST_URI'];
$linkpath='';
if(substr($req, 0, strlen($script))==$script){
    $req=substr($req, strlen($script));
    $linkpath=$script;
}
require_once('core/pages.php');
if(isset($page[$req]))
    $pag=$req;
else{
    header('Location: '.$linkpath.$defaultpage);
    die();
}
require_once('core/pages/'.$page[$pag]['file']);
require_once('core/template.php');
$ms_e=microtime(true);
echo '
<!-- Time: '.round(($ms_e-$ms_s)*1000).'ms -->';
?>