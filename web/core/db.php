<?php
require_once('config.php');
$db = @new mysqli(db_host, db_user, db_pass, null, db_port);
if($db->connect_errno){
    die('Connect Error ('.$db->connect_errno.') '.$db->connect_error);
}
if(!$db->select_db(db_name)){
    if($db->query("CREATE SCHEMA IF NOT EXISTS `".db_name."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;")===false)
        die('Unable to create database');
    if(!$db->select_db(db_name))
        die('Database not found');
}
$init=true;
if($result = $db->query("SELECT `varvalue` FROM `settings` WHERE `varname`='version';")){
    if($result->num_rows==1 && $result->field_count==1){
        $vers=current($result->fetch_array(MYSQLI_NUM));
        if($vers==db_vers)
            $init=false;
        else
            die('Database version mismatch');
    }
    $result->close();
}
unset($vers);
unset($result);
if($init){
    require('db/maga.php');
    foreach($install_query as $q)
        if($db->query($q)===false)
            die('Database creation error');
	$db->query("INSERT INTO `settings` VALUES ('version', '".db_vers."');");
}
unset($install_query);
unset($init);
?>