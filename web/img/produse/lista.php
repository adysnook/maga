<?php
$var=$db->query('select * from produse');
$n=$var->num_rows;
$continut='';
for($i=1;$i<=$n;$i++){
$continut.='<div>';
    $rand=$var->fetch_array(MYSQL_ASSOC);
    $continut.='nume:'.$rand['nume'].'<br>'.$rand['pret'].'<br>';
$continut.='</div>';
	}
?>