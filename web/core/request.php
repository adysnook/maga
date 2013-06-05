<?php
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
