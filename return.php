<?php
	//session_start();
	require_once('connect.php');
	if(isset($_POST)&!empty($_POST)){
		$borrow_id = mysqli_real_escape_string($connection,$_POST['borrow_id']);
		$date_of_return = mysqli_real_escape_string($connection,$_POST['return_date']);
		$sql =	"UPDATE `borrow` SET `return_date`='".$date_of_return."' WHERE `borrow_id`='".$borrow_id."';";
		$result=mysqli_query($connection,$sql);
		if($result===TRUE){
			echo "Successfully returned";
		}
		else{
			echo "Something went wrong";
			//echo $result->username . ' ' . $result->password . ' ' . $result->type;
		}
	}
?>
