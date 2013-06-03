<?php
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
}
$continut.='
</table>
';
$continut.='<br>Total: '.$_SESSION['cos']['valoare'].' ron';
$continut.='
    <table>
    <form method="post" action="finalizare_validare">
    <tr><td colspan="2"><h1>Adresa de livrare</h1></td></tr>
    <tr><td style="float:right;">Nume:</td><td><input type="text" name="nume" required></td></tr>
    <tr><td style="float:right;">Prenume:</td><td><input type="text" name="prenume" required></td></tr>
    <tr><td style="float:right;">Adresa:</td><td><input type="text" name="adresa" required></td></tr>
    <tr><td style="float:right;">Telefon:</td><td><input type="text" name="telefon" required></td></tr>
    <tr><td style="float:right;">Email:</td><td><input type="email" name="email"></td></tr>
    <tr><td colspan="2"><input type="submit" value="Trimite comanda"></td></tr>
    </form>
    </table>
    </center>
';
