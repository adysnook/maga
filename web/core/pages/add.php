<?php
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
        <td> <input type="file" required> </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="  Adauga  ">
        </td>
    </tr>
</table>
</form>
';