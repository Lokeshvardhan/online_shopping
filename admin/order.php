<?php include '../includes/db.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orders List | Admin Panel | Online Shopping</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script>
			function get_order_list_data() {
						xmlhttp= new XMLHttpRequest();
						
						xmlhttp.onreadystatechange = function() {
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
								document.getElementById('get_order_list_data').innerHTML = xmlhttp.responseText;
							}
						}
						xmlhttp.open('GET', 'order_list_process_data.php', true);
						xmlhttp.send();
					}
			function order_status(order_status,order_id){
						if(order_status==1)
							order_status=0;
						else{
							order_status=1;
						}
						xmlhttp.onreadystatechange = function() {
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
								document.getElementById('get_order_list_data').innerHTML = xmlhttp.responseText;
							}
						}
						xmlhttp.open('GET', 'order_list_process_data.php?order_status='+order_status+'&order_id='+order_id, true);
						xmlhttp.send();
			}
			function return_status(order_return,order_id){
						if(order_return==1)
							order_return=0;
						else{
							order_return=1;
						}
						xmlhttp.onreadystatechange = function() {
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
								document.getElementById('get_order_list_data').innerHTML = xmlhttp.responseText;
							}
						}
						xmlhttp.open('GET', 'order_list_process_data.php?order_return='+order_return+'&order_id='+order_id, true);
						xmlhttp.send();
			}
		</script>
	</head>
	<body onload="get_order_list_data();">
		<?php include 'includes/header.php' ; ?><br>
		<div class="container table-responsive">
			<div id="get_order_list_data">
			</div>
		</div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>