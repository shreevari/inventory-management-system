<?php
	//session_start();
	require_once('connect.php');
	if(isset($_POST)&!empty($_POST)){
		$component_id = mysqli_real_escape_string($connection,$_POST['component_id']);
		$maintainer_id = mysqli_real_escape_string($connection,$_POST['maintainer_id']);
		$member_id = mysqli_real_escape_string($connection,$_POST['member_id']);
		$borrow_id = mysqli_real_escape_string($connection,$_POST['borrow_id']);
		$date_of_borrow = mysqli_real_escape_string($connection,$_POST['borrow_date']);
		$term = mysqli_real_escape_string($connection,$_POST['term']);
		$sql =	"INSERT INTO `borrow` (`component`, `borrower`, `maintainer`, `borrow_id`, `borrow_date`, `term`, `return_date`, `comments`) VALUES ('".$component_id."', '".$member_id."', '".$maintainer_id."', '".$borrow_id."', '".$date_of_borrow."', '".$term."', NULL, NULL)";
		$result=mysqli_query($connection,$sql);
		if($result===TRUE){
			echo "Successfully borrowed";
		}
		else{
			echo "Something went wrong";
			//echo $result->username . ' ' . $result->password . ' ' . $result->type;
		}
	}
?>