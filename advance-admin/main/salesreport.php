<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TTS</title>
    <link rel="shortcut icon" href="images/TTS.jpg">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TECHSAC</a>
            </div>

            <div class="header-right">

              
                <a href="../index.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="TTS.jpg" class="img-thumbnail" />

                            <div>
                                Annapoorna layout,</div>
                            
                                   <div> Coimbatore. 
                            </div>
                        </div>

                    </li>


                    <li>
                        <a href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"  class="active-menu-top"><i class="fa fa-desktop "></i>Master <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level collapse in">
                            <li>
                                <a href="customer.php"><i class="fa fa-toggle-on"></i>Customer</a>
                            </li>
                            <li>
                                <a href="supplier.php"><i class="fa fa-bell "></i>Suppliers</a>
                            </li>
                             <li>
                                <a href="products.php"><i class="fa fa-circle-o "></i>Item</a>
                            </li>
                             <li>
                                <a href="Tax.php"><i class="fa fa-code "></i>Tax</a>
                            </li>
                             <li>
                                <a href="cat.php"><i class="fa fa-bug "></i>Store group</a>
                            </li>
                             <!--<li>
                                <a href="wizard.html"><i class="fa fa-bug "></i>Wizard</a>
                            </li>
                             <li>
                                <a href="typography.html"><i class="fa fa-edit "></i>Typography</a>
                            </li>
                             <li>
                                <a href="grid.html"><i class="fa fa-eyedropper "></i>Grid</a>
                            </li>-->
                            
                           <?php
include 'InvNoGen.php';
$finalcode=generateInvoiceno();
$invoice = $finalcode;
//printf("Invoide value in index.php is %s",$invoice);

?>
                        </ul>
                    </li>
                     <li>
                        <a href="sales.php?invoice=<?php echo $invoice; ?>"><i class="fa fa-coffee"></i>Invoice Creation</a>
                         <ul class="nav nav-second-level">
                            <li>
                                 <a href="sales.php?invoice=<?php echo $invoice; ?>"><i class="fa fa-coffee"></i>Invoice Creation</a>
                            </li>
                            <li>
                                <!--<a href="editinvoice.php"><i class="fa fa-flash "></i>Invoice View & Edit</a>-->
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bicycle "></i>sales <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="salesreport.php"><i class="fa fa-flash "></i>Sales report </a>
                            </li>
                        </ul>
                    </li>
                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"><i class="icon-bar-chart"></i> Sales Report</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
<?php
	//require_once('auth.php');
?>
<head>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<!--<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
</head>

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
			<ul class="breadcrumb">
			
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>

<form action="salesreport.php" method="post">
<center><strong>From : <input type="text" style="width: 223px; height:35px; color:#222;" name="d1" class="tcal" placeholder="" value="" /> To: <input type="text" style="width: 223px; height:35px; color:#222;" name="d2" class="tcal"  placeholder="" value="" />



 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>



<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">


</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="13%"> Invoice Number </th>
			<th width="13%"> Transaction Date </th>
			<th width="20%"> Customer Name </th>
			<th width="16%"> Address </th>
			<th width="18%"> Total Amount </th>
			<th width="13%"> Total Tax </th>
			<th width="13%"> Grand Total </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				 include('../connect.php');
				 
        $total_sales = 0;
				$result = $db->prepare("SELECT distinct (invoice),date,customer_name,address,total_amount_invoice,total_tax_invoice,total_grand_invoice FROM sales_order where date between :a and :b order by invoice");
				
				//$date1 = "2018-06-09";
				//$date2 = "2018-06-20";
				
				if(isset($_POST['d1']) && !empty($_POST['d1'])) 
				
				{
					$date1 = $_POST['d1'];	
				}else
				{
				$date1 = date("Y-m-d");	
				}
				
				if(isset($_POST['d2']) && !empty($_POST['d2'])) 
				{
					$date2 = $_POST['d2'];	
				}else
				{
				$date2 = date("Y-m-d");	
				}			
				$date1 = strtotime($date1);
				$date2 = strtotime($date2);
				
				$date1 = date("Y-m-d",$date1);
				$date2 = date("Y-m-d",$date2);
				
				$result->execute(array(':a'=>$date1,':b'=>$date2));
			$total_sales=0;	
				for($i=0; $row = $result->fetch(); $i++){
			?>
			
			<tr class="record">
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['customer_name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<?php 
			//Add a function to sum the total for this invoice id
			//Write DB call and sum the results then display here
			?>
			<td><?php echo $row['total_amount_invoice']; ?></td>
			<td><?php
			$dsdsd=$row['total_tax_invoice'];
			echo formatMoney($dsdsd, true);
			?></td>
			<td><?php
			$zxc=$row['total_grand_invoice'];
			echo formatMoney($zxc, true);
			?></td>
			</tr>
			<?php
				$total_sales+= $dsdsd + $zxc + $row['total_amount_invoice'];
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="5" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
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
     		?>
			</th>
				<th colspan="2" style="border-top:1px solid #999999">
			<?php 
					echo formatMoney($total_sales,true);
				?>
		
				</th>
		</tr>
	</thead>
</table>
</div>
<a href="export-book.php">
<button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> Export to Excel</button></a>
<div class="clearfix"></div>
</div>
</div>
                            


<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</div>
</div>
</div>

<div id="footer-sec">
        &copy; 2014 TECHSAC TECHNOLOGY SOLUTIONS | Design By : <a href="http://www.info@techsac.in/" target="_blank">info@techsac.in</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>



</body>
</html>
