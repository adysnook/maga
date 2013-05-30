<?php
if($_SESSION['admin']){
	$var=$db->query('select * from produse');
	$n=$var->num_rows;
	$continut='';
	for($i=1;$i<=$n;$i++){
		$rand=$var->fetch_array(MYSQL_ASSOC);
		$continut.='<div style="float:left;width:300px;"><a href="produs?id='.$rand['pid'].'">';
		$continut.=$rand['nume'].'<br>'.$rand['pret'].'<br><img src="img/produse/'.$rand['pid'].'" style="width:150px; height:150px;">';
		$continut.='<br> <a href="edit"><img src="img/edit.png" style="width:30px"> </a> <img src="img/delete.png" style="width:30px">';
		$continut.='</a></div>';
		}
	$continut.='<a href="add"><img src="img/add.png" style="float:left"/></a>';
}
else
{
	$var=$db->query('select * from produse');
	$n=$var->num_rows;
	$continut='';
	for($i=1;$i<=$n;$i++){
		$rand=$var->fetch_array(MYSQL_ASSOC);
		$continut.='<div style="float:left;width:300px;"><a href="produs?id='.$rand['pid'].'">';
		$continut.=$rand['nume'].'<br>'.$rand['pret'].'<br><img src="img/produse/'.$rand['pid'].'" style="width:150px; height:150px;">';
		$continut.='</a></div>';
		}
}

?>