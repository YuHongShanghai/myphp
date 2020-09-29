<?php
    //使用GD库绘制验证码
    //第一步：有一个画布
    $image = imagecreatetruecolor(120,40);
    
    //设置随机背景颜色并填充
    $bgcolor = imagecolorallocate($image,rand(170,255),rand(170,255),rand(170,255));
    imagefill($image,1,1,$bgcolor);
    
    //绘制验证码
    //验证码内容                                            
    $contents = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";
    for($i = 0; $i <4; $i ++) {
        $font = substr($contents,rand(0,strlen($contents) -1  ),1);
        
        $x = ((120/4) * $i) + 10;
        $y = 30;
        $jd = rand(-60,60);
        //设置验证码文字的颜色(随机)
        $fontcolor = imagecolorallocate($image,rand(0,100),rand(0,100),rand(0,100));
        //使用函数绘制验证码
        imagettftext($image,20,$jd,$x,$y,$fontcolor,"./simhei.ttf", $font);
    }
    //加一些干扰元素
    //加一些干扰点
    for($i = 0; $i <1000; $i ++) {
        $diancolor = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
        imagesetpixel($image,rand(0,120),rand(0,40),$diancolor);
    }
    //加干扰线
    for($i = 0; $i < 100; $i ++) {
         $linecolor = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
         imagearc($image,rand(-10,300),rand(-10,300),rand(10,300),rand(10,300),rand(0,80),rand(0,60),$linecolor);
    }
    //输出
    header("content-type:image/jpeg");
    imagejpeg($image);
    imagedestroy($image);