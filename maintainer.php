<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<title>IMS - Maintainer</title>

</head>
<body>

	<div class="w3-bar w3-light-grey w3-border w3-medium">
	  <a href="./home.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home"></i></a>
	  <a href="./home.php" class="w3-bar-item w3-button w3-text-teal">INVENTORY MANAGEMENT SYSTEM - Maintainer</a>
	  <a href="./index.html" class="w3-bar-item w3-button w3-text-teal w3-right"><i class="fa fa-sign-out-alt"></i></a>
	</div>

	<?php
		require_once('connect.php');
		$component = mysqli_query($connection,"SELECT * FROM `component` WHERE `component`.`borrow_id` IS NULL");
		$component_id = array();
		if ($component) {
	  		if ($component->num_rows > 0) {
	  			while($row= mysqli_fetch_array($component)) {
	  				array_push($component_id, $row['id']);
	  			}
	  		}
	  	}
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
	?>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./borrow.php" target="_self" method="POST">

			<header class="w3-container w3-teal"> <h3>Borrow</h3> </header>
		  	
			<div class="w3-container" >
			  	<h5>Borrow ID</h5>
			  	<input class="w3-input" type="text" name="borrow_id" value="">
			  	<h5>Maintainer ID</h5>
			  	<input class="w3-input" type="text" name="maintainer_id" value="">
			  	<h5>Component ID</h5>
			  	<select class="w3-select" name="component_id">
			    	<?php  
			    		$arrlength = count($component_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$component_id[$x].'">'.$component_id[$x].'</option>';
						}
			    	?>
	  			</select>
		  		<h5>Member ID</h5>
		  		<select class="w3-select" name="member_id">
			    	<?php  
			    		$arrlength = count($member_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$member_id[$x].'">'.$member_id[$x].'</option>';
						}
			    	?>
			  	</select>
			  	<h5>Date of borrow (YYYY-MM-DD)</h5>
			  	<input class="w3-input" type="text" name="borrow_date" value="">
			  	<h5>Term (in days)</h5>
			  	<input class="w3-input" type="text" name="term" value="">

		  	</div>
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Borrow</button>
		</form>
	</div>

	<div class="w3-container w3-cell w3-mobile" style=" padding: 10px 0px; width: 450px;">
		<form class="w3-hover-shadow w3-light-grey w3-text-teal w3-margin w3-center" action="./return.php" target="_self" method="POST">

			<header class="w3-container w3-teal"> <h3>Return</h3> </header>
		  	
			<div class="w3-container" >
			  	<h5>Borrow ID</h5>
			  	<select class="w3-select" name="borrow_id">
			    	<?php  
			    		$arrlength = count($borrow_id);
			    		for($x = 0; $x < $arrlength; $x++) {
						    echo '<option value="'.$borrow_id[$x].'">'.$borrow_id[$x].'</option>';
						}
			    	?>
			  	</select>
			  	<h5>Date of return (YYYY-MM-DD)</h5>
			  	<input class="w3-input" type="text" name="return_date" value="">

		  	</div>
		  	<button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Return</button>
		</form>
	</div>

</body>
</html>
