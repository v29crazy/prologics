<?php

require_once 'connection.php';  



?>


<!DOCTYPE html>
<html>
<head>
<title>Prologic IT | Test</title>
	<link rel="stylesheet" type="text/css" href="../css/lstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="icon" href="img/WON.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/lstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
	<img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.png">
		</div>
		<div class="login-content">
			<form method="post" action="./php/login.php"  onsubmit="return check()">
				<img src="../img/avatar.png">
				<h2 class="title">Welcome</h2>

           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>User Id</h5>
           		   		<input type="text" class="input" name="id">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="SIGn in" name="login">
				<p>Not on user yet? <a href='signup.php'>SIGN UP</a></p>
            </form>
			
        </div>
    </div>


	<?php
	if(isset($_GET['modal'])){
		if($_GET['modal']=="epu"){
		?>
			<!-- Button trigger modal -->
			<button type="button" class="btn " id="submit" data-toggle="modal" data-target="#centralModalSm" style="width:1px; height:1px; background-color: Transparent;
			background-repeat:no-repeat;
			border: none;
			cursor:pointer;
			overflow: hidden; ">
			Launch demo modal
			</button>

			<!-- Central Modal Small -->
			<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">

			<!-- Change class .modal-sm to change the size of the modal -->
			<div class="modal-dialog modal-sm" role="document">


				<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title w-100" id="myModalLabel">Account Login Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					You can find pro-test account login details in your e-mail.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>
			<!-- Central Modal Small -->
		<?php
		}
	}
	?>

<?php
		if(isset($_GET['modal'])){
		if($_GET['modal']=="invalidpwd"){
		?>
		<!-- Button trigger modal -->
		<button type="button" class="btn " id="submit" data-toggle="modal" data-target="#centralModalSm" style="width:1px; height:1px; background-color: Transparent;
		background-repeat:no-repeat;
		border: none;
		cursor:pointer;
		overflow: hidden; ">
		Launch demo modal
		</button>

		<!-- Central Modal Small -->
		<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">

		<!-- Change class .modal-sm to change the size of the modal -->
		<div class="modal-dialog modal-sm" role="document">


			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100" id="myModalLabel">Invalid Password </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			Please check your Password.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
		</div>
		<!-- Central Modal Small -->
		<?php
		}}
	?>

	<?php
		if(isset($_GET['modal'])){
		if($_GET['modal']=="invalidun"){
		?>
		<!-- Button trigger modal -->
		<button type="button" class="btn " id="submit" data-toggle="modal" data-target="#centralModalSm" style="width:1px; height:1px; background-color: Transparent;
		background-repeat:no-repeat;
		border: none;
		cursor:pointer;
		overflow: hidden; ">
		Launch demo modal
		</button>

		<!-- Central Modal Small -->
		<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">

		<!-- Change class .modal-sm to change the size of the modal -->
		<div class="modal-dialog modal-sm" role="document">


			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100" id="myModalLabel">Invalid Username, Password </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Please check your Registration Number and Password.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
		</div>
		<!-- Central Modal Small -->
		<?php
		}}
	?>
	
	<?php
		if(isset($_GET['modal'])){
		if($_GET['modal']=="notap"){
		?>
		<!-- Button trigger modal -->
		<button type="button" class="btn " id="submit" data-toggle="modal" data-target="#centralModalSm" style="width:1px; height:1px; background-color: Transparent;
		background-repeat:no-repeat;
		border: none;
		cursor:pointer;
		overflow: hidden; ">
		Launch demo modal
		</button>

		<!-- Central Modal Small -->
		<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">

		<!-- Change class .modal-sm to change the size of the modal -->
		<div class="modal-dialog modal-sm" role="document">


			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100" id="myModalLabel">Account Terminated </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Your Account Terminated.please contact admin.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
		</div>
		<!-- Central Modal Small -->
		<?php
		}}
	?>
	
	


<script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="../js/lmain.js"></script>
  <script>
  $(document).ready(function() {
$('.mdb-select').materialSelect();
});
  </script>
    <script type="text/javascript" src="../js/lmain.js"></script>

	<script>
    $(document).ready(function() {
      $("#submit").click();
	  });
	</script>

</body>
</html>