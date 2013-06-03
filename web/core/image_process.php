<?php
function myscale($loadpath, $savepath, $toe, $tow, $toh){
    if($im=imagecreatefromstring(file_get_contents($loadpath));
    $scalen=array('w'=>imagesx($im), 'h'=>imagesy($im));
    if($tow==null)
        $tow=$scalen['w'];
    if($toh==null)
        $toh=$scalen['h'];
    $scalem=array('maxw'=>$tow, 'maxh'=>$toh);
    if($scalen['w']>$scalem['maxw'] || $scalen['h']>$scalem['maxh']){
        $scaler=array('rw'=>$scalem['maxw']/$scalen['w'], 'rh'=>$scalem['maxh']/$scalen['h']);
        $r=min($scaler['rw'], $scaler['rh']);
        $scalen=array('w'=>$scalen['w']*$r, 'h'=>$scalen['h']*$r);
    }
    $im2=imagecreatetruecolor($scalen['w'], $scalen['h']);
    imagecopyresampled($im2, $im, 0, 0, 0, 0, $scalen['w'], $scalen['h'], imagesx($im), imagesy($im));
    imagejpeg($im2, $savepath);
    imagedestroy($im2);
}
