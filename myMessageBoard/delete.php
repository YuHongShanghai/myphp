<?php	
	$info = rtrim(file_get_contents("./ly.db"),"@");
    $list = explode("@",$info);
	$index = $_GET["index"];
	unset($list[$index]);
	if(empty($list)){
		file_put_contents("ly.db","");
	}
	else{
		file_put_contents("ly.db",implode("@",$list)."@");
	}
	header("location:show.php");
?>