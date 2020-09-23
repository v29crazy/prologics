<?php
	session_start();
	require_once '../connection.php';

	if(isset($_POST['login'])){


		$result1=$conn->query("SELECT * FROM user_data WHERE u_id='{$_POST['id']}'");
		$numu=mysqli_num_rows($result1);
		print_r($result1);
		
		$result2=$conn->query("SELECT * FROM head WHERE h_id='{$_POST['id']}'");
		$numh=mysqli_num_rows($result2);
		

		if($numu>0){
			
			$uname="yes";
			$row=mysqli_fetch_array($result1);
			if($row['u_active']=="yes"){
				if($row['u_password']==md5($_POST["password"])){
					$log="yes";
					$_SESSION["user_id"]=$_POST['id'];
					$_SESSION['user_name']=$row['u_name'];
					$_SESSION['user_type']="customer";
					
					header("location:../account.php");
		
				}
				else{
					header('Location:../login.php?modal=invalidpwd');
				}
			}
			else{
				header('Location:../login.php?modal=notap');
			}
			
		}

		
		if($numh>0){
			$uname="yes";
			$row=mysqli_fetch_array($result2);
			if($row['h_password']==md5($_POST["password"])){
				$log="yes";
				$_SESSION["user_id"]=$_POST['id'];
				$_SESSION['user_name']=$row['h_name'];
				$_SESSION['user_type']="head";
				
				header("location:../dashhead.php");
	
			}
			else{
				header('Location:../login.php?modal=invalidpwd');
			}
			
		}
		

		if($numu==0 && $numh==0){
			header('Location:../login.php?modal=invalidun');
		}



	}


?>