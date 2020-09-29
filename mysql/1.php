<?php
	$link=@mysqli_connect("localhost","root","");
	if($link)
		echo "数据库连接成功";
	else
		echo "数据库连接失败";
?>