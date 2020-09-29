<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <center>
			<?php 
				$id=$_GET["id"];
				$link = mysqli_connect("localhost","root","","test") or die("数据库连接失败");
				mysqli_set_charset($link,"utf8");
				$sql = "select * from wzry where id = {$id}";
				$result = mysqli_query($link,$sql);
				$row = mysqli_fetch_assoc($result);
				//var_dump($row);
				mysqli_free_result($result);
				mysqli_close($link);
			?>
			<h2>王者英雄管理系统</h2>
			<br>
            <h3>编辑英雄</h3>
            <table width="350" border="0">
            <form action="doupdate.php" method="post">
			<tr>
				<input type="hidden" name="id" value="<?php echo $row["id"]?>">
			</tr>
            <tr>
                <td>姓名：</td>
                <td><input type="text" name="name" value="<?php echo $row["name"]?>"></td>
            </tr>
            <tr>
                <td>职业：</td>
                <td>
					<select name="type">
					  <option value ="ss" <?php echo ($row['type'] == "射手")?"selected":""?> >射手</option>
					  <option value ="ck" <?php echo ($row['type'] == "刺客")?"selected":""?> >刺客</option>
					  <option value="zs" <?php echo ($row['type'] == "战士")?"selected":""?> >战士</option>
					  <option value="tk" <?php echo ($row['type'] == "坦克")?"selected":""?> >坦克</option>
					  <option value="fs" <?php echo ($row['type'] == "法师")?"selected":""?> >法师</option>
					  <option value="fz" <?php echo ($row['type'] == "辅助")?"selected":""?> >辅助</option>
					</select>
				</td>
            </tr>
            <tr>
                <td>性别：</td>
                <td>
					男：<input type="radio" name="sex" value="m" <?php echo ($row['sex'] == "m")?"checked":""?>>
					女：<input type="radio" name="sex" value="w" <?php echo ($row['sex'] == "w")?"checked":""?>>
				</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="确认修改"></td>
            </tr>
            </form>
            </table>
        </center>
    </body>
</html>