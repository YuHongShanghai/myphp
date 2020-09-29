<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <center>
			<h2>王者英雄管理系统</h2>
			<br>
            <h3>添加英雄</h3>
            <table width="350" border="0">
            <form action="doadd.php" method="post">
            <tr>
                <td>姓名：</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>职业：</td>
                <td>
					<select name="type">
					  <option value ="ss" selected>射手</option>
					  <option value ="ck">刺客</option>
					  <option value="zs">战士</option>
					  <option value="tk">坦克</option>
					  <option value="fs">法师</option>
					  <option value="fz">辅助</option>
					</select>
				</td>
            </tr>
            <tr>
                <td>性别：</td>
                <td>男：<input type="radio" name="sex" value="m" checked>
					女：<input type="radio" name="sex" value="w"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="确认添加"></td>
            </tr>
            </form>
            </table>
        </center>
    </body>
</html>