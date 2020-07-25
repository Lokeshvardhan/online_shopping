<?php
	include 'includes/db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Product Details</title>
		<link rel="stylesheet" href="css\all.css">		
		
		<link rel="stylesheet" href="css\bootstrap.css">
		<link rel="stylesheet" href="css\style.css">
		
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>
	</head>
	<body >
		<?php 
			include 'includes/header.php';
		?>
		<br>
		<div class="container" >
		<div class="row" style="background-color:silver">

				<ol class="breadcrumb mr-auto" style="background-color:silver">
					<li class="nav-link active"><a class="nav-item "href="index.php">Home</a></li> 
					<?php
							if(isset($_GET['item_id']))
							{
								$sql="SELECT * FROM items WHERE item_id='$_GET[item_id]' ";
								$run=mysqli_query($conn,$sql);
								while($rows=mysqli_fetch_assoc($run))
								{
									$item_cat=ucwords($rows['item_cat']);
									$item_id=$rows['item_id'];
									echo "
										<li class='nav-link active'><a class='nav-item 'href='category.php?category=$item_cat'>$item_cat</a></li> 
										<li class=' nav-link active'>$rows[item_title]</li>
									";
							
					?>
					
				</ol>
		</div>
		<div class="row">
		<?php
					echo "
						<div class='col-md-7'>
							<h3 class='pp-title' >$rows[item_title]</h3>
							<img  src='$rows[item_image]' class='img-responsive  single-item' style='height:400px; width:400px'><br><br>
							<h4 class='pp-desc-head'>Description</h4>
							<div class='pp-desc-detail' >$rows[item_description]</div>
						</div>
					";
				}
			}
		?>
			
			<aside class="col-md-5">
				
				<br>
				<a href="buy.php?chk_item_id=<?php echo $item_id; ?>" class="btn btn-success btn-lg btn-block" style="height:70px; font-size:30px">BUY / CART</a>	
				<br>
				<ul class="list-group">
					<li class="list-group-item">
					<div class="row">
						<div class="col px-md-4 p-1"><svg class="bi bi-truck" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
							  <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
							  <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
							  <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
							</svg></div>
						<div class="col-md-10">Delivered within 5 days</div>
					</div>
					</li>
					<li class="list-group-item">
					<div class="row">
						<div class="col px-md-4 p-1"><svg class="bi bi-arrow-clockwise" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="padding-right:2px;">
							  <path fill-rule="evenodd" d="M3.17 6.706a5 5 0 0 1 7.103-3.16.5.5 0 1 0 .454-.892A6 6 0 1 0 13.455 5.5a.5.5 0 0 0-.91.417 5 5 0 1 1-9.375.789z"/>
							  <path fill-rule="evenodd" d="M8.147.146a.5.5 0 0 1 .707 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 1 1-.707-.708L10.293 3 8.147.854a.5.5 0 0 1 0-.708z"/>
							</svg></div>
						<div class="col-md-10">Easy return in 7 days.</div>
					</div>
					</li>
					<li class="list-group-item">
					<div class="row">
						<div class="col px-md-4 p-1"><svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="padding-right:2px;">
							  <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
							  <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
							</svg></div>
						<div class="col-md-10">Call at 9887654410</div>
					</div>
					</li>
				</ul>
			</aside>
			
		</div>
		<br>
		<div class="page-header">
			<h3>Realted Items</h3>
		</div>
		<div class="row">
			<?php 
				$rel_sql="SELECT * FROM items ORDER BY rand() LIMIT 4";
				$rel_run=mysqli_query($conn,$rel_sql);
				while($rel_rows=mysqli_fetch_assoc($rel_run))
				{
					$discounted_price=$rel_rows['item_price']-$rel_rows['item_discount'];
					$item_title=str_replace(' ','-',$rel_rows['item_title']);
					echo "
						<div class='col-md-3 '  style='background:#efefef'>
							<div class=' single-item ' >
								<div class='top'> <img src='$rel_rows[item_image]' class='img-responsive   rounded'></div>
								<div class='bottom'>
								  <h3 class='item-title'><a href='item.php?item_id=$rel_rows[item_id]&item_title=$item_title' class='active'>$rel_rows[item_title]</a></h3>
								  <div class='float-right cutted-price'><del><h4>₹$rel_rows[item_price]</h4></del></div>
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
		<br><br><br>
		<?php 
			include 'includes/footer.php';
		?>
	</body>
</html>