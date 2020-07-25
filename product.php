<?php
	include'includes/db.php';
?>
<html>
	<head>
		<title>Product Details</title>
		<link rel="stylesheet" href="css/all.css">		
		
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		
	    <script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
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
					<li class="nav-link active"><a class="nav-item "href="#">Watches</a></li> 
					<li class=" nav-link active"> Beautiful Watches</li>
				</ol>
		</div>
		<div class="row">
			<div class="col-md-7">
				<h3 class="pp-title" >Beautiful Watch</h3>
				<img  src="image/items/item1.jpg" class="img-responsive  single-item" style="height:500px; width:600px"><br><br>
				<h4 class="pp-desc-head">Description</h4>
				<div class="pp-desc-detail" >
					<p>This is a very beautiful watch. It's purely made of metal. You can buy by simply clicking<b> BUY</b> button</p>				
					<ul>
						<li><b>CASH ON DELIVERY</b> Avaliable.</li> 
						<li>Free Shipping.</li>
						<li>Made of Matel.</li>				
						<li>An Original and Branded quality.</li>
						
						
					</ul>
				</div>
			</div>
			<aside class="col-md-5">
				
				<br>
				<a href="buy.php" class="btn btn-success btn-lg btn-block" style="height:70px; font-size:30px">BUY / CART</a>	
				<br>
				<ul class="list-group">
					<li class="list-group-item">
					<div class="row">
						<div class="col-md-3"><i class="fas fa-user"></i></div>
						<div class="col-md-9">Delivered within 5 days</div>
					</div>
					</li>
					<li class="list-group-item">
					<div class="row">
						<div class="col-md-3"><i class="fas fa-exchange-alt"></i></div>
						<div class="col-md-9">Easy return in 7 days.</div>
					</div>
					</li>
					<li class="list-group-item">
					<div class="row">
						<div class="col-md-3"><i class="fas fa-phone"></i></div>
						<div class="col-md-9">Call at 9887654410</div>
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
				<div class="col-md-3 "  style="background:#efefef">
				<div class=" single-item " >
					<div class="top"> <img src="image/products/image4.png" class="img-responsive   rounded"></div>
					<div class="bottom">
					  <h3 class="item-title"><a href="product.php" class="active">Beautiful Watches</a></h3>
					  <div class="float-right cutted-price"><del><h4>₹500/-</h4></del></div>
					  <div class="clearfix">	</div>
					  <div class="float-right price"><h4>₹400/-</h4></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 "  style="background:#efefef">
				<div class=" single-item " >
					<div class="top"> <img src="image/items/item1.jpg" class="img-responsive   rounded"></div>
					<div class="bottom">
					  <h3 class="item-title"><a href="product.php" class="active">Beautiful Watches</a></h3>
					  <div class="float-right cutted-price"><del><h4>₹500/-</h4></del></div>
					  <div class="clearfix">	</div>
					  <div class="float-right price"><h4>₹400/-</h4></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 "  style="background:#efefef">
				<div class=" single-item " >
					<div class="top"> <img src="image/items/item1.jpg" class="img-responsive   rounded"></div>
					<div class="bottom">
					  <h3 class="item-title"><a href="product.php" class="active">Beautiful Watches</a></h3>
					  <div class="float-right cutted-price"><del><h4>₹500/-</h4></del></div>
					  <div class="clearfix">	</div>
					  <div class="float-right price"><h4>₹400/-</h4></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 "  style="background:#efefef">
				<div class=" single-item " >
					<div class="top"> <img src="image/items/item1.jpg" class="img-responsive   rounded"></div>
					<div class="bottom">
					  <h3 class="item-title"><a href="product.php" class="active">Beautiful Watches</a></h3>
					  <div class="float-right cutted-price"><del><h4>₹500/-</h4></del></div>
					  <div class="clearfix">	</div>
					  <div class="float-right price"><h4>₹400/-</h4></div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<br><br><br>
		<?php 
			include 'includes/footer.php';
		?>
	</body>
</html>