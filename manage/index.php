<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<center>
			<h2>王者英雄管理系统</h2>
			<br>
			<?php 
				$types=array("S"=>"射手","C"=>"刺客","Z"=>"战士","T"=>"坦克","F"=>"法师","A"=>"辅助");
				$sex = array("w" => "女", "m" => "男");					
				$name=empty($_GET["name"])?"":$_GET["name"];
				$type=empty($_GET["type"])?"":$_GET["type"];
				$sex_s=empty($_GET["sex"])?"":$_GET["sex"];
			?>
			<form action="index.php" method="get">           
				姓名：<input type="text" name="name" value="<?php echo $name?>">
				职业：
					<select name="type">
					  <option value ="" <?php echo ($type =="")?"selected":""?> >请选择</option>
					  <option value ="ss" <?php echo ($type =="ss")?"selected":""?>>射手</option>
					  <option value ="ck" <?php echo ($type =="ck")?"selected":""?>>刺客</option>
					  <option value="zs" <?php echo ($type =="zs")?"selected":""?>>战士</option>
					  <option value="tk" <?php echo ($type =="tk")?"selected":""?>>坦克</option>
					  <option value="fs" <?php echo ($type =="fs")?"selected":""?>>法师</option>
					  <option value="fz" <?php echo ($type =="fz")?"selected":""?>>辅助</option>
					</select>
				性别：
					<select name="sex">
					  <option value =""<?php echo ($sex_s == "")?"selected":""?>>请选择</option>
					  <option value ="m"<?php echo ($sex_s == "m")?"selected":""?>>男</option>
					  <option value ="w"<?php echo ($sex_s == "w")?"selected":""?>>女</option>
					</select>
				<input type="submit" value="搜索">            
            </form>
			<br>
			<table width="700" border="1">
				<tr>
					<th style="display:none;">id</th>
					<th>姓名</th>
					<th>职业</th>
					<th>性别</th>
					<th>操作</th>
				</tr>
				<?php					
					$condition="";
					$is_first=true;
					if($name!=""){
						$condition.="where name like '%{$name}%'";
						$is_first=false;
					}						
					if($type!=""){
						if(!$is_first){
							$condition.=" and type='{$types[$type]}'";
						}
						else
							$condition.="where type='{$types[$type]}'";
						$is_first=false;
					}
					if($sex_s!=""){
						if(!$is_first){
							$condition.=" and sex='{$sex_s}'";
						}
						else
							$condition.="where sex='{$sex_s}'";
						$is_first=false;
					}	
												
					$link = @mysqli_connect("localhost","root","","test") or die("数据库连接失败！");
					mysqli_set_charset($link,"utf8");
					
					if($condition=="")
						$sql = "select count(*) from wzry";
					else
						$sql = "select count(*) from wzry ".$condition;
					$result = mysqli_query($link,$sql);
					$row = mysqli_fetch_assoc($result);
					$datanum = $row["count(*)"];
					$page_size = 10;
					$page_num = ceil($datanum/$page_size);
					$page = empty($_GET["page"])?1:$_GET["page"];
					
					if($page > $page_num) {
						$page = $page_num;
					}
					if($page < 1) {
						$page = 1;
					}
					$limit = " limit ".($page - 1) * $page_size.",".$page_size;
					if($condition=="")
						$sql = "select * from wzry order by name".$limit;
					else
						$sql = "select * from wzry ".$condition.$limit;
					$result = mysqli_query($link,$sql);
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr align='center'>";
					    echo "<td style='display:none;'>{$row['id']}</td>";
					    echo "<td>{$row['name']}</td>";
						echo "<td>{$row['type']}</td>";
					    echo "<td>{$sex[$row['sex']]}</td>";
					    echo "<td><a href='delete.php?id={$row['id']}'>删除</a> | <a href='update.php?id={$row['id']}'>编辑</a></td>";
						echo "</tr>";
					}
					mysqli_free_result($result);
					mysqli_close($link);
				?>
			</table>
			<br>
			<a href='add.php'>添加英雄</a>
			<hr>
			<?php
				for($i = 1; $i <= $page_num; $i ++){
					echo "<a href='index.php?page={$i}&name={$name}&type={$type}&sex={$sex_s}'>{$i}</a>	";
				}
				echo "<br>";
				$next=$page+1;
				$pre=$page-1;
				echo "<a href='index.php?page={$pre}&name={$name}&type={$type}&sex={$sex_s}'>上一页</a>   <a href='index.php?page={$next}&name={$name}&type={$type}&sex={$sex_s}'>下一页</a>";			
			?>
		</center>
	</body>
</html>