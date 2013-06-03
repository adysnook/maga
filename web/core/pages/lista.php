<?php
    $var=$db->query('select * from `produse` where `bucati_disponibile`>0');
    $n=$var->num_rows;
    $continut='';
if($_SESSION['admin']){
    for($i=1;$i<=$n;$i++){
            $rand=$var->fetch_array(MYSQL_ASSOC);
            $continut.='
                <div style="float:left;width:200px;"><div style="float:left;">
                <a href="edit?id='.$rand['pid'].'"><img src="img/edit.png" style="width:30px; border:0px;"></a></div>
                <a href="produs?id='.$rand['pid'].'">'.$rand['nume'].'<br>'.$rand['pret'].' ron
                <br><img src="img/produse/'.$rand['pid'].'" style="width:150px; height:150px;"></a></div>
';
    }
    $continut.='
                <div style="float:left;width:200px;">
                <a href="add"><br>
                <br><img src="img/add.png" style="width:150px; height:150px; border:0px;"></a></div>
';
}else{
    for($i=1;$i<=$n;$i++){
            $rand=$var->fetch_array(MYSQL_ASSOC);
            $continut.='<div style="float:left;width:200px;"><a href="produs?id='.$rand['pid'].'">';
            $continut.=$rand['nume'].'<br>'.$rand['pret'].' ron<br><img src="img/produse/'.$rand['pid'].'" style="width:150px; height:150px;">';
            $continut.='</a></div>';
    }
}
