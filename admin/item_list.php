<?php include '../includes/db.php';
		if(isset($_POST['item_submit']))
		{
			$item_title=mysqli_real_escape_string($conn,strip_tags($_POST['item_title']));
			$item_description=mysqli_real_escape_string($conn,$_POST['item_description']);
			$item_category=mysqli_real_escape_string($conn,strip_tags($_POST['item_category']));
			$item_qty=mysqli_real_escape_string($conn,strip_tags($_POST['item_qty']));
			$item_cost=mysqli_real_escape_string($conn,strip_tags($_POST['item_cost']));
			$item_price=mysqli_real_escape_string($conn,strip_tags($_POST['item_price']));
			$item_discount=mysqli_real_escape_string($conn,strip_tags($_POST['item_discount']));
			if(isset($_FILES['item_image']['name']))
			{
				$file_name=$_FILES['item_image']['name'];
				$path_address="../image/items/$file_name";
				$path_address_db="image/items/$file_name";
				$img_confirm=1;
				$file_type= pathinfo($_FILES['item_image']['name'],PATHINFO_EXTENSION);
				if($_FILES['item_image']['size'] > 200000)
				{
					$img_confirm=0;
				}
				if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif' && $file_type != 'jfif')
				{
					$img_confirm=0;
				}
				if($img_confirm==1)
				{
					if(move_uploaded_file($_FILES['item_image']['tmp_name'], $path_address))
					{
						$item_ins_sql="INSERT INTO items (item_image,item_title,item_description,item_cat,
						item_qty,item_cost,item_price,item_discount) VALUES ('$path_address_db','$item_title',
						'$item_description','$item_category','$item_qty','$item_cost','$item_price','$item_discount')";
						$item_ins_run=mysqli_query($conn,$item_ins_sql);
					}
				}
				
			}
		}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Items List | Admin Panel</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>tinymce.init({selector:'textarea'});</script>
		<script>
			function get_item_list_data() {
						xmlhttp= new XMLHttpRequest();
						
						xmlhttp.onreadystatechange = function() {
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
								document.getElementById('get_item_list_data').innerHTML = xmlhttp.responseText;
							}
						}
						xmlhttp.open('GET', 'item_list_process.php', true);
						xmlhttp.send();
					}
			function del_item(item_id){
					
						xmlhttp.open('GET', 'item_list_process.php?del_item_id='+item_id, true);
						xmlhttp.send();
			}
			
			function edit_item(item_id){
					alert(item_id);
					item_title=document.getElementById('item_title').value;
					item_description=document.getElementById('item_description').value;
					item_category=document.getElementById('item_category').value;
					item_qty=document.getElementById('item_qty').value;
					item_cost=document.getElementById('item_cost').value;
					item_price=document.getElementById('item_price').value;
					item_discount=document.getElementById('item_discount').value;
					alert(item_title);
					xmlhttp.open('GET', 'item_list_process.php?up_item_id='+item_id+'&item_title='+item_title+'&item_description='+item_description
					+'&item_category='+item_category+'&item_qty='+item_qty+'&item_cost='+item_cost+'&item_price='+item_price+'&item_discount='+item_discount, true);
						xmlhttp.send();
			}
		</script>	
	</head>
	<body onload="get_item_list_data();">
		<?php include 'includes/header.php' ; ?><br>
			<div class="container">
				<button class="btn btn-danger" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#add_new_item">Add New Item</button><br><br>
				<div id="add_new_item" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">Add New Item
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Item Image </label>
										<input class="form-control" name="item_image" type="file" required>
									</div>
									<div class="form-group">
										<label>Item Name </label>
										<input class="form-control" name="item_title" type="text" required>
									</div>
									<div class="form-group">
										<label>Item Description </label>
										<textarea class="form-control" name="item_description" type="text" required ></textarea>
									</div>
									<div class="form-group">
										<label>Item Category </label>
											<select class="form-control" name="item_category" required>
											<?php 
												$cat_sql="SELECT * FROM item_cat";
												$cat_run=mysqli_query($conn,$cat_sql);
												while($cat_rows=mysqli_fetch_assoc($cat_run))
												{
													$cat_name=ucwords($cat_rows['cat_name']);
													if($cat_rows['cat_name']=='')
														$cat_slug=$cat_rows['cat_name'];
													else
														$cat_slug=$cat_rows['cat_slug'];
													echo " 
														<option value='$cat_slug'>$cat_name</option>
													";
												}
												
											?>
											<select>
									</div>
									<div class="form-group">
										<label>Item Qty </label>
										<input class="form-control"  name="item_qty" type="number" required>
									</div>
									<div class="form-group">
										<label>Item Cost </label>
										<input class="form-control" name="item_cost" type="number" required>
									</div>
									<div class="form-group">
										<label>Item Price </label>
										<input class="form-control" name="item_price" type="number" required>
									</div>
									<div class="form-group">
										<label>Item Discount</label>
										<input class="form-control" name="item_discount" type="number" required>
									</div>
									<div class="form-group">
										<button type="submit"  name="item_submit" class="btn btn-primary"> Submit</button>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>	
						</div>
					</div>
				</div>
				<div id="get_item_list_data"></div>
			</div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>