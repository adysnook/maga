<?php
$continut='
    Cos de cumparaturi<br />
';
for($i=0; $i<count($_SESSION['cos']['produse']); $i++){
    $produs=&$_SESSION['cos']['produse'][$i];
    $continut.=$produs['nume'].'     cantitate: ';
    $continut.='<a href="cos_adauga_produs?id='.$produs['id'].'"><input type="button" value="&uarr;"></a> ';
    $continut.='<a href="cos_scade_produs?id='.$produs['id'].'"><input type="button" value="&darr;"></a>'.$produs['cant'].'  x ';
    $continut.=$produs['pret'].' ron = ';
    $continut.=$produs['cant']*$produs['pret'].' ron ';
    $continut.='<br>';
}
$continut.='<br>Total: '.$_SESSION['cos']['valoare'].' ron';
if($_SESSION['cos']['valoare'])
    $continut.='<br><a href="finalizare"><input type="button" value="Finalizeaza comanda"></a>';
