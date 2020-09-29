<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>文本式留言板</title>
	</head>
	<body>
		<?php
			include("menu.php");
		?>
		<center>
			<h2>我要留言</h2>
			<form action="doadd.php" method="post">
				留言标题：<input type="text" name="title"><br><br>
				留言人：&nbsp&nbsp<input type="text" name="author"><br><br>
				留言内容：<textarea name="content" cols="25"rows="6"></textarea><br><br>
				<input type="submit" value="留言">
			</form>
		</center>
	</body>
</html>