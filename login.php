<?php
	if(isset($_POST['login'])){
		require('db.php');
		session_start();
		include('conn.php');
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password=md5($password);
		$query=mysqli_query($conn,"select * from `t_login` where lo_username='$username' && lo_password='$password'");
	
		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="Login Failed. User not Found!";
			header('location:index.php');
		}
		else{
			$row=mysqli_fetch_array($query);
			
			if (isset($_POST['remember'])){
				//set up cookie
				setcookie("user", $row['username'], time() + (86400 * 30)); 
				setcookie("pass", $row['password'], time() + (86400 * 30)); 
			}
			$_SESSION['username'] = $username;
	    	header("Location: accueil.php");
		}
	}
	else{
		header('location:index.php');
		$_SESSION['message']="Please Login!";
	}
?>