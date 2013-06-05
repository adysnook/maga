<?php
if(!$_SESSION['admin']){
    header('Location: '.$linkpath.$defaultpage);
    die();
}
$id=(int)(@$_GET['id']);
$result=$db->query("select * from `produse` where `pid`=$id");
if($result->num_rows!=1){
    header('Location: produse');
    die();
}
$rand=$result->fetch_array(MYSQL_ASSOC);
$nume=@$_POST['nume'];
$bucati_disponibile=(int)@$_POST['bucati_disponibile'];
$pret=(float)@$_POST['pret'];
$detalii=@$_POST['detalii'];
$preview=@$_POST['preview'];
if($nume!==null && $bucati_disponibile!==null && $pret!==null && $detalii!==null && $preview!==null){
    $db->query("update `produse` set `nume`='".mysql_real_escape_string($nume)."',
                                     `bucati_disponibile`=".$bucati_disponibile.",
                                     `pret`=".$pret.",
                                     `detalii`='".mysql_real_escape_string($detalii)."',
                                     `preview`='".mysql_real_escape_string($preview)."'
                where `pid`=$id");
    $result=$db->query("select * from `produse` where `pid`=$id");
    $rand=$result->fetch_array(MYSQL_ASSOC);
    $file=@$_FILES['poza'];
    if($file && $file['tmp_name']){
        require_once('core/image_process.php');
        myscale($file['tmp_name'], 'img/produse/'.$id.'.png', IMG_PNG, 500, null);
        myscale($file['tmp_name'], 'img/produse/'.$id.'_thumb.png', IMG_PNG, 150, 150);
        @unlink($file['tmp_name']);
    }
}
$continut='
<form method="post" enctype="multipart/form-data">
<center>
<h1>Editare produs</h1>
<img src="img/produse/'.$id.'.png" style="max-width:500px; float:left;"> 
<table>
	<tr>
		<td style="text-align:right; padding-right:25px;">Nume: </td>
		<td style="float:left;"> <input type="text" name="nume" value="'.$rand['nume'].'" required> </td>
	</tr>
	<tr>
		<td style="text-align:right; padding-right:25px;"> Bucati disponibile: </td>
		<td style="float:left;"> <input type="text" name="bucati_disponibile" value="'.$rand['bucati_disponibile'].'" required> </td>
	</tr>
	<tr>
		<td style="text-align:right; padding-right:25px;"> Pret: </td>
		<td style="float:left;"> <input type="text" name="pret" value="'.$rand['pret'].'" required> </td>
	</tr>
	<tr>
		<td style="text-align:right; padding-right:25px;"> Detalii: </td>
		<td style="float:left;"> <textarea name="detalii" cols="30" rows="8" required>'.$rand['detalii'].'</textarea> </td>
	</tr>
	<tr>
		<td style="text-align:right; padding-right:25px;"> Preview: </td>
		<td style="float:left;"> <textarea name="preview" cols="30" rows="5" required>'.$rand['preview'].'</textarea> </td>
	</tr>
    <tr>
        <td style="text-align:right; padding-right:25px;">Schimba poza:</td>
        <td style="float:left;"><input type="file" name="poza"></td>
    </tr>
	<tr>
        <td colspan="2"><input type="submit" value="  Editeaza  "></td>
    </tr>
</table>
</form>
</center>
';
