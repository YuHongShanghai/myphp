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
            <h3>查看留言</h3>
            <table width="350" border="1">
			<?php
				$concent = file_get_contents("ly.db");
				if($concent=="" ){
					die("<h2 style='font-size:70px;color:red'>亲没有留言，请去留言</h2>");
				}
				echo
				"<tr>
					<th>标题</th>
					<th>留言人</th>
					<th>内容</th>
					<th>操作</th>
				</tr>";
				$messages = explode("@",rtrim($concent,"@"));
				foreach($messages as $k=>$m){
					$meaasge=explode("##",$m);
					echo "<tr align='center'>";
					foreach($meaasge as $v){
						echo "<td>".$v."</td>";
					}
					echo "<td><a href='delete.php?index={$k}'>删除</a></td>";
					echo "</tr>";
				}
				
            ?>
           
            </table>
        </center>
    </body>
</html>