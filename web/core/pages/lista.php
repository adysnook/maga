<?php
$var=$db->query('select * from produse');
$n=$var->num_rows;
$continut='';
for($i=1;$i<=$n;$i++){
    $rand=$var->fetch_array(MYSQL_ASSOC);
	$continut.='<div style="float:left;width:300px;"><a href="produs?id='.$rand['pid'].'">';
    $continut.=$rand['nume'].'<br>'.$rand['pret'].'<br><img src="img/produse/'.$rand['pid'].'" style="width:100px; height:100px;">';
	$continut.='</a></div>';
	}
