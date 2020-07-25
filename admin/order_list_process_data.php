<?php include '../includes/db.php'; 

		if(isset($_REQUEST['order_status']))
		{
			$up_sql="UPDATE orders SET order_status='$_REQUEST[order_status]' WHERE order_id='$_REQUEST[order_id]'";
			$up_run=mysqli_query($conn,$up_sql);
		}
		
		if(isset($_REQUEST['order_return']))
		{
			$up_ret_sql="UPDATE orders SET order_return='$_REQUEST[order_return]' WHERE order_id='$_REQUEST[order_id]'";
			$up_ret_run=mysqli_query($conn,$up_ret_sql);
		}
?>
<center><h2>Orderer Details</h2><br></center>
	<table class="table table-dark table-striped table-bordered table-hover " >
					<thead>
						<tr>
							<th>SNo.</th>
							<th>Name</th>
							<th>Email Id</th>
							<th>DOB</th>
							<th>C.No.</th>
							<th>City</th>
							<th>Delivery Add.</th>
							<th>Ref. No.</th>
							<th>Amount</th>
							<th>Status</th>
							<th>Return</th>
						</tr>
					</thead>
					<tbody>
					<?php 
							$c=1;
							$ord_sql="SELECT * FROM orders";
							$ord_run=mysqli_query($conn,$ord_sql);
							while($ord_rows=mysqli_fetch_assoc($ord_run))
							{
								if($ord_rows['order_status']==0)
								{
									$btn_class='btn-warning';
									$btn_value='Pending...';
								}
								else
								{
									$btn_class='btn-success';
									$btn_value='Sent';
								}
								if($ord_rows['order_return']==0)
								{
									$return_class='btn-danger';
									$return_value='Returned';
								}
								else
								{
									$return_class='btn-primary';
									$return_value='Recieved';
								}
								$chk_sel_sql="SELECT * FROM checkout  JOIN items  ON checkout.chk_item = items.item_id WHERE checkout.chk_ref='$ord_rows[order_checkout_ref]' ";
								$chk_sel_run=mysqli_query($conn,$chk_sel_sql);
								echo"
								<tr>
									<td>$c.</td>
									<td>$ord_rows[order_name]</td>
									<td>$ord_rows[order_email]</td>
									<td>$ord_rows[order_dob]</td>
									<td>$ord_rows[order_contact_number]</td>
									<td>$ord_rows[order_city]</td>
									<td>$ord_rows[order_delivery_address]</td>
									<td><button class='btn btn-info' data-toggle='modal' data-target='#order_chk_modal$ord_rows[order_id]'>$ord_rows[order_checkout_ref]</button>
										<div id='order_chk_modal$ord_rows[order_id]' class='modal'>
												<div class='modal-dialog'>
													<div class='modal-content'>
														<div class='modal-header' style='background:black;'><h4 style='background:black;'>CheckOut Items</h4>
															<button type='button' class='close' data-dismiss='modal'>&times;</button></div>
															<div class='modal-body'>
																<table class='table table-bordered table-dark'>
																	<thead>
																		<tr>
																			<th>S.No.</th>
																			<th>Item</th>
																			<th>QTY</th>
																			<th class='text-right'>Price</th>
																			<th class='text-right'>Sub Total</th>
																		</tr>
																	</thead>
																	<tbody> ";
																	$p=1;
																	while($chk_sel_rows=mysqli_fetch_assoc($chk_sel_run))
																	{
																		$total=$chk_sel_rows['chk_qty']*$chk_sel_rows['item_price'];
																		echo"
																		
																			<tr>
																				<td>$p.</td>
																				<td>$chk_sel_rows[item_title]</td>
																				<td>$chk_sel_rows[chk_qty]</td>
																				<td class='text-right'>$chk_sel_rows[item_price]/-</td>
																				<td class='text-right'>$total/-</td>
																			</tr>
																		";
																		$p++;
																	}
																	echo "
																	</tbody>
																</table>
																<br>
																<table class='table table-bordered table-dark'>
																	<thead>
																		<tr> 
																			<th colspan=2 class='text-center'>Order Summery</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>Grand Total</td>
																			<td class='text-right'><b>$ord_rows[order_total]/-</b></td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class='modal-footer'><button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
														</div>
													</div>
												</div>
										</div>
									</td>";?>
									<td class='text-right'><b><?php echo $ord_rows['order_total'];?></b></td>
									<td><center><button onclick="order_status(<?php echo $ord_rows['order_status'].','.$ord_rows['order_id']; ?>);"  class='btn btn-sm <?php echo" $btn_class";?> '><?php echo $btn_value; ?></button></center></td>
									<td><center><button onclick="return_status(<?php echo $ord_rows['order_return'].','.$ord_rows['order_id']; ?>);"  class='btn btn-sm <?php echo" $return_class";?>'><?php echo $return_value;?></button></center></td>
								</tr>
							<?php
							$c++;
							}
							?>
					</tbody>
				</table>