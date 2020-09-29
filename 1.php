<?php
	function sum($m){
		$result=0;
		for($i=1;$i<=$m;$i++)
			$result+=$i;
		return $result;
	}
	echo sum(10);
	echo "<br>";
	echo sum(20);
	echo "<br>";
	echo sum(50);
	echo "<br>";
?>
