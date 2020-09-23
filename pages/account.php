<?php session_start();
  require_once 'connection.php';

  if(isset($_POST['submit'])){

    $filename1 = str_replace(" ", "_","{$_FILES['attach']['name']}");
    $queryup=$conn->query("UPDATE user_data SET u_name='{$_POST['u_name']}' , u_email='{$_POST['u_email']}' ,u_tel='{$_POST['u_tel']}' ,u_company='{$_POST['u_company']}',u_pp='{$filename1}' WHERE u_id='{$_SESSION['user_id']}' ");


      // destination of the file on the server
      $destination1 = '../img/userpp/' . $filename1;
  
      // get the file extension
      $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
  
      // the physical file on a temporary uploads directory on the server
      $file1 = $_FILES['attach']['tmp_name'];
      $size1 = $_FILES['attach']['size'];
  
      if (!in_array($extension1, ['png', 'jpg', 'jpeg'])) {
          echo "You file extension must be .png, .jpg or .jpeg";
      } 
      elseif ($_FILES['attach']['size'] > 200000000) { // file shouldn't be larger than 200Megabyte
          echo "File too large!";
      } 
      else {
          // move the uploaded (temporary) file to the specified destination
          if (move_uploaded_file($file1, $destination1)) {
            echo "uploaded file.";
          } else {
              echo "Failed to upload file.";
          }
      }
  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Prologic IT | Test</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="assets/css/main.css">


</head>
<body>

<body class="fixed-sn deep-purple-skin">

<!--Double navigation-->
<header>
   <!-- Sidebar navigation -->
   <div id="slide-out" class="side-nav sn-bg-4 fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
        <div class="logo-wrapper waves-light">
          <a href=""><img src="../img/lo.png" class="img-fluid flex-center"></a>
        </div>
      </li>
      <!--/. Logo -->
      <!-- Side navigation links -->

      <?php require '../inc/mainnav.php'; ?>
      <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>
  <!--/. Sidebar navigation -->
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <!-- SideNav slide-out button -->
    <div class="float-left">
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
    </div>
    <!-- Breadcrumb-->
    <div class="breadcrumb-dn mr-auto">
      <p>Customer Account</p>
    </div>
          <?php require '../inc/stnav.php'; ?>
  </nav>
  <!-- /.Navbar -->
</header>
<!--/.Double navigation-->
<main style="padding-top:100px">     
  <div class="main">
		<div class="main-content">
    <div class=""  > 
      <div class="card pb-5 container-fluid " style="width:80%">
        <h5 class="card-header h5">My Details</h5>
        <div class="card-body">



          <?php if($_SESSION["user_type"]=="customer"){?> 
          <form method="post" action="account.php" enctype="multipart/form-data" >
            <?php
            $result=$conn->query("SELECT * FROM user_data WHERE u_id='{$_SESSION['user_id']}'");
            while($row=$result->fetch_assoc()){
              $u_name=$row['u_name'];
              $u_email=$row['u_email'];
              $u_tel=$row['u_tel'];
              $u_company=$row['u_company'];
              $u_pp=$row['u_pp'];
              $u_id=$row['u_id'];
            }
           
            ?>

            
            <center><img src="../img/userpp/<?php echo $u_pp; ?>" id="u_pp" width="200px" class="rounded-circle z-depth-2 img-thumbnail" id="profile-image"></center>
            <br>
            <div id="pp_upload" class="file-field medium md-form">
              <div class="btn btn-sm  btn-secondary float-left">
                  <span>Choose file</span>
                  <input  type="file" name="attach" >
              </div>
              <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" value="<?php echo $u_pp; ?>" placeholder="Upload Attachment">
              </div>
            </div>

            <div class="md-form mt-0">
                <input type="text"  class="form-control" value='<?php echo $u_name; ?>' name="u_name" id="u_name" required disabled>
                <label >User Name</label>
            </div>

            <div class="md-form mt-0">
                <input type="email"  class="form-control" value='<?php echo $u_email; ?>' name="u_email"  id="u_email" required disabled>
                <label >Email</label>
            </div>

            <div class="md-form mt-0">
                <input type="text"  class="form-control" value='<?php echo $u_tel; ?>' name="u_tel"  id="u_tel" required disabled>
                <label >Mobile Number</label>
            </div>

            <div class="md-form mt-0">
                <input type="text"  class="form-control" value='<?php echo $u_company; ?>' name="u_company" id="u_company" required disabled>
                <label >Company</label>
            </div>

            <input type="hidden"  class="form-control" value='<?php echo $u_id; ?>' name="u_id" id="u_id" required disabled>


        
            


            <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 hide" id="submit" type="submit" name="submit">Update Details </button>

          </form>
          
          <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 hide" id="keep"  name="edit">Keep Current Details </button>
          <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 hide" id="edit"  name="edit">Edit Details </button>
          <?php } ?>




        </div>
      </div>
    </div>
    </div>
  </div>
</main>
        

</body>



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
  
  <script type="text/javascript">
    $(document).ready(() => {
      // SideNav Initialization
      $(".button-collapse").sideNav();
        new WOW().init();
    });
  
    $(document).ready(function(){
        $("#submit").hide();
        $("#keep").hide();
        $("#pp_upload").hide();
      $("#edit").click(function(){
        $("#submit").show();
        $("#keep").show();
        $("#edit").hide();
        $("#u_pp").hide();
        $("#pp_upload").show();
        $('#u_name').removeAttr('disabled');
        $('#u_email').removeAttr('disabled');
        $('#u_tel').removeAttr('disabled');
        $('#u_company').removeAttr('disabled');
      });
      
      $("#keep").click(function(){
        $("#submit").hide();
        $("#keep").hide();
        $("#edit").show();
        $("#u_pp").show();
        $("#pp_upload").hide();
        $('#u_name').attr('disabled');
        $('#u_email').attr('disabled');
        $('#u_tel').attr('disabled');
        $('#u_company').attr('disabled');
      });
    });


  </script>




</body>
</html>













