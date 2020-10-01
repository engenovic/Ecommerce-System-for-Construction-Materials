<?php include 'inc/header.php';
include_once($filepath.'/../lib/Database.php'); ?>
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
 <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $cmrId = Session::get("cmrId");
    $insertOrder = $ct->orderProduct($cmrId);
    
    $delData = $ct->delCustomerCart();
    header("Location:success.php");
}
$sum=0;
  ?>
<style type="text/css">
.division{width:50%; float:left;}
.tblone{width: 95%; margin-right:15px; border:2px solid #ddd;}
.tblone tr td{text-align: justify;}
.tbltwo{float:right; text-align:left; width:40%; border:2px solid #ddd; margin-right:14px; margin-top: -4px; margin-right: 38px;}
.tbltwo tr td{text-align:justify; padding: 5px 10px;}
.ordernow{}
.ordernow a{width:200px; margin:20px auto 0; text-align: center; padding:5px; font-size:30px; display: block; background: #3C3B40; color: white; border-radius: 3px;}
</style>
				<?php 
            $id = Session::get("cmrId");
            $getData = $cmr->getCustomerData($id);
            if ($getData) {
                while ($result = $getData->fetch_assoc()) {
                    ?>
			
			<?php 
			     $Phone=$result['phone'];
						$Name= $result['name'];
						$city=$result['city'];
						$address=$result['address'];
						//echo $Phone.$Name.$city.$address;
				  // Send SMS to the Customer
   $messo="Dear $Name, your order was successfully placed.It will be delivered to $city, $address and payment shall be made on delivery. #YouOrderWeDeliver";
   require_once('SMS.php');
			?>
			<?php
                }
            } ?>	
			</div>			
		</div>
<style type="text/css">
.psuccess{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding:50px;}	
.psuccess h2{border-bottom: 1px solid #ddd; margin-bottom: 20px; padding-bottom: 10px;}	
.psuccess p{line-height:25px; font-size:18px; font-color:black;color:green;text-align: left; }
 </style>
<div class="main">
	<div class="content">
		<div class="section group">
		<div class="psuccess">
			<h2>Success</h2>		
			<p>Thanks for Your Purchase. Your Order was Successful.You should receive an SMS Confirmation shortly!. Check your order Status <a href="orderdetails.php">Here</a></p>			
		</div>
					
		</div>
	</div>
<?php include 'inc/footer.php'; ?>
