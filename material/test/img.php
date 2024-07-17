<?php
    header('Content-type:image/png');
    $resorce = imagecreatefrompng('D:/minfy.png');
 /*  $background = imagecolorallocate($resorce, 0,0,255);
    imagecolortransparent($resorce,$background);
    imagealphablending($resorce,false);
    imagesavealpha($resorce,true);
    imagepng($resorce);*/
    shell_exec('convert'.$resorce.'-fuzz 9 % -transparent "rbg(255,255,255)"'.$resorce);
?>