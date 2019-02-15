<?php

require('fpdf181/fpdf.php');
require_once 'NTWIndia.php';
require_once './Exception/NTWIndiaInvalidNumber.php';
require_once './Exception/NTWIndiaNumberOverflow.php';
class PDF extends FPDF
{
	function Footer()
{
    // Go to 1.5 cm from bottom
    $pdf->SetY($pdf->GetPageHeight() - 20);
    // Select Arial italic 8
    $pdf->SetFont('Arial','',10);
    // Print centered page number
    $pdf->Cell(10,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
	$pdf->SetFont('Arial','',10);
}
}

$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$ntw = new \NTWIndia\NTWIndia();
$pdf->Footer();




//$pdf->Image('TTS.jpg',10,10,-300);

//set font 
$pdf->SetFont('Arial','B',25);

//Cell(width , height , text , border , end line , [align] )
//Rect(float x, float y, float w, float h [, string style])
$pdf->Rect(5,5,200,45);
$pdf->Cell(30,6,'',0,0);
$pdf->Cell(120,6,'Tharunika Enterprises',0,1,'C');
$pdf->Cell(189 ,5,'',0,1);//end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,5,'',0,0);
$pdf->Cell(140,5,'Selva Building,989,Thadagam Road,P.O.Box No.1137',0,1,'C');
$pdf->Cell(45,5,'',0,0);
$pdf->Cell(90,5,'R.S.Puram, Coimbatore - 641002',0,1,'C');
$pdf->Cell(30,5,'',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(16,5,'Phone:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,5,'9500981666',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(7,5,'',0,0);
$pdf->Cell(18,5,'E-Mail:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(80,5,'techsac@gmail.com',0,1);
$pdf->Cell(189 ,5,'',0,1);//end of line
$pdf->SetFont('Arial','B',13);
$pdf->Cell(43,5,'',0,0);
//$pdf->Ln(10);
$pdf->Cell(90,5,'GSTIN / UIN : 33BBMPS9894J1ZM',0,1,'C');
//Next 

$pdf->Ln(4);
$pdf->SetDrawColor(0);
$pdf->SetFillColor(200);
$pdf->SetTextColor(0);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',15);
$pdf->Rect(5,50,200,10,'DF');
$pdf->Cell(180,10,'TAX INVOICE',0,1,'C');

//

$con = mysqli_connect('localhost','root','Mer123tv#');
mysqli_select_db($con,'sales2');

//get invoices data
$query = mysqli_query($con,"select * from sales_order where	invoice = '".$_GET['invoice']."'");
$invoice = mysqli_fetch_array($query);

//Rect(float x, float y, float w, float h [, string style])
$pdf->Rect(5,60,200,40);
$pdf->Rect(5,60,100,40);
$pdf->SetFont('Arial','',10);
$pdf->SetX(5);
$pdf->Cell(80,5,'Billing To',0,0,'LT');
$pdf->SetY(65);
$pdf->Cell(80,5,$invoice['customer_name'],0,0,'LT');
$pdf->SetY(70);
$pdf->Cell(80,5,$invoice['address'],0,0,'LT');
$pdf->SetY(95);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,5,'GSTIN/UIN:XXXXXXXXXX',0,0,'LT');



$pdf->Rect(105,60,50,40);
$pdf->SetXY(105,60);
$pdf->Cell(30,5,'Invoice No',0,0,'LT');
$pdf->SetXY(125,75);
$pdf->Cell(20,5,$invoice['invoice'],0,0,'CT');
$pdf->SetXY(105,90);
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,10,'Buyers Order No/ Ref No',1,0,'CT');



$pdf->Rect(155,60,50,40);
$pdf->SetXY(155,60);
$pdf->Cell(30,5,'Dated',0,1,'LT');
$pdf->SetXY(155,60);
$pdf->Cell(50,15,$invoice['date'],1,1,'C');
$pdf->SetXY(155,75);
$pdf->Cell(50,15,'Dispatched Through',1,1,'LT');
$pdf->SetXY(155,90);
$pdf->Cell(50,10,'Dated',1,1,'L');



$pdf->Rect(5,100,200,30);
$pdf->Rect(5,100,100,30);
$pdf->SetFont('Arial','',10);
$pdf->SetX(5);
$pdf->Cell(80,5,'Shipping To',0,0,'LT');
$pdf->SetY(105);
$pdf->Cell(80,5,$invoice['customer_name'],0,0,'LT');
$pdf->SetY(110);
$pdf->Cell(80,5,$invoice['address'],0,0,'LT');
$pdf->SetFont('Arial','B',10);
$pdf->SetY(125);
$pdf->Cell(80,5,'GSTIN/UIN:XXXXXXXXXX',0,0,'LT');


$pdf->Rect(105,60,50,40);
$pdf->SetFont('Arial','',8);
$pdf->SetXY(105,100);
$pdf->Cell(50,10,'Despatch Document No:',1,0,'LT');
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Dated',1,1,'LT');
$pdf->SetXY(105,110);
$pdf->Cell(100,10,'Terms of Payment:',1,0,'LT');
$pdf->SetXY(105,120);
$pdf->Cell(100,10,'Terms of Delivery:',1,1,'LT');


//NEXT
//$pdf->Rect(5,120,200,100);
$pdf->SetXY(5,130);
$pdf->SetFont('Arial','B',10);




//LIST OF ITEMS

//RS-3093432
$pdf->SetAutoPageBreak(false);
$y_axis_initial = 25;

$row_height = 10;
$y_axis = $pdf->getY() + $row_height;


    // Data
   

$query = mysqli_query($con,"select product_name, product_code,qty,amount,price,tax_amount,tax,total,unit from sales_order where invoice='".$_GET['invoice']."'");
$inv=$_GET['invoice'];
$result = $con->prepare("SELECT tax FROM sales_order WHERE invoice=?");
$result->bind_param('s', $inv);
$result->execute();
$result->bind_result($tax_unit);
$result->fetch();

	
$header = array('Description of Goods', 'HSN/SAC', 'QTY', 'PRICE($)','PER','AMOUNT($)','CGST','SGST','TOTAL($)');
$w = array(50, 25, 10, 18,12,21,22.5,22.5,19);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'L');
    $pdf->Ln();
	
	
$l=0;
$max = 7;

$tblerow=140;
$i=1;
$pdf->SetFont('Arial','',10);
$Quant=0;
//$pdf->SetXY(5,135);
function drawColums(&$k1,&$pdf1,&$w1)
		{
			$k=$k1;
			$pdf=$pdf1;
			$w=$w1;
			for($j=0;$j<$k;$j++)
		{
				$pdf->SetX(5);
				$pdf->Cell($w[0],10,'','L');
				$pdf->Cell($w[1],10,'','L');
				$pdf->Cell($w[2],10,'','LR',0,'L');
				$pdf->Cell($w[3],10,'','LR',0,'L');
				$pdf->Cell($w[4],10,'','LR',0,'L');
				$pdf->Cell($w[5],10,'','LR');
				$pdf->Cell($w[6],10,'','LR');
				$pdf->Cell($w[7],10,'','LR',0,'R');
				$pdf->Cell($w[8],10,'','LR',0,'R');
				
				$pdf->Ln();
				
				
		}
		}
$tot_total=0;
$tax1_total=0;
$tax2_total=0;
$courier=0;
while($product = mysqli_fetch_array($query))
{
		if($l == $max)
		{
			$pdf->Cell(array_sum($w),0,'','T');
			$pdf->SetY($pdf->GetPageHeight() - 10);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(170,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
			
		}			
		if($l==$max)
		{
			$pdf->AddPage();
			$pdf->Ln(6);
			$pdf->SetX(5);
			//$pdf->SetY();
			for($b=0;$b<count($header);$b++)
			{
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell($w[$b],7,$header[$b],1,0,'C');
			}
			$pdf->SetFont('Arial','',10);
			//$total_page_no = $pdf->PageNo().'{nb}';
			//$pdf->Cell(100,100,$total_page_no,1,0,'C');
			
			$total_page_no = $pdf->PageNo().'{nb}';
			
			
			 if ($pdf->PageNo()  == 2 )
			{
				$max = 11;
			}

			if ($pdf->PageNo()  == 3 )
			{
				$max = $max - 6;
			}
			
			
			if ($pdf->PageNo()  == 4 )
			{
				$max = $max - 6;
			} 
			if ($pdf->PageNo() == 5 )
			{
				$max = $max - 6 ;
			}
			if ($pdf->PageNo() == 6 )
			{
				$max = $max - 6 ;
			}
			if ($pdf->PageNo() == 7 )
			{
				$max = $max - 6 ;
			}
			
			
			$max = $max + 6;
			
			$pdf->Ln();
			$y_axis = $y_axis + $row_height;
			$l = 0;
			
		//	$pdf->Line(5,$pdf->getY(),200,$pdf->getY());
		}
		
		//$pdf->SetY($y_axis);
		$pdf->SetX(5);
		$Quant = $Quant + $product['qty'];
        $pdf->Cell($w[0],15,$i.'. '.$product['product_name'],'LR');
        $pdf->Cell($w[1],15,$product['product_code'],'LR');
        $pdf->Cell($w[2],15,$product['qty'],'LR',0,'C');
        $pdf->Cell($w[3],15,$product['price'],'LR',0,'C');
		$pdf->Cell($w[4],15,$product['unit'],'LR',0,'C');
		$pdf->Cell($w[5],15,$product['amount'],'LR',0,'C');
        $pdf->Cell($w[6],15,($product['tax_amount']/2).'@'.($product['tax']/2).'%','LR',0,'C');
        $pdf->Cell($w[7],15,($product['tax_amount']/2).'@'.($product['tax']/2).'%','LR',0,'C');
        $pdf->Cell($w[8],15,$product['total'],'LR',0,'R');
		
		$pdf->Ln();
		
		$i=$i+1;
		$l= $l+1;
		$pdf->SetX(5);
		$y_axis = $y_axis + $row_height;
		$tot_total=$tot_total + $product['total'];
		$tax1_total=$tax1_total + $product['tax_amount']/2;
		$tax2_total=$tax2_total + $product['tax_amount']/2;
		
	}    
	$total_items=$i-1;
	if($i == 1)
	{
		$k=6;
		
		drawColums($k,$pdf,$w);
		$pdf->SetX(5);
		$pdf->Cell(array_sum($w),0,'','T');
		//$pdf->Ln();
		//$pdf->Ln();
		//$pdf->Ln();
		
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		$pdf->Line(5,$pdf->getY(),200,$pdf->getY());
	}
	if($i == 2)
	{
		$k=5;
		drawColums($k,$pdf,$w);
		$pdf->SetX(5);
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
	}
	if($i == 3)
	{
		$k=3;
		drawColums($k,$pdf,$w);
		$pdf->SetX(5);
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
	}
	if($i == 4)
	{
		$k=2;
		drawColums($k,$pdf,$w);
		$pdf->SetX(5);
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
	}
	if($i == 5)
	{
		$k=0;
		drawColums($k,$pdf,$w);
		$pdf->SetX(5);
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		//$pdf->SetY($pdf->GetPageHeight() - 10);
    	//$pdf->SetFont('Arial','I',8);
		//$pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');		
	}
	if($i == 7)
	{
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->SetY(228);
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		//$pdf->SetY($pdf->GetPageHeight() - 20);
    	//$pdf->SetFont('Arial','',10);
		//$pdf->Cell(170,10,'Page '.$pdf->PageNo(),0,0,'C');		
		$pdf->AddPage();
	}
	if($i == 6)
	{
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->SetY(212);
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		$pdf->AddPage();
	}
	if($i == 9)
	{
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		//$pdf->SetY(230);
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		//$pdf->AddPage();
	}
	if($i == 8)
	{
		$pdf->Cell(array_sum($w),0,'','T');
		//$pdf->Ln();
		//$pdf->Ln();
		$pdf->Ln();
		//$pdf->SetY(230);
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		$pdf->AddPage();
	}
	
	if($i > 9)
	{
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		//$pdf->SetY(230);
		$pdf->Cell(30,5,'Total Items:',0,0,'C');
		$pdf->Cell(4,5,$total_items,0,0,'C');
		$pdf->Cell(35,5,'Total QTY : ',0,0,'R');
		$pdf->Cell(10,5,$Quant,0,0,'R');
		$pdf->Cell(array_sum($w),0,'','T');
				//$pdf->SetY($pdf->GetPageHeight() - 10);
				//$pdf->SetFont('Arial','',10);
				//$pdf->Cell(170,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
		
	}
		$pdf->SetX(5);
		$height_of_cell = 90; // mm
		$page_height = 297.93; // mm (portrait letter)
		$bottom_margin = 0; // mm
		$space_left=$page_height-($pdf->GetY()+$bottom_margin); 
		//$pdf->Cell(100,5,$space_left,0,0,'R');
		if($space_left < 90)
		{
			$pdf->AddPage();
		}
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		$tot_total_final = 0;
		$tot_total_final = $tot_total + $tax1_total + $tax2_total;
		$pdf->Rect(5,220,200,38);
		$pdf->Rect(5,220,127,38);
		$pdf->SetFont('Arial','',10);
		$pdf->SetXY(5,220);
		$pdf->Cell(80,5,'Amount Chargeable in Words',0,0,'L');
		$pdf->SetXY(135,220);
		$pdf->Cell(30,5,'Total Amount:',0,0,'R');
		$pdf->Cell(30,5,$tot_total,0,1,'R');
		$pdf->Cell(90,5,$ntw->numToWord($tot_total_final),0,0);
		$pdf->SetXY(135,225);
		$pdf->Cell(30,5,'Total Tax Amount',0,0,'R');
		$pdf->Cell(30,5,$tax1_total + $tax2_total,0,1,'R');
		//$pdf->Line(175,240,205,240);
		$pdf->SetXY(135,232);
		$pdf->Cell(30,5,'Courier/Transport',0,0,'R');
		$pdf->Cell(30,5,$courier,0,1,'R');
		$pdf->SetXY(135,240);
		$pdf->Cell(30,5,'Round OFF',0,0,'R');
		$pdf->Cell(30,5,'0.00',0,1,'R');
		$pdf->Line(175,248,205,248);
		$pdf->SetXY(135,250);
		$pdf->SetFont('Arial','B',12);
		
		$pdf->Cell(30,5,'Total ($) :',0,0,'R');
		$pdf->Cell(30,5,$tot_total_final,0,1,'R');
		$pdf->Line(175,256,205,256);
		//Rect(float x, float y, float w, float h [, string style])



		//$pdf->Rect(5,230,200,60);
		$pdf->Rect(5,258,127,25);
		$pdf->SetXY(5,263);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(10,5,'Declaration:',0,0);



		$pdf->Rect(132,258,73,25);
		$pdf->SetXY(112,263);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(100,5,'For Tharunika Enterprises',0,1,'C');
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(100,5,'we declare that this invoice shows the actual price of the goods described and that',0,1);
		$pdf->Cell(60,2,'at particulars are true and correct',0,1);
	
		$pdf->SetY($pdf->GetPageHeight() - 10);
    	$pdf->SetFont('Arial','',10);
		$pdf->Cell(175,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');		
	
		$path = "C:\\Balaji\\";
		$pdf->Output('F',$path.'Invoice_'.$invoice['invoice'].'.pdf',true);	
		$pdf->Output('','','');			
		//header("Location: /Invoice_new.php?invoice="<?php echo $invoice['invoice']?>);
?>
