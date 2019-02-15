<?php
	
	    $year = "%2018%";
        echo $year;
	    $con = mysql_connect('localhost','root','Mer123tv#');
		mysql_select_db('sales2');
		$result = "SELECT count(*) FROM sales_order WHERE date = :%year%";
		echo mysql_query($result,0);
		
		//$getID = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(*) FROM sales2 WHERE date = :%year%));
		//$userID = $getID['userID'];
		
		
		//$name = mysqli->query("SELECT count(*) FROM sales2 WHERE date = :%year%")->fetch_object()->name; 