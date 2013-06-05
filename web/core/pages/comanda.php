<?php
$comm=array('Nepreluata', 'In asteptare', 'Confirmata', 'In curs de livrare', 'Livrata');
if(!$_SESSION['operator']){
    header('Location: '.$linkpath.$defaultpage);
    die();
}
$id=(int)@$_GET['id'];
$result=$db->query('select * from comenzi where cid='.$id,MYSQL_ASSOC);
if($result===false){
    header('Location: '.$defaultpage);
    die();
}
$newstatus=(int)@$_POST['status'];
if(1<=$newstatus && $newstatus<=4){
    $result->close();
    $db->query("update comenzi set status=$newstatus where cid=$id;");
    header('Location: comanda?id='.$id);
    die();
}
$rand=$result->fetch_array(MYSQL_ASSOC);
$continut='
    <center>
    <table><tr><td><table border="1">
        <tr><td colspan="2">Detalii Comanda</td></tr>
        <tr>
            <td>ID</td><td><b>'.$rand['cid'].'</b></td>
        </tr>
        <tr>
            <td>Nume</td><td><b>'.$rand['nume'].'</b></td>
        </tr>
            <td>Prenume</td><td><b>'.$rand['prenume'].'</b></td>
        </tr>
        <tr>
            <td>Adresa</td><td><b>'.$rand['adresa'].'</b></td>
        </tr>
        <tr>
            <td>Telefon</td><td><b>'.$rand['telefon'].'</b></td>
        </tr>
        <tr>
            <td>Email</td><td><b>'.$rand['email'].'</b></td>
        </tr>
    </table></td><td><table border="1">
        <tr>
            <td colspan="100%">Produse</td>
        </tr>
        <tr>
            <td></td>
            <td>ID<br>Produs</td>
            <td>Nume</td>
            <td>Cantitate<br>disponibila</td>
            <td>Descriere scurta</td>
            <td>Pret</td>
            <td>Cantitate<br>in<br>comanda</td>
            <td>Valoare<br>totala (cantitate x pret)</td>
        </tr>
';
$comanda=$rand;
$result->close();
$result=$db->query("select * from produse join produse_comenzi using(pid) where cid=$id;");
$suma=0;
for($i=1; $i<=$result->num_rows; $i++){
    $rand=$result->fetch_array(MYSQLI_ASSOC);
    $continut.='
        <tr>
            <td><a href="produs?id='.$rand['pid'].'" style="text-decoration:underline; color:red;">&raquo;Detalii&laquo;</a></td>
            <td><b>'.$rand['pid'].'</b></td>
            <td><b>'.$rand['nume'].'</b></td>
            <td><b>'.$rand['bucati_disponibile'].'</b></td>
            <td><b>'.$rand['preview'].'</b></td>
            <td><b>'.$rand['pret'].'</b></td>
            <td><b>'.$rand['cantitate'].'</b></td>
            <td><b>'.($rand['pret']*$rand['cantitate']).'</b></td>
        </tr>
';
    $suma+=$rand['pret']*$rand['cantitate'];
}
$continut.='
        <tr>
            <td colspan="100%">Valoare totala '.$suma.' RON</td>
        </tr>
    </table>
    </td></tr></table>
    <br><br>
';
if($comanda['status'] && $comanda['preluata_de']==$_SESSION['uid']){
    $continut.='
    Aceasta comanda este preluata de tine<br>
    <form method="post"><table><tr><td>
    Setare status comanda: </td><td><select name="status"><option value="0" disabled>'.$comm[0].'</option>';
    for($i=1; $i<=4; $i++)
        $continut.='<option value="'.$i.'"'.($comanda['status']==$i?' selected':'').'>'.$comm[$i].'</option>';
    $continut.='
    <input type="submit" value="Schimba"></td></tr></table></form>
';
}else if($comanda['status']){
    $continut.='
    Aceasta comanda a fost preluata deja de un operator
';
}else{
    $continut.='
    <a href="preia?id='.$id.'" style="font-size:28px; text-decoration:underline; color:red;">&raquo;Preia Comanda&laquo;</a>
';
}
$continut.='
    </center>
';