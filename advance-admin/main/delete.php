<?php
	include('../connect.php');
	$id=$_GET['id'];
	$product_code=$_GET['product_code'];
	echo $id;
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	//edit qty

       $result = $db->prepare("select qty,product_code from sales_order where transaction_id = :id");
				$result->bindParam(':id', $id);
				$result->execute();

	for($i=1; $row = $result->fetch(); $i++){
		
		echo $row['qty'];
		echo $row['product_code'];








	$sql = "UPDATE products 
			SET qty=qty+?
			WHERE product_code=?";
	$q = $db->prepare($sql);
         $q->execute(array($row['qty'],$row['product_code']));
}	
	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sales.php?invoice=$c");
?>
