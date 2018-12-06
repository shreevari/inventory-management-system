<?php
	//session_start();
	require_once('connect.php');
	if(isset($_POST)&!empty($_POST)){
		$username = mysqli_real_escape_string($connection,$_POST['username']);
		$password = $_POST['password'];
		$type = mysqli_real_escape_string($connection,$_POST['type']);
		$sql =	"SELECT username, password, type FROM `user` WHERE username='$username' AND password='$password' AND type='$type'";
		$result=mysqli_query($connection,$sql);
		$count=mysqli_num_rows($result);
		if($count==1){
			switch ($_POST['type']) {
			    case "admin":
					header("Location:admin.php");
			        break;
			    case "maintainer":
			        header("Location:maintainer.php");
			        //$_SESSION['username']=$_POST['username'];
			        break;
			    default:
			        header("Location:home.php");
			}
		}else{
			echo "Wrong credentials";
			//echo $result->username . ' ' . $result->password . ' ' . $result->type;
		}
	}
?>