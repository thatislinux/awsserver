<?php

function generateInvoiceno() {
	

$mysqli = new mysqli("localhost", "root", "Mer123tv#", "sales2");
$yr = date("Y");
//$yr = '2017';
//printf("%s \t",$yr."\n");
//echo "<br>";


$year = '%' . $yr . '%';
if ($stmt = $mysqli->prepare("SELECT count(*) FROM sales_order WHERE year like ?")) {

    /* bind parameters for markers */
    $stmt->bind_param('s', $year);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($count);

    /* fetch value */
    $stmt->fetch();
	
	//printf("count: %s \n", $count);
	
    /* close statement */
    $stmt->close();
}

if ($count > 0)
	{
				if ($stmt = $mysqli->prepare("SELECT max(invoice) FROM sales_order WHERE year like ?")) {

			/* bind parameters for markers */
			$stmt->bind_param('s', $year);

			/* execute query */
			$stmt->execute();

			/* bind result variables */
			$stmt->bind_result($maxinv);

			/* fetch value */
			$stmt->fetch();
			
			/* close statement */
			$stmt->close();
			//echo "<br>";
			//printf("Current maximum invoice: %s \n", $maxinv."\n");
			//echo "<br>";
			$nextInv = $maxinv + 1;
			//printf("Next Invoice No is : %s", $nextInv."\n");
		}
	}
	else
	{
		//echo "<br>";
		//printf("There is no invoice in this year"."\n");
		//echo "<br>";
		//printf("Creating new Invoice for this year"."\n");
		//echo "<br>";
		$nextInv = 1;
	}
	
	return $nextInv;
}
$genInvNo = generateInvoiceno();
//echo "<br>";
//printf("Generated Invoice No: %s" , $genInvNo);

//echo date("Y-m-d");
	





?>
