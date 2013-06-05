<?php
if(!$_SESSION['operator']){
    header('Location: '.$linkpath.$defaultpage);
    die();
}
$id=(int)@$_GET['id'];
$result=$db->query('select * from comenzi where cid='.$id);
if($result===false){
    header('Location: '.$defaultpage);
    die();
}
$rand=$result->fetch_array(MYSQL_ASSOC);
if($rand['preluata_de']){
    header('Location: comenzi');
    die();
}
$result->close();
$db->query("update comenzi set preluata_de=".$_SESSION['uid'].", status=1 where cid=$id;");
header('Location: comanda?id='.$id);
die();
