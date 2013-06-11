<?php
$id=@$_GET['id'];
$var=$db->query('select * from produse where pid='.$id);
if(!$var || !$var->num_rows){
    header('Location: cos');
    die();
}
$rand=$var->fetch_array(MYSQL_ASSOC);
$ex=false;
for($i=0; $i<count($_SESSION['cos']['produse']); $i++)
    if($_SESSION['cos']['produse'][$i]['id']==$id){
        $_SESSION['cos']['produse'][$i]['cant']--;
        $_SESSION['cos']['total']--;
        $_SESSION['cos']['valoare']-=$rand['pret'];
        if(!$_SESSION['cos']['produse'][$i]['cant'])
            array_splice($_SESSION['cos']['produse'], $i, 1);
        header('Location: cos');
        die();
    }
$_SESSION['cos']['produse'][]=array('id'=>$id, 'nume'=>$rand['nume'], 'cant'=>1, 'pret'=>$rand['pret']);
$_SESSION['cos']['total']--;
$_SESSION['cos']['valoare']-=$rand['pret'];
header('Location: cos');
