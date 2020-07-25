<?php include '../includes/db.php'; 
		if(isset($_REQUEST['del_item_id']))
		{
			$del_sql="DELETE FROM items WHERE item_id='$_REQUEST[del_item_id]' " ;
			$del_run=mysqli_query($conn,$del_sql);
		}
		if(isset($_REQUEST['up_item_id']))
		{
			 $item_title=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_title']));
			$item_description=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_description']));
			$item_category=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_category']));
			$item_qty=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_qty']));
			$item_cost=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_cost']));
			$item_price=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_price']));
			$item_discount=mysqli_real_escape_string($conn,strip_tags($_REQUEST['item_discount']));
			$item_id=$_REQUEST['up_item_id'];
			echo "$item_id";
			 echo"helo";
			echo "$item_category";
			echo"hii";
			echo "$item_description";
			echo "bye";
			
			$item_up_sql="UPDATE items SET item_title='$item_title' ,item_description='$item_description',item_cat='$item_category',
						item_qty='$item_qty',item_cost='$item_cost',item_price='$item_price',item_discount='$item_discount' WHERE item_id='$_REQUEST[up_item_id]'";
			$item_up_run=mysqli_query($conn,$item_up_sql);
		}
		?>
<table  class="table table-dark table-bordered table-hover table-striped">
					<thead>
						<tr >
							<th>S.NO </th>
							<th>Image </th>
							<th>Item Title</th>
							<th>Item Description</th>
							<th>Item Category</th>
							<th>Item Qty</th>
							<th>Item Cost</th>
							<th>Item Price</th>
							<th>Item Discount</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$c=1;
						$sel_sql="SELECT * FROM items";
						$sel_run=mysqli_query($conn,$sel_sql);
						while($sel_rows=mysqli_fetch_assoc($sel_run))
						{
							echo " 
						<tr>
							<td>$c.</td>
							<td><img src='../$sel_rows[item_image]' style='width:50px;'></td>
							<td>$sel_rows[item_title]</td>
							<td>"; echo strip_tags($sel_rows['item_description']);  echo " </td>
							<td>$sel_rows[item_cat]</td>
							<td>$sel_rows[item_qty]</td>
							<td>$sel_rows[item_cost]</td>
							<td>$sel_rows[item_price]</td>
							<td>$sel_rows[item_discount]</td>
							<td>
								<div class='dropdown'>
									<button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' id='dropdownMenuButton' aria-haspopup='true' aria-expanded='false'>Action</button>
										<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
											<button type='button' class='dropdown-item' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal$sel_rows[item_id]'>Edit</button>";?>
											<a href="javascript:;" onclick="del_item( <?php echo $sel_rows['item_id'];?>);" class='dropdown-item'>Delete</button>
										<?php echo" </div>
								</div>
								
							</td>
									<div id='myModal$sel_rows[item_id]' class='modal fade' role='dialog'>
									  <div class='modal-dialog'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h4 class='modal-title'>Edit Item</h4>
											<button type='button' class='close' data-dismiss='modal'>&times;</button>
										  </div>
										  <div class='modal-body'>
											<form class='form' method='GET' >
													<div class='form-group'>
														<label>Item Image </label>
														<input class='form-control' name='item_image' type='file' required>
													</div>
													<div class='form-group'>
														<label>Item Name </label>
														<input class='form-control' id='item_title' value='$sel_rows[item_title]' type='text' required>
													</div>
													<div class='form-group'>
														<label>Item Description </label>
														<textarea class='form-control' id='item_description' value='$sel_rows[item_description]'  type='text' required></textarea>
													</div>
													<div class='form-group'>
														<label>Item Category </label>
															<select class='form-control' id='item_category' value='$sel_rows[item_cat]' required>";
												
																$cat_sql="SELECT * FROM item_cat";
																$cat_run=mysqli_query($conn,$cat_sql);
																while($cat_rows=mysqli_fetch_assoc($cat_run))
																{
																	$cat_name=ucwords($cat_rows['cat_name']);
																	if($cat_rows['cat_name']=='')
																		$cat_slug=$cat_rows['cat_name'];
																	else
																		$cat_slug=$cat_rows['cat_slug'];
																	
																	if($cat_slug==$sel_rows['item_cat'])
																	{
																		echo " <option selected value='$cat_slug'>$cat_name</option>";
																	}
																	else
																	{
																	echo " 
																		<option value='$cat_slug'>$cat_name</option>
																	";
																	}
																}
																
														
															echo " <select>
													</div>
													<div class='form-group'>
														<label>Item Qty </label>
														<input class='form-control'  id='item_qty' value='$sel_rows[item_qty]'  type='number' required>
													</div>
													<div class='form-group'>
														<label>Item Cost </label>
														<input class='form-control' id='item_cost' value='$sel_rows[item_cost]'  type='number' required>
													</div>
													<div class='form-group'>
														<label>Item Price </label>
														<input class='form-control' id='item_price' type='number' value='$sel_rows[item_price]'  required>
													</div>
													<div class='form-group'>
														<label>Item Discount</label>
														<input class='form-control' id='item_discount' value='$sel_rows[item_discount]'  type='number' required>
													</div>
													<div class='form-group'>
														<input type='hidden' id='up_item_id' value='$sel_rows[item_id]' >";?>
														<button type='submit'  onclick='edit_item(<?php echo $sel_rows['item_id'];?>);'  class='btn btn-primary'> Save</button>
													<?php echo "</div>
												</form>
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										  </div>
										</div>

									  </div>
									</div>
						</tr>
						";?>
						<?php
						$c++;
						}
						?>
					</tbody>
				</table>
				