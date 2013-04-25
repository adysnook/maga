<?php
$id=@$_GET['id'];
$var=$db->query('select * from produse where pid='.$id,MYSQL_ASSOC);

if($var!=false)
{$rand=$var->fetch_array(MYSQL_ASSOC);
 $continut='nume'.$rand['nume'].$rand['pret'].$rand['detalii'];
}
else{ 
//header('Location: '.$defaultpage);
}