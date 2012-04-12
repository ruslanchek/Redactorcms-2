<?php
    header('Content-type: image/png');

    $text = $_GET['text'];
    $font_size = 8;

    $size = imagettfbbox($font_size, 0, $_SERVER['DOCUMENT_ROOT']."/arial.ttf", $text);
    $image = imagecreatetruecolor(abs($size[2]) + abs($size[0]) + 1, abs($size[7]) + abs($size[1]));
    imagesavealpha($image, true);
    imagealphablending($image, false);

    $tlo = imagecolorallocatealpha($image, 255, 255, 255, 127);
    imagefill($image, 0, 0, $tlo);

    $napis = imagecolorallocate($image, 255, 255, 255);
    imagettftext($image, $font_size, 0, 0, abs($size[5]), $napis, "arial.ttf", $text);

    $iii = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'].'/resources/img/marker.png');

    imagesavealpha($iii, true);
    imagealphablending($iii, true);

    $centering_offset_x = (23/2) - abs($size[2]/2);

    if($_GET['text'] != ''){
        imagecopy($iii, $image, $centering_offset_x, 7, 0, 0, abs($size[2]) + abs($size[0]) + 1, abs($size[7]) + abs($size[1]));
    };

    imagepng($iii);
    imagedestroy($iii);
    imagedestroy($image);
?>