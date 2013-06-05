<?php
$id=(int)@$_GET['id'];
$var=$db->query('select * from produse where pid='.$id.';');
$continut='';
if($var===false){
    header('Location: '.$defaultpage);
    die();
}
$rand=$var->fetch_array(MYSQL_ASSOC);
$page_title=$rand['nume'].' ('.$rand['pret'].' lei)';
$continut='
        <center><h1>'.$rand['nume'].'</h1><h2>'.$rand['pret'].' lei</h2></center>
        <img src="img/produse/'.$id.'.png" style="max-width:500px; float:left;">
';
if($rand['bucati_disponibile'])
    $continut.='
            <a href="cos_adauga_produs?id='.$id.'">
            <input type="button" value="Adauga in cos" style="width:200px; height:30px; font-size:16px; color:#448844; float:right;">
            </a>
';
else
    $continut.='<input type="button" value="Indisponibil" style="width:200px; height:30px; font-size:16px; color:#dd4444; float:right;" disabled>';
$continut.='<br><br><div style="text-align:left;">'.$rand['detalii'].'</div>';
