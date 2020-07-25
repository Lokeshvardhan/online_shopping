<?php
	include 'includes/db.php';
?>
<!DOCTYPE html>
<html>
   <head>
    <title>Online Shopping </title>
		
		<link rel="stylesheet" href="css\bootstrap.css">
		<link rel="stylesheet" href="css\style.css">
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>
    </head>
    <body >
	<?php 
		include 'includes/header.php';
	?>
	<br><br>
    <div class="container">
		<div class="row" >
		<?php
			$sql="SELECT * FROM items";
			$run=mysqli_query($conn,$sql);
			while($rows=mysqli_fetch_assoc($run))
			{
				$discounted_price=$rows['item_price']-$rows['item_discount'];
				$item_title=str_replace(' ','-',$rows['item_title']);
				echo " 
						<div class='col-md-3 '  >
							<div class=' single-item ' >
								<div class='top'> <img src='$rows[item_image]' class='img-responsive   rounded'></div>
								<div class='bottom'>
								  <h3 class='item-title'><a href='item.php?item_title=$item_title&item_id=$rows[item_id]' class='active'>$rows[item_title]</a></h3>
								  <div class='float-right cutted-price'><del><h4>₹$rows[item_price]</h4></del></div>
								  <div class='clearfix'>	</div>
								  <div class='float-right price'><h4>₹$discounted_price</h4></div>
								</div>
							</div>
						</div>
				
				";
			}
		?>
		</div>
	</div>
	<?php 
		include 'includes/footer.php';
	?>
    </body>
</html>