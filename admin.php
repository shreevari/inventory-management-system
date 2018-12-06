<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<title>IMS - admin</title>

</head>
<body>

	<div class="w3-bar w3-light-grey w3-border w3-medium">
	  <a href="./home.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home"></i></a>
	  <a href="./home.php" class="w3-bar-item w3-button w3-text-teal">INVENTORY MANAGEMENT SYSTEM - Administrator</a>
	  <a href="./index.html" class="w3-bar-item w3-button w3-text-teal w3-right"><i class="fa fa-sign-out-alt"></i></a>
	</div>

	
	<?php
		require_once('connect.php');
		//echo $_SESSION['username'];

	?>
	<?php
		require_once('connect.php');
		$user = mysqli_query($connection,"SELECT * FROM `user`");
		$username = array();
		if ($user) {
	  		if ($user->num_rows > 0) {
	  			while($row= mysqli_fetch_array($user)) {
	  				array_push($username, $row['username']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>
	<?php
		require_once('connect.php');
		$product = mysqli_query($connection,"SELECT * FROM `product`");
		$product_id = array();
		if ($product) {
	  		if ($product->num_rows > 0) {
	  			while($row= mysqli_fetch_array($product)) {
	  				array_push($product_id, $row['id']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>
	<?php
		require_once('connect.php');
		$component = mysqli_query($connection,"SELECT * FROM `component`");
		$component_id = array();
		if ($component) {
	  		if ($component->num_rows > 0) {
	  			while($row= mysqli_fetch_array($component)) {
	  				array_push($component_id, $row['id']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>
	<?php
		require_once('connect.php');
		$member = mysqli_query($connection,"SELECT * FROM `member`");
		$member_id = array();
		if ($member) {
	  		if ($member->num_rows > 0) {
	  			while($row= mysqli_fetch_array($member)) {
	  				array_push($member_id, $row['id']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>
	<?php
		require_once('connect.php');
		$maintainer = mysqli_query($connection,"SELECT * FROM `maintainer`");
		$maintainer_id = array();
		if ($maintainer) {
	  		if ($maintainer->num_rows > 0) {
	  			while($row= mysqli_fetch_array($maintainer)) {
	  				array_push($maintainer_id, $row['id']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>
	<?php
		require_once('connect.php');
		$owner = mysqli_query($connection,"SELECT * FROM `owner`");
		$owner_id = array();
		if ($owner) {
	  		if ($owner->num_rows > 0) {
	  			while($row= mysqli_fetch_array($owner)) {
	  				array_push($owner_id, $row['id']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>
	<?php
		require_once('connect.php');
		$borrow = mysqli_query($connection,"SELECT * FROM `borrow`");
		$borrow_id = array();
		if ($borrow) {
	  		if ($borrow->num_rows > 0) {
	  			while($row= mysqli_fetch_array($borrow)) {
	  				array_push($borrow_id, $row['borrow_id']);
	  			}
	  		}
	  	}
	  	//print_r($component_id);
	?>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./product/add.php" target="_self" method="POST">

			<header class="w3-container w3-teal"> <h3>Products</h3> </header>
		  	
			<div class="w3-container" >
			  	<h5>Product ID</h5>
			  	<input class="w3-input" type="text" name="product_id" value="">
			  	<h5>Product Name</h5>
			  	<input class="w3-input" type="text" name="product_name" value="">
			  	<h5>Description</h5>
			  	<input class="w3-input" type="text" name="description" value="">
			  	<h5>Category</h5>
			  	<input class="w3-input" type="text" name="category" value="">
		  	</div>
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Add</button>
		</form>
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./product/delete.php" target="_self" method="POST">

		  	<h5>Product ID</h5>
		  	<select class="w3-select" name="product_id">
		    	<?php  
		    		$arrlength = count($product_id);
		    		for($x = 0; $x < $arrlength; $x++) {
					    echo '<option value="'.$product_id[$x].'">'.$product_id[$x].'</option>';
					}
		    	?>
		  	</select>
		  	 
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>
	
	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./component/add.php" target="_self" method="POST">

		  	<header class="w3-container w3-teal"> <h3>Components</h3> </header>
		  	<div class="w3-container" >
			  	<h5>Component ID</h5>
			  	<input class="w3-input" type="text" name="component_id" value="">
			  	<h5>Product ID</h5>
			  	<select class="w3-select" name="product_id">
			    	<?php  
			    		$arrlength = count($product_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$product_id[$x].'">'.$product_id[$x].'</option>';
						}
			    	?>
			  	</select>
			  	 
			  	<h5>Condition</h5>
			  	<input class="w3-input" type="text" name="condition" value=""> 
			  	<h5>Owner ID</h5>
			  	<select class="w3-select" name="owner_id">
			    	<?php  
			    		$arrlength = count($owner_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$owner_id[$x].'">'.$owner_id[$x].'</option>';
						}
			    	?>
			  	</select>
		  	 </div>
		  	
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Add</button>
		</form>
		
		 
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./component/delete.php" target="_self" method="POST">

		  	<h5>Component ID </h5>
		  	<select class="w3-select" name="component_id">
		    	<?php  
		    		$arrlength = count($component_id);
		    		for($x = 0; $x < $arrlength; $x++) {
					    echo '<option value="'.$component_id[$x].'">'.$component_id[$x].'</option>';
					}
		    	?>
		  	</select>
		  	 
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>
	
	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./member/add.php" target="_self" method="POST">

		  	<header class="w3-container w3-teal"> <h3>Members</h3> </header>
		  	<div class="w3-container" >
			  	<h5>Member ID</h5>
			  	<input class="w3-input" type="text" name="member_id" value="">
			  	 
			  	<h5>Member Name</h5>
			  	<input class="w3-input" type="text" name="member_name" value="">
			  	 
			  	<h5>Department </h5>
			  	<input class="w3-input" type="text" name="department" value="">
			  	 
			  	<h5>Year</h5> 
			  	<input class="w3-input" type="text" name="year" value="">
			  	 
			  	<h5>Section </h5>
			  	<input class="w3-input" type="text" name="section" value="">
			  	 
			  	<h5>Contact</h5>
			  	<input class="w3-input" type="text" name="contact" value="">
		  	</div>

		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Add</button>
		</form>

		 
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./member/delete.php" target="_self" method="POST">

		  	<h5>Member ID</h5>
		  	<select class="w3-select" name="member_id">
		    	<?php  
		    		$arrlength = count($member_id);
		    		for($x = 0; $x < $arrlength; $x++) {
					    echo '<option value="'.$member_id[$x].'">'.$member_id[$x].'</option>';
					}
		    	?>
		  	</select>
		  	 
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./maintainer/add.php" target="_self" method="POST">

			<header class="w3-container w3-teal"> <h3>Maintainers</h3> </header>
			<div class="w3-container" >
				<h5>Maintainer ID </h5>
			  	<select class="w3-select" name="maintainer_id">
			    	<?php  
			    		$arrlength = count($member_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$member_id[$x].'">'.$member_id[$x].'</option>';
						}
			    	?>
			  	</select>
			  	 
			  	<h5>Role</h5>
			  	<input class="w3-input" type="text" name="role" value="">
			  	 
			  	<h5>Start date</h5>
			  	<input class="w3-input" type="text" name="start_date" value="">
			  	 
			  	<h5>Term</h5>
			  	<input class="w3-input" type="text" name="term" value="">
			  	</div>

		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Add</button>
		</form>

		 
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./maintainer/delete.php" target="_self" method="POST">

		  	<h5>Maintainer ID</h5>
		  	<select class="w3-select" name="maintainer_id">
		    	<?php  
		    		$arrlength = count($maintainer_id);
		    		for($x = 0; $x < $arrlength; $x++) {
					    echo '<option value="'.$maintainer_id[$x].'">'.$maintainer_id[$x].'</option>';
					}
		    	?>
		  	</select>
		  	 
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./owner/add.php" target="_self" method="POST">

		  	<header class="w3-container w3-teal"> <h3>Owners</h3> </header>
		  	<div class="w3-container" >
			  	<h5>Owner ID</h5>
			  	<input class="w3-input" type="text" name="owner_id" value="">
			  	 
			  	<h5>Owner Name </h5>
			  	<input class="w3-input" type="text" name="owner_name" value="">
			  	 
			  	<h5>Contact</h5>
			  	<input class="w3-input" type="text" name="contact" value="">
			  	</div>

		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Add</button>
		</form>

		 
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./owner/delete.php" target="_self" method="POST">

		  	<h5>Owner ID</h5>
		  	<select class="w3-select" name="owner_id">
		    	<?php  
		    		$arrlength = count($owner_id);
		    		for($x = 0; $x < $arrlength; $x++) {
					    echo '<option value="'.$owner_id[$x].'">'.$owner_id[$x].'</option>';
					}
		    	?>
		  	</select>
		  	 
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./user/add.php" target="_self" method="POST">

		  	<header class="w3-container w3-teal"> <h3>Users</h3> </header>
		  	<div class="w3-container" >
			  	<h5>Username</h5>
			  	<input class="w3-input" type="text" name="username" value="">
			  	 
			  	<h5>Password</h5>
			  	<input class="w3-input" type="text" name="password" value="">
			  	 
			  	<h5>Type</h5>
			  	<select class="w3-select" name="type">
			    	<option value="admin">Administrator</option>
			    	<option value="member">Member</option>
			    	<option value="maintainer">Maintainer</option>
			  	</select>
			</div>

		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Add</button>
		</form>

		 
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./user/delete.php" target="_self" method="POST">

		  	<h5>Username</h5>
		  	<select class="w3-select" name="username">
		    	<?php  
		    		$arrlength = count($username);
		    		for($x = 0; $x < $arrlength; $x++) {
					    echo '<option value="'.$username[$x].'">'.$username[$x].'</option>';
					}
		    	?>
		  	</select>
		  	 
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		
		 
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./borrow/delete.php" target="_self" method="POST">

		  	<header class="w3-container w3-teal"> <h3>Borrow</h3> </header>
		  	<div class="w3-container" >
			  	<h5>Borrow_id</h5>
			  	<select class="w3-select" name="borrow_id">
			    	<?php  
			    		$arrlength = count($borrow_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$borrow_id[$x].'">'.$borrow_id[$x].'</option>';
						}
			    	?>
			  	</select>
		  	</div>
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Delete</button>
		</form>
	</div>
</body>
</html>