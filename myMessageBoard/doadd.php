<?php
	$message=[];
	$message["title"]=$_POST["title"];
	$message["author"]=$_POST["author"];
	$message["content"]=$_POST["content"];
	$info = implode("##",$message)."@";
    file_put_contents("ly.db",$info,FILE_APPEND);
	header("location:./show.php");
?>