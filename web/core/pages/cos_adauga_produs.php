<?php
$id=@$_GET['id'];
$var=$db->query('select * from produse where pid='.$id,MYSQL_ASSOC);
if(!$var){
    header('Location: cos');
    die();
}
$rand=$var->fetch_array(MYSQL_ASSOC);
$ex=false;
for($i=0; $i<count($_SESSION['cos']['produse']); $i++)
    if($_SESSION['cos']['produse'][$i]['id']==$id){
        $ex=true;
        if($_SESSION['cos']['produse'][$i]['cant']<$rand['bucati_disponibile']){
            $_SESSION['cos']['produse'][$i]['cant']++;
            $_SESSION['cos']['total']++;
            $_SESSION['cos']['valoare']+=$rand['pret'];
            header('Location: cos');
            die();
        }else{
            $continut='Cantitatea disponibila pentru acest produs este '.$rand['bucati_disponibile'];
        }
        break;
    }
if(!$ex){
    $_SESSION['cos']['produse'][]=array('id'=>$id, 'nume'=>$rand['nume'], 'cant'=>1, 'pret'=>$rand['pret']);
    $_SESSION['cos']['total']++;
    $_SESSION['cos']['valoare']+=$rand['pret'];
    header('Location: cos');
    die();
}
