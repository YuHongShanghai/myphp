<?php
    // 这个文件的作用：用于接收add.php页面用户的留言信息，然后把接受到的信息存入ly.db中
    
    // 第一步：接收表单add.php的值
    
    // 因为add.php页面使用了post方式传输输出，这里使用$_POST接收
    // 定义一个数组，用来接收值
    $data = [];
    $data["title"] = $_POST["title"];
    $data["author"] = $_POST["author"];
    $data["contents"] = $_POST["contents"];
    
    // var_dump($data);
    
    
    // 第二步：把接收到的值在$data这个数组中，存入ly.db数据文件中
    
        // 第二步第一小步：处理$data这个数组中
            $info = implode("##",$data)."@";
            var_dump($info);
    
       // 第二步第二小步：把处理好的字符串写入ly.db
        file_put_contents("ly.db",$info,FILE_APPEND);
   //第三步：执行成功之后页面跳转
       header("location:./index.php");