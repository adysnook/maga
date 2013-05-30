<?php
$id=@$_GET['id'];
$var=$db->query('select * from produse where pid='.$id,MYSQL_ASSOC);
$continut='';
if($var!=false){
    $rand=$var->fetch_array(MYSQL_ASSOC);
    $continut.='<img src="img/produse/'.$rand['pid'].'" style="width:100px; height:100px;">';
    $continut.='<br>'.$rand['nume'].'<br>'.$rand['pret'].' ron<br>'.$rand['detalii'];
    $continut.='<br><a href="cos_adauga_produs?id='.$id.'">Adauga in cos</a>';
}else{
    header('Location: '.$defaultpage);
}
