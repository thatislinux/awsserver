<?php
//session_start();
include('../connect.php');
$invoice = $_POST['invoice'];
$product_code = $_POST["product_code"];
$product_name = $_POST["product_name"];	
$customer_name = $_POST["customer_name"];
$unit = $_POST['unit'];
$qty = $_POST['qty'];
$tax_type = $_POST['tax_type'];
$tax = $_POST['tax'];
$date = $_POST['date1'];

if(isset($_POST['$total']) && !empty($_POST['$total'])) {
$total=$_POST['total'];	
}
else
{
	$total = 0;
}
if(isset($_POST['$tax_amount']) && !empty($_POST['$tax_amount'])) {
$total=$_POST['tax_amount'];	
}
else
{
	$tax_amount = 0;
}

$result = $db->prepare("SELECT * FROM customer WHERE customer_name= :customer_name");
$result->bindParam(':customer_name', $customer_name);
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
	$customer_name=$row['customer_name'];	
	$address=$row['address'];
}	

$result = $db->prepare("SELECT * FROM products WHERE product_name= :product_name");
$result->bindParam(':product_name', $product_name);
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
	$price=$row['price'];
	$product_code=$row['product_code'];
	$gen_name=$row['gen_name'];
	$product_name=$row['product_name'];

}

//edit qty
$sql = "UPDATE products 
        SET qty=qty-?
		WHERE product_code=?";
$query = $db->prepare($sql);
$query->execute(array($qty,$product_code));
$tax_amount=($price*$tax*$qty)/100;
$amount=$price*$qty;


$total=($tax_amount+$price)*$qty;
// query
$sql = "INSERT INTO sales_order (invoice,qty,tax,total,tax_amount,amount,product_name,price,customer_name,address,product_code,gen_name,date,tax_type,unit) VALUES (:invoice,:qty,:tax,:total,:tax_amount,:amount,:product_name,:price,:customer_name,:address,:product_code,:gen_name,:date,:tax_type,:unit)";
$q = $db->prepare($sql);
$q->execute(array(
':invoice'=>$invoice,
':qty'=>$qty,
':tax'=>$tax,
':total'=>$total,
':tax_amount'=>$tax_amount,
':amount'=>$amount,
':product_name'=>$product_name,
':price'=>$price,
':customer_name'=>$customer_name,
':address'=>$address,
':product_code'=>$product_code,
':gen_name'=>$gen_name,
':date'=>$date,
':tax_type'=>$tax_type,
':unit'=>$unit));


header("location: sales.php?invoice=$invoice");

?>
