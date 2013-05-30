<?php
if(@$_POST['nume']){
    $nume=@$_POST['nume'];
    $prenume=@$_POST['prenume'];
    $telefon=@$_POST['telefon'];
    $email=@$_POST['email'];
    $subiect=@$_POST['subiect'];
    $mesaj=@$_POST['mesaj'];
    $db->query("insert into `mesaje` values (null, '".mysql_real_escape_string($nume)
        ."', '".mysql_real_escape_string($prenume)."', '".mysql_real_escape_string($email)
        ."', '".mysql_real_escape_string($telefon)."', '".mysql_real_escape_string($subiect)
        ."', '".mysql_real_escape_string($mesaj)."');");
    $continut='Multumim pentru atentia acordata!';
}else{
    $continut='
Contact us! <br>
<br /><br />
<table align="center">
<form action="contact" method="post">
<tr>
<td>Nume*</td>
<td><input type="text" name="nume" size="30" required></td>
</tr>
<tr>
<td>Prenume*</td>
<td><input type="text" name="prenume" size="30" required></td>
</tr>
<tr>
<td>Telefon</td>
<td><input type="text" name="telefon" size="30"></td>
</tr>
<tr>
<td>E-mail*</td>
<td><input type="email" name="email" size="30" required></td>
</tr>
<tr>
<td>Subiect*</td>
<td><input type="text" name="subiect" size="30" required></td>
</tr>
<tr>
<td>Mesaj*</td>
<td><textarea cols="30" rows="5" name="mesaj" required></textarea></td>
</tr>
</table>
<input type="reset" value=" Reset " >
<input type="submit" value=" Trimite ">
* = obligatorii
</form>
';
}
