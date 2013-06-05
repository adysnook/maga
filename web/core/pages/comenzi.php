<?php
$comm=array('Nepreluata', 'In asteptare', 'Confirmata', 'In curs de livrare', 'Livrata');
if(!$_SESSION['operator']){
    header('Location: '.$linkpath.$defaultpage);
    die();
}
$var=$db->query('select `cid`, `nume`, `prenume`, `adresa`, `telefon`, `email`, (select sum(pret*cantitate) from produse join produse_comenzi using(pid) where cid=x.cid) total, `status` from `comenzi` x;');
$n=$var->num_rows;
$continut='
    <center>
    <table border="1">
        <tr>
            <td></td>
            <td> <b>Nume</b> </td>
            <td> <b>Prenume</b> </td>
            <td> <b>Adresa</b> </td>
            <td> <b>Telefon</b> </td>
            <td> <b>Email</b> </td>
            <td> <b>Valoare (RON)</b> </td>
            <td> <b>Status</b> </td>
        </tr>
';
for($i=1;$i<=$n;$i++){
        $rand=$var->fetch_array(MYSQL_ASSOC);
        $continut.='
        <tr>
            <td> <a href="comanda?id='.$rand['cid'].'" style="text-decoration:underline; color:red;">&raquo;Detalii&laquo;</a> </td>
            <td> '.$rand['nume'].' </td>
            <td> '.$rand['prenume'].' </td>
            <td> '.$rand['adresa'].' </td>
            <td> '.$rand['telefon'].' </td>
            <td> '.$rand['email'].' </td>
            <td> '.$rand['total'].' </td>
            <td> '.$comm[$rand['status']].' </td>
        </tr>
';
}
$continut.='
    </table>
    </center>
';
