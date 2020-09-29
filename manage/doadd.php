<?php 
	$types=array("ss"=>"射手","ck"=>"刺客","zs"=>"战士","tk"=>"坦克","fs"=>"法师","fz"=>"辅助");
	$name=$_POST["name"];
	$type = $types[$_POST["type"]];
	$sex = $_POST["sex"]; 
	
	$link = mysqli_connect("localhost","root","","test") or die("数据库连接失败！");
	mysqli_set_charset($link,"utf8");
	$sql = "insert into wzry values(null,'{$name}','{$type}','{$sex}')";
	mysqli_query($link,$sql);
	if(mysqli_insert_id($link) > 0 ) {
		header("location:index.php");
	}else{
		echo "添加失败！";
	}
	mysqli_close($link);
	
?>