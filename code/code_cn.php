<?php
    $image = imagecreatetruecolor(150,50);
    $bgcolor = imagecolorallocate($image,rand(170,255),rand(170,255),rand(170,255));
    imagefill($image,1,1,$bgcolor);
    
    $chars=explode(" ",file_get_contents("chinese.txt"));                                            
    $n=count($chars);
    for($i = 0; $i <4; $i ++) {
        $char = $chars[rand(0,$n-1)];        
        $x = ((120/4) * $i) + 10;
        $y = 35;
        $jd = rand(-30,30);
        $charcolor = imagecolorallocate($image,rand(0,100),rand(0,100),rand(0,100));
        imagettftext($image,20,$jd,$x,$y,$charcolor,"./simhei.ttf",$char);
    }
    
    for($i = 0; $i <500; $i ++) {
        $pointcolor = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
        imagesetpixel($image,rand(0,150),rand(0,50),$pointcolor);
    }
    
    for($i = 0; $i < 30; $i ++) {
         $linecolor = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
         imagearc($image,rand(-10,300),rand(-10,300),rand(10,300),rand(10,300),rand(0,80),rand(0,60),$linecolor);
    }
	
    header("content-type:image/jpeg");
    imagejpeg($image);
    imagedestroy($image);