<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>万年历</title>
	</head>
	<body>
		<center>
			<h2>万年历</h2>
			<hr>		
			<table width="700" border="1">
				<tr align="center">
					<th>星期日</th>
					<th>星期一</th>
					<th>星期二</th>
					<th>星期三</th>
					<th>星期四</th>
					<th>星期五</th>
					<th>星期六</th>
				</tr>
			
		<?php
			$year=empty($_GET["year"])?date("Y"):$_GET["year"];
			$month=empty($_GET["month"])?date("m"):$_GET["month"];
			$days=date("t",strtotime($year."-".$month));
			$week=date("w",strtotime($year."-".$month."-"."01"));
			$i=1;
			$j=$days+$week;
			echo "<h1>".$year."年".$month."月</h1>";
			while($i<=$j){
				if($i%7==1){
					echo "<tr align='center'>";
				}
				if($i-1<$week){
					echo "<td></td>";
				}else{
					echo "<td>".($i-$week)."</td>";
				}
				if($i%7==0){
					echo "</tr>";
				}	
				$i++;
			}
		?>
			</table>
			<br>
			<br>
		<?php
			$lastmonth=$month-1;
			$nextmonth=$month+1;
			$lastyear=$nextyear=$year;
			if($lastmonth<1){
				$lastmonth=12;
				$lastyear--;
			}
			if($nextmonth>12){
				$nextmonth=1;
				$nextyear++;
			}
			echo "<a href='calendar.php?month={$lastmonth}&year={$lastyear}'>上个月</a> | 
				  <a href='calendar.php?month={$nextmonth}&year={$nextyear}'>下个月</a>";
		?>
		</center>
	</body>
</html>
