<?php
if($_SESSION['admin']){
	
	
}
else

{
$continut='
	<br /><p>
		Pentru intrebari, sugestii sau reclamatii va rugam sa folositi formularul de contact de mai jos. 
	<br />
		<a style="text-decoration:blink">!!! Toate campurile sunt obligatorii !!! </a></p>
	<br />
		<table align="center">
			<tr>
				<td>Nume</td>
				<td><input type="text" size="30" /></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" size="30"/></td>
			</tr>
			<tr>
				<td>Subiect</td>
				<td><input type="text" size="30" /></td>
			</tr>
			<tr>
				<td>Mesaj</td>
				<td><textarea cols="30" rows="5"></textarea></td>
			</tr>
		</table>
	<input type="button" value=" Reset " />
	<input type="button" value=" Trimite " />
	';
}
?>