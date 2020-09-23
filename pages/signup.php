<?php

require_once 'connection.php'; 

session_start();

?>


<!DOCTYPE html>
<html>
<head>
<title>FSC University of Ruhuna</title>
	<link rel="stylesheet" type="text/css" href="../css/lstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="icon" href="img/ss.png" type="image/x-icon">
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
      <form method="post"  action="mail/index.php">
				<img src="../img/avatar.png">
				<h2 class="title">Registration</h2>
            <div class="md-form"> 
                <input type="text"  name="u_name" class="form-control"  required>
                <label id="lname" class="font-weight-bold">Name</label>
            </div>  
            <div class="md-form">
              <input type="email" name="u_email" class="form-control" required>
              <label class="font-weight-bold" >E-mail</label>
            </div>
            <div class="md-form">
              <input type="text" name="u_tel" class="form-control" required>
              <label class="font-weight-bold" >Telephone</label>
            </div>
            <div class="md-form">
              <input type="text" name="u_company" class="form-control" required>
              <label class="font-weight-bold" >Company</label>
            </div>
        <div class="md-form text-center">
            <button type="submit" class="btn purple-gradient" name="submitnew">Sign Up</button>
        </div>


      </form>
			
    </div>
  </div>


    <?php
      if(isset($_GET['modal'])){
      if($_GET['modal']=="existid"){
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
          <h4 class="modal-title w-100" id="myModalLabel">Registration Number Exist </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Please check your Registration Number.This Registration Number already have account.
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
      if($_GET['modal']=="existemail"){
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
          <h4 class="modal-title w-100" id="myModalLabel">Email Exist </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Please check your enterd email.It has already have account.
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>


  <!-- jQuery -->
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

