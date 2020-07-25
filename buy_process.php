<?php session_start();
	include 'includes/db.php';
	if(isset($_REQUEST['chk_del_id']))
	{
		$chk_del_sql="DELETE FROM checkout WHERE chk_id='$_REQUEST[chk_del_id]' " ;
		$chk_del_run=mysqli_query($conn,$chk_del_sql);
	}
	
	if(isset($_REQUEST['up_chk_qty']))
	{
		$up_chk_qty_sql="UPDATE checkout SET chk_qty='$_REQUEST[up_chk_qty]' WHERE chk_id='$_REQUEST[up_chk_id]'" ;
		$up_chk_qty_run=mysqli_query($conn,$up_chk_qty_sql);
	}
	$c=1;
	$grand_total=0;
	$chk_sel_sql="SELECT * FROM checkout c JOIN items i ON c.chk_item = i.item_id WHERE c.chk_ref= '$_SESSION[ref]' ";
	$chk_sel_run=mysqli_query($conn,$chk_sel_sql);
	echo"
		<table class='table'>
					<thead>
						<tr>
							<th>S.No</th>
							<th>Item</th>
							<th>QTY</th>
							<th>Delete</th>
							<th>Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
	";
		while($chk_sel_rows=mysqli_fetch_assoc($chk_sel_run))
		{
			$total=$chk_sel_rows['item_price']*$chk_sel_rows['chk_qty'];
			$grand_total+=$total;
			echo"
					<tr>
						<td>$c.</td>
						<td>$chk_sel_rows[item_title]</td>";?>
						<td><input type='number' style='width:35px;' onblur="up_chk_qty(this.value, '<?php echo $chk_sel_rows['chk_id'];?>');" value='<?php echo $chk_sel_rows['chk_qty']; ?>'></td> 
						<td><button class='btn btn-danger btn-sm' onclick="del_func(<?php echo  $chk_sel_rows['chk_id'] ; ?> );">Delete</button></td>
						<?php echo "<td>₹ $chk_sel_rows[item_price]/-</td>
						<td><b>₹ $total/-</b></td>
					</tr>
				";
				$c++;
		}
		$_SESSION['grand_total']=$grand_total;
		echo"
			</tbody>
				</table>
				<table class='table'>
					<thead>
						<tr>
							<th><h4 class='text-center'>Order Summary</h4></th>
						</tr>	
					</thead>
					<tbody>
						<tr>
						<td>Sub Total</td>
						<td class='text-right'> <b>₹ $grand_total/-</b></td>
						</tr>
						<tr>
						<td>Delivery Charge</td>
						<td class='text-right'><b>Free</b></td>
						</tr>
						<tr>
						<td><b>Total</b></td>
						<td class='text-right'><b>₹ $_SESSION[grand_total]/-</b></td>
						</tr>
						</tbody>
					</table>
		";
?>