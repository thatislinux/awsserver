
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><a href="index.php">Close</a>

<head>
	
<script src="https://use.fontawesome.com/e2d16502eb.js"></script>

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<style>
#page-wrap { width: 297mm; height:210mm; margin: 0 auto; }
td {
	font-size:12px;
}

@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}

body{
	
	
    font-family: 'Droid Sans', sans-serif;

}

</style>
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> 
</head>

<body>

	<div id="page-wrap" >
	
	<table width="100%" style="border:1px solid;" cellspacing="0" cellpadding="0">
	
	<tr>
	<td style="height:30px; border-bottom:1px solid;" valign="top">
	<h1 style="text-align:center; font-weight:bolder; text-transform:uppercase; margin-top:3px; margin-bottom:3px;"><b>Tax Invoice</b></h1>	
	</td>
	</tr>
	
	<tr>
	<td style="height:60px;" valign="top">
	
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td width="50%" style="height:60px; border-right:1px solid;">
		<p style="font-size:25px; font-weight:bolder; text-align:center;">TECHSAC TECHNOLOGY SOLUTIONS</p>
	</td>
	<td width="50%" style="height:60px;" valign="top">
	<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;">7th CROSS STREET, ATHULYA APARTMENT, ANNA NAGAR,  </p>
	<p style="text-align:center; font-weight:bold; margin-top:4px; margin-bottom:0px;">CHENNAI - 600038, TAMILNADU.</p>
	<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;"><i class="fa fa-phone" aria-hidden="true"></i> 044-257346, 9944319585, 981452658</p>
	<p style="text-align:center; font-weight:bold;  margin-top:4px; margin-bottom:4px;"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@phpnotebook.com | <i class="fa fa-globe" aria-hidden="true"></i> www.phpnotebook.com</p>	
	</td>
	</tr>
	</table>
	
	
	<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];

$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-$am;
}
}
?>
	
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td width="50%" style="border-top:1px solid; height:100px; border-right:1px solid; padding-left:10px;" valign="top">
	<!-- Invoice Details -->
	<table>
	<tr>
	<td style="height:25px;">GSTIN Number </td>
	<td>: 33RED557443P2Z6</td>
	</tr>
	<tr>
	<td style="height:25px;">Invoice Number </td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:25px;">Invoice Date</td>
	<td>:</td>
	</tr>
	</table>
	<!-- Invoice Details -->
	</td>
	<td width="50%" style="border-top:1px solid; padding-left:10px;" valign="top">
	<!-- Invoice Other Details -->
	<table >
	<tr>
	<td style="height:20px;">Transaction mode</td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:20px;">Vehicle Number  </td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:20px;">Date & Time Of Supply </td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:20px;">Place Of supply</td>
	<td>:</td>
	</tr>
	</table>
	<!-- Invoice Other Details -->
	</td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td width="50%" style="border-top:1px solid; height:25px; border-right:1px solid; background-color:#eaeaea; text-align:center;">Details of Receiver (Billed to)</td>
	<td width="50%" style="border-top:1px solid; background-color:#eaeaea; height:25px; text-align:center;">Details of consignee (Shipped to)</td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td width="50%" style="border-top:1px solid; height:110px; border-right:1px solid; padding-left:10px;" valign="top">
	<!--Billed To Details -->
	
	<table >
		<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
				    $row = $result->fetch(); {
				?>
	<tr>
	<td style="height:20px;">Name</td>
	<td>:<?php echo $row['customer_name']; ?></td>
	</tr>
	<tr>
	<td style="height:20px;">Address</td>
	<td>:<?php echo $row['address']; ?></td>
	</tr>
	
	<tr>
	<td style="height:20px;">State with State Code</td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:20px;">GSTIN Number</td>
	<td>:</td>
	</tr>
	<?php
		}
	?>
	</table>
	
	
	
	<!--Billed To Details -->
	</td>
	<td width="50%" style="border-top:1px solid; padding-left:10px;" valign="top">
	
	<!--Shipped To Details -->
	
	<table >
	<tr>
	<td style="height:20px;">Name</td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:20px;">Address</td>
	<td>:</td>
	</tr>
	
	<tr>
	<td style="height:20px;">State with State Code</td>
	<td>:</td>
	</tr>
	<tr>
	<td style="height:20px;">GSTIN Number</td>
	<td>:</td>
	</tr>
	</table>
	
	
	
	<!--Shipped To Details -->
	
	
	</td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;" width="3%">No</td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">Description of Goods</td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">HSN Code</td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">Quantity</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">RATE</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">TOTAL <br> (A)</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">CGST  (B)</td>
	</tr>
	<tr>
	<td width="30%" style="border-right:1px solid; height:20px;">%</td>
	<td width="70%">Amount</td>
	</tr>
	</table>
	
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">SGST (C)</td>
	</tr>
	<tr>
	<td width="30%" style="border-right:1px solid; height:20px;">%</td>
	<td width="70%">Amount</td>
	</tr>
	</table>
	
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:35px;">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
	<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">CGST  (D)</td>
	</tr>
	<tr>
	<td width="30%" style="border-right:1px solid; height:20px;">%</td>
	<td width="70%">Amount</td>
	</tr>
	</table>
	
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid; text-align:center; height:20px;">(A+B+C+D)  TOTAL</td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
		
	
		<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch();  $i++){
					
				?>
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"> </td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"><?php echo $row['name']; ?></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">897845</td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"><?php echo $row['qty']; ?></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"><?php $ppp=$row['price']; echo formatMoney($ppp, true); ?></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"><?php echo $row['tax_amount']; ?></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	

		
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;"><?php echo $row['tax']; ?></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;"><?php echo $row['tax']; ?></td>
	<td width="70%"><?php $df=$row['amount']; echo formatMoney($df, true);?></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:35px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;">-</td>
	<td width="70%">-</td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"><?php $df=$row['total']; echo formatMoney($df, true);?></td>
	</tr>
	</table>
	</td>
	</tr>
	
	

				
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"></td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"></td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"></td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"></td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"></td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"></td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"></td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"></td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"></td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"></td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%"></td>
	<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;"></td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="10%" style="border-top:1px solid;  text-align:center; height:30px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:30px;"></td>
	<td width="70%"></td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;"></td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid;  height:35px; text-align:center;" width="83%"></td>
	
	<td width="10%" style="border-top:1px solid;  text-align:center; height:20px;">
	<table width="100%" cellspacing="0" cellpadding="0">	
	<tr>
	<td width="30%" style="border-right:1px solid; height:35px;"></td>
	<td width="70%">Total</td>
	</tr>
	</table>
	</td>
	<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:20px;">
		<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(total) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(total)'];
					echo formatMoney($fgfg, true);
					}
					?></td>
	</tr>
	</table>
	</td>
	</tr>

	<?php
					}
				?>

	<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?>

	<tr>
	<td width="100%">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	<td style="border-top:1px solid; border-right:1px solid;  height:35px; padding-left:10px;" width="50%">
	<p style="text-align:left:">Note:</p>
	<p style="text-align:left:">1. Invoice Notes Show up Here</p>
	<p style="text-align:left:">2. Thank you for your Business</p>
	</td>
	
	<td width="50%" style="border-top:1px solid;  text-align:center; height:20px;">
	 
	</td>
	</tr>
	
	
	</table> 
	
	</div>
	
</body>
</html> 
