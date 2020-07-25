<?php

	session_start();
	include'includes/db.php';
	if(isset($_GET['chk_item_id']))
	{
		$date=date('Y-m-d h:i:s');
		$rand_num=mt_rand();
		if( isset( $_SESSION['ref']))
		{
			
		}
		else
		{
			$_SESSION['ref']=$date.'_'.$rand_num;
		}
		$chk_sql="INSERT INTO checkout (chk_item,chk_ref,chk_timing,chk_qty) VALUES	('$_GET[chk_item_id]','$_SESSION[ref]','$date' , 1)";
		if(mysqli_query($conn,$chk_sql))
		{
			?><script>window.location = "buy.php"; </script> <?php
		}
		
	}
	if(isset($_POST['order_submit']))
	{
		$name=mysqli_real_escape_string($conn,strip_tags($_POST['name']));
		$email=mysqli_real_escape_string($conn,strip_tags($_POST['email']));
		$dob=mysqli_real_escape_string($conn,strip_tags($_POST['dob']));
		$number=mysqli_real_escape_string($conn,strip_tags($_POST['number']));
		$city=mysqli_real_escape_string($conn,strip_tags($_POST['city']));
		$address=mysqli_real_escape_string($conn,strip_tags($_POST['address']));
		$order_ins_sql="INSERT INTO orders (order_name,order_email,order_dob,order_contact_number,
		order_city,order_delivery_address,order_checkout_ref,order_total) 
		VALUES ('$name','$email','$dob','$number','$city','$address',' $_SESSION[ref]','$_SESSION[grand_total]') " ;
		mysqli_query($conn,$order_ins_sql);
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
        <link rel="stylesheet" href="css\bootstrap.css">
        <link rel="stylesheet" href="css\all.css">
		<link rel="stylesheet" href="css\style.css">
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>
		<script>
			function ajax_func() {
					xmlhttp= new XMLHttpRequest();
					
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
							document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open('GET', 'buy_process.php', true);
					xmlhttp.send();
			}
			
			function del_func(chk_id) {
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) 	{
						document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
					}
				}
					xmlhttp.open('GET', 'buy_process.php?chk_del_id='+chk_id, true);
					xmlhttp.send();
			}
			function up_chk_qty(chk_qty,chk_id)
			{
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) 	{
						document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'buy_process.php?up_chk_qty='+chk_qty+'&up_chk_id='+chk_id, true);
					xmlhttp.send();
			}
			
		    
		</script>
	</head>
	<body onload="ajax_func();">
		<?php include 'includes/header.php' ;?>
		<br>
		<div class="container">
			<div class="page-header">
				<h2 class="float-left">Checkout</h2>
				
				<div class="float-right"><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#proceed_modal" data-backdrop="static">Proceed</button></div>
				<div id="proceed_modal" class="modal fade">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h4>User Details</h4>
								<button class="close" data-dismiss="modal" >&times;</button>
							</div>
							<div class="modal-body">
								<form class="form" method="POST">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" id="name" name="name" class="form-control" placeholder="Full Name" >
									</div>
									<div class="form-group">
										<label for="email">Email Id</label>
										<input type="email" id="email" name="email" class="form-control" placeholder="Email" >
									</div>
									<div class="form-group">
										<label for="dob">Date Of Birth</label>
										<input type="date" id="dob" name="dob" class="form-control" placeholder="Date Of Birth" >
									</div>
									<div class="form-group">
										<label for="number">Contact Number</label>
										<input type="number" id="number" name="number" class="form-control" placeholder="Contact Number" >
									</div>
									<div class="form-group">
										<label for="city">City</label>
										<input list="cities" name="city" class="form-control">
										<datalist id="cities">
											<option>Lucknow</option>	
											<option>Mahendra Garh</option>
											<option>Delhi</option>
											<option>Rewari</option>
											<option>Narnaul</option>
											<option>Yamunanagar</option>
											<option>Noida</option>
											<option>Banaras</option>
											<option>Kurukshetra</option>
											<option>Jhajjar</option>
											<option>Sirsa</option>
										</datalist>
									</div>
									<div class="form-group">
										<label for="address">Delivery Address</label><br>
										<textarea placeholder="Delivery Address" name="address" class="form-control" required></textarea>
									</div>
									<div class="row">
										<div class="col-md-3">
										<div class="form-group">
											<input type="submit" name="order_submit" class="btn btn-info btn-lg">
										</div>
										</div>
										<div class="col-md-6"></div>
										<div class="col-md-3">
										<div class="float-right">
											<button class="btn btn-danger btn-lg float-right" data-dismiss="modal">Close</button>
										</div>
										</div>
									</div>
								</form>
								
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<br><br><br>
			<div class="panel panel-default" >
				<div class="panel-heading"><b>Order Details</b><hr></div>
				<div class="panel-body">
				
					<div id="get_processed_data"></div>
						<!--the buy process area -->
					
				</div>
			</div>
		</div>

		<br><br><br><br><br>
		<?php include 'includes/footer.php' ;?>
	</body>
</html>
	