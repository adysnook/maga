<?php
$var=$db->query('select * from produse',MYSQL_ASSOC);
$n=$var->num_rows;
$continut='';
for($i=1;$i<=$n;$i++){
    $rand=$var->fetch_array(MYSQL_ASSOC);
    $continut.='nume:'.$rand['nume'].$rand['pret'];	
	}
?>