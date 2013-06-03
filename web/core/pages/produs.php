<?php
$id=@$_GET['id'];
$var=$db->query('select * from produse where pid='.$id,MYSQL_ASSOC);
$continut='';
if($var!=false){
    $rand=$var->fetch_array(MYSQL_ASSOC);
    $continut.='<img src="img/produse/'.$rand['pid'].'" style="width:100px; height:100px;">';
    $continut.='<br>'.$rand['nume'].'<br>'.$rand['pret'].' ron<br>'.$rand['detalii'];
    $continut.='<br><a href="cos_adauga_produs?id='.$id.'"><input type="button" value="Adauga in cos"></a>';

    $page_title=$rand['nume'].' ('.$rand['pret'].' lei)';
$continut='
<center>
<h1>'.$rand['nume'].'</h1><h2>'.$rand['pret'].' lei</h2></center>
<img src="img/produse/'.$id.'" style="width:500px; height:500px; float:left;">'.
'<a href="cos_adauga_produs?id='.$id.'" style="float:right;">'.
'<input type="button" value="Adauga in cos" style="width:200px; height:30px; font-size:16px;">'.
'</a><br><br><div style="text-align:left;">'.$rand['detalii'].'</div>';
}else{
    header('Location: '.$defaultpage);
}
