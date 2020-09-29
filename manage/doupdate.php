<?php
	$types=array("ss"=>"射手","ck"=>"刺客","zs"=>"战士","tk"=>"坦克","fs"=>"法师","fz"=>"辅助");
	$name = $_POST["name"];
	$type = $_POST["type"];
	$sex = $_POST["sex"]; 
	
	$id = $_POST["id"];
	
	$link = mysqli_connect("localhost","root","","test") or die("数据库连接失败");
	mysqli_set_charset($link,"utf8");	
	//准备修改的sql语句
	$sql = "update wzry set name='{$name}',type='{$types[$type]}', sex='{$sex}' where id ={$id}";
	mysqli_query($link,$sql);
	if(mysqli_affected_rows($link) > 0){
		//进行页面跳转
		header("location:index.php");
	}else{
		echo "修改失败";
	}
	mysqli_close($link);
?>