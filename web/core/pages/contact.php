<?php
if($_SESSION['admin']){
   $var=$db->query('SELECT * FROM  `mesaje` ');
   $continut='';
   $n=$var->num_rows;
   for($i=1;$i<=$n;$i++){
            $rand=$var->fetch_array(MYSQL_ASSOC);
            $continut.='
                <div style="float:left;width:200px;"><div style="float:left;">
                <br><p> Mesajele Primite:</br></p>
				<table align="center">
			    <tr>
				   <td>
				      '.$rand['mid'].'
				   </td>
				</tr>
				<tr>
				   <td>
				     Nume: '.$rand['nume'].'
				   </td>
				</tr>
				<tr>
				   <td>
				     Prenume: '.$rand['prenume'].'
				   </td>
				</tr>
				<tr>
				   <td>
				     Email: '.$rand['email'].'
				   </td>
				</tr>
				<tr>
				   <td>
				    Telefon:  '.$rand['telefon'].'
				   </td>
				</tr>
				<tr> 
				   <td>
				     Subiect: '.$rand['subiect'].'
				   </td>
				</tr>
				<tr>
				   <td>
				     Mesaj: '.$rand['mesaj'].'
					</td>
				</tr>
			  </table>	 
</div>			  
		</div>		       
';  
   }
//list messages

}else{
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
<br /><p>
Pentru intrebari, sugestii sau reclamatii va rugam sa folositi formularul de contact de mai jos. 
<br />
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
}
