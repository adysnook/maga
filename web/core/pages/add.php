<?php
if(!$_SESSION['admin']){
    header('Location: '.$linkpath.$defaultpage);
    die();
}
$nume=@$_POST['nume'];
$bucati_disponibile=(int)@$_POST['bucati_disponibile'];
$pret=(float)@$_POST['pret'];
$detalii=@$_POST['detalii'];
$preview=@$_POST['preview'];
$file=@$_FILES['poza'];
if($nume && $bucati_disponibile && $pret && $detalii && $preview && $file && $file['tmp_name']){
    require_once('core/image_process.php');
    if(myscale($file['tmp_name'], $file['tmp_name'], IMG_PNG, null, null)){
        $db->query("insert into `produse` values (null, '".mysql_real_escape_string($nume)."',
            ".$bucati_disponibile.", ".$pret." , '".mysql_real_escape_string($detalii)."',
            '".mysql_real_escape_string($preview)."');");
        $result=$db->query("select `pid` from `produse` where `nume`='".mysql_real_escape_string($nume)."' order by 1 desc limit 1;");
        $id=$result->fetch_array(MYSQL_ASSOC);
        $id=$id['pid'];
        myscale($file['tmp_name'], 'img/produse/'.$id.'.png', IMG_PNG, 500, null);
        myscale($file['tmp_name'], 'img/produse/'.$id.'_thumb.png', IMG_PNG, 150, 150);
        @unlink($file['tmp_name']);
        header('Location: produs?id='.$id);
        die();
    }else{
        @unlink($file['tmp_name']);
        die('unbelievable error');
    }
}
$continut='
<p>
	ADAUGARE PRODUS
</p>
<form method="post" enctype="multipart/form-data">
<table align="center">
	<tr>
		<td> Nume </td>
		<td> <input type="text" name="nume" required> </td>
	</tr>
    <tr>
        <td> Bucati disponibile </td>
        <td> <input type="number" name="bucati_disponibile" required> </td>
    </tr>
	<tr>
		<td> Pret </td>
		<td> <input type="text" name="pret" required> </td>
	</tr>
	<tr>
		<td> Detalii </td>
		<td> <textarea name="detalii" required></textarea> </td>
	</tr>
	<tr>
		<td> Preview </td>
		<td> <textarea name="preview" required></textarea> </td>
	</tr>	
	<tr>
        <td> Poza </td>
        <td> <input type="file" name="poza" required> </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="  Adauga  ">
        </td>
    </tr>
</table>
</form>
';
