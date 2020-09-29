<?php 
	$id=$_GET["id"];
	$link = @mysqli_connect("localhost","root","","test") or die("数据库连接失败！");
	mysqli_set_charset($link,"utf8");
	$sql = "delete from wzry where id=$id";
	echo $sql;
	mysqli_query($link,$sql);
	if(mysqli_affected_rows($link) > 0 ) {
		header("location:index.php");
	}else{
		echo "删除失败！";
	}
	mysqli_close($link);

?>