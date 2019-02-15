<?php
include('../connect.php');


$stmt=$db->prepare('select invoice,date,customer_name,address,amount,tax_amount,total from sales_order');
$stmt->execute();


$columnHeader ='';
$columnHeader = "InvoiceNo"."\t"."Transaction Date"."\t"."Customer Name"."\t"."Address"."\t"."TotalAmount"."\t"."TotalTax"."\t"."GrandTotal"."\t";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=SalesReport.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

?>