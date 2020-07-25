<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-left">
	<a class="navbar-brand" href="#">Online Shopping</a>
    <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
	  <?php 
			$cat_sql="SELECT * FROM item_cat";
			$cat_run=mysqli_query($conn,$cat_sql);
			while($cat_rows=mysqli_fetch_assoc($cat_run))
			{
						if($cat_rows['cat_slug']=='')
						{
							$cat_slug=$cat_rows['cat_name'];
						}
						else
						{
							$cat_slug=$cat_rows['cat_slug'];
						}
				echo " 
						
					    <li class='nav-item'><a class='nav-link' href='category.php?category=$cat_slug'>$cat_rows[cat_name]</a> </li>
				";
			}
	  ?>
      
    </ul>
	
		<form class="form-inline my-2 my-md-0" style="padding=2px">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
    </div>
	    <ul class="navbar-nav navbar-right mr-auto " style="padding:3px">
		<li class="nav-item active" >
					<a class="nav-link" href="#">Sign Up</a>
				</li>
		        <li class="nav-item active">
					<a class="nav-link" href="#">Log In</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Log Out</a>
				</li>
		</ul>
	</nav>