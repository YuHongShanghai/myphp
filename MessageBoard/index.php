<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>文本式留言板</title>
    </head>
    <body>
        <?php
            include("./menu.php");
        ?>
        <center>
            <h3>浏览留言</h3>
                 <?php
                    //把ly.db中的数据读取出来，显示在表格中
                    //第一步：读取数据
                    $info = rtrim(file_get_contents("ly.db"),"@");
                    // echo $info;
                    //第二步:把去除了右边@符的字符串使用中间的@符拆分为一条一条留言
                    $list = explode("@",$info);
                    // var_dump($list);
                    //判断ly.db中是否有内容，没有内容输出友好提
                    if($list[0] === "") {
                        die("<h2 style='font-size:70px;color:red'>亲没有留言，请去留言</h2>");
                    }
                   ?>
                <table width="700" border="1">
                   <tr>
                    <th>标题</th>
                    <th>作者</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
                    <?php
                    
                    
                    //把$list 这个数组循环遍历输出到表格
                    foreach($list as $k => $v) {
                        //使用##把$list 循环出的数组对应的值$V，拆分出一个一个字符
                        $ly = explode("##",$v);
                        // var_dump($ly);
                        echo "<tr align='center'>";
                        echo "<td>{$ly[0]}</td>";
                        echo "<td>{$ly[1]}</td>";
                        echo "<td>{$ly[2]}</td>";
                        echo "<td><a href='delete.php?id={$k}'>删除</a></td>";
                        echo "</tr>";
                    }
                
                ?>
            </table>
        </center>
    </body>
</html>