<?php
    //执行文件的删除操作
    
    //第一步：把ly.db中的内容读取出来
        $info = rtrim(file_get_contents("./ly.db"),"@");
    
    //第二步：把内容分割.结果为数组,一条条留言信息
        $list = explode("@",$info);
        // var_dump($list);
    //第三步：拿到需要删除留言信息的索引(下标)
        $key = $_GET["id"];
        echo $key;
    //第四部：使用unset来删除数据
        unset($list[$key]);
    
    //第五步：把删除过后剩下的数据再次写回ly.db中
       //删除过后有两种情况，一种是删除过后还有数据，
       if(empty($list)) {
          //另一种是删除之后就没有了。
          //如果没有信息，写入一个空字符串 
           file_put_contents("ly.db","");
       }else{
           //将剩余的信息写回去
           file_put_contents("ly.db",implode("@",$list))."@";
       }
    
    
    //第六部：跳转
      header("location:./index.php");
       
       
      
    