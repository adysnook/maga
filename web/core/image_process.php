<?php
function myscale($loadpath, $savepath, $toe, $maxw, $maxh){
    if(!(imagetypes() & $toe))
        return false;
    $imgtype2ext=array(IMG_GIF=>'gif', IMG_JPG=>'jpg', IMG_PNG=>'png', IMG_WBMP=>'bmp');
    $toext=$imgtype2ext[$toe];
    if(!($im=@imagecreatefromstring(@file_get_contents($loadpath))))
        return false;
    $fromw=imagesx($im);
    $fromh=imagesy($im);
    if($maxw==null)
        $maxw=$fromw;
    if($maxh==null)
        $maxh=$fromh;
    $tow=$fromw;
    $toh=$fromh;
    if($fromw>$maxw || $fromh>$maxh){
        $ratiow=$maxw/$fromw;
        $ratioh=$maxh/$fromh;
        $ratio=min($ratiow, $ratioh);
        $tow=$fromw*$ratio;
        $toh=$fromh*$ratio;
    }
    $im2=imagecreatetruecolor($tow, $toh);
    imagecopyresampled($im2, $im, 0, 0, 0, 0, $tow, $toh, $fromw, $fromh);
    imagepng($im2, __DIR__.'/../'.$savepath.'.'.$toext);
    imagedestroy($im2);
    imagedestroy($im);
    return true;
}
