<?php
$nume=@$_POST['nume'];
$prenume=@$_POST['prenume'];
$adresa=@$_POST['adresa'];
$telefon=@$_POST['telefon'];
$email=@$_POST['email'];
if($nume && $prenume && $adresa && $telefon && $_SESSION['cos']['total']){
    $db->query("insert into `comenzi` values (null, '".mysql_real_escape_string($nume)."',
                                                       '".mysql_real_escape_string($prenume)."',
                                                       '".mysql_real_escape_string($adresa)."',
                                                       '".mysql_real_escape_string($telefon)."',
                                                       '".mysql_real_escape_string($email)."', null, 0);");
    $result = $db->query("select `cid` from `comenzi` where `nume`='".mysql_real_escape_string($nume)."' and
                                                           `prenume`='".mysql_real_escape_string($prenume)."' and
                                                           `adresa`='".mysql_real_escape_string($adresa)."' and
                                                           `telefon`='".mysql_real_escape_string($telefon)."' and
                                                           `email`='".mysql_real_escape_string($email)."'
 order by `cid` desc limit 1;");
    $cid=current($result->fetch_array(MYSQLI_NUM));
    $continut='
        <center>
        <table>
    ';
    for($i=0; $i<count($_SESSION['cos']['produse']); $i++){
        $produs=&$_SESSION['cos']['produse'][$i];
        $continut.='<tr>';
        $continut.='<td>'.$produs['nume'].'</td>';
        $continut.='<td>'.$produs['cant'].'x</td>';
        $continut.='<td>'.$produs['pret'].' ron</td>';
        $continut.='<td style="float:left;">= '.$produs['cant']*$produs['pret'].' ron</td>';
        $continut.='</tr>';
        $db->query("insert into `produse_comenzi` values (".$produs['id'].", ".$cid.", ".$produs['cant'].");");
    }
    $continut.='
    </table>
    ';
    $continut.='<br>Total: '.$_SESSION['cos']['valoare'].' ron';
    $continut.='
        <table>
        <tr><td colspan="2"><h1>Adresa de livrare</h1></td></tr>
        <tr><td style="float:right;">Nume:</td><td>'.$nume.'</td></tr>
        <tr><td style="float:right;">Prenume:</td><td>'.$prenume.'</td></tr>
        <tr><td style="float:right;">Adresa:</td><td>'.$adresa.'</td></tr>
        <tr><td style="float:right;">Telefon:</td><td>'.$telefon.'</td></tr>
        <tr><td style="float:right;">Email:</td><td>'.$email.'</td></tr>
        <tr><td colspan="2"><br>Comanda a fost inregistratata cu succes! un operator va va contactacta in cel mai scurt timp.</td></tr>
        </form>
        </table>
        </center>
    ';
    unset($_SESSION['cos']);
}else{
    header('Location: cos');
    die();
}
