<?php
session_start();
require_once 'connection.php';

$resultuser=$conn->query("SELECT u_name FROM user_data WHERE u_id='{$_GET['add']}' ");
$username=mysqli_fetch_assoc($resultuser);
$u_name=$username['u_name'];
$u_id=$_GET['add'];

if(isset($_POST['addnewnotice'])){
    //////////////////////attach upload
    $filename1 = str_replace(" ", "_","{$_FILES['attach']['name']}");
    // destination of the file on the server
    $destination1 = '../img/note/' . $filename1;

    // get the file extension
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file1 = $_FILES['attach']['tmp_name'];
    $size1 = $_FILES['attach']['size'];

    if (!in_array($extension1, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } 
    elseif ($_FILES['attach']['size'] > 200000000) { // file shouldn't be larger than 200Megabyte
        echo "File too large!";
    } 
    else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file1, $destination1)) {
            $conn->query("INSERT INTO notes(u_id,n_name,n_desc,n_attachment) VALUES('{$_POST['u_id']}','{$_POST['n_name']}','{$_POST['n_desc']}','{$filename1}')");
        } else {
            echo "Failed to upload file.";
        }
    }
    header('Location:dashhead.php');
}
      
?>
lorem*100

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>FSC University of Ruhuna</title>
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
  <style>
.errors{
  color:red;
  margin-bottom:20px;
}
</style>
</head>

<body>

<body class="fixed-sn deep-purple-skin">
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
      <p>Add New Notice</p>
    </div>
    <?php require '../inc/stnav.php'; ?>
  </nav>
  <!-- /.Navbar -->
</header>
<!--/.Double navigation-->
<!--/.Double navigation-->


<main> 
<div class="main">
  <div class="main-content">
    <div class="stcontent "  style=" margin-top:100px"> 
      <div class="card pb-5 container-fluid " style="width:80%">
        <h5 class="card-header h5">Add New Notice to <?php echo $u_name; ?></h5>
        <div class="card-body">

            <form method="post" action="addnotice.php" enctype="multipart/form-data" >

                <div class="md-form mt-0">
                    <input type="text"  class="form-control" name="n_name" required>
                    <label >Title of Message</label>
                </div>

                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control" name="n_desc" rows="3"></textarea>
                    <label for="form7">Material textarea</label>
                </div>

                <div class="file-field medium md-form">
                <div class="btn btn-sm  btn-secondary float-left">
                    <span>Choose file</span>
                    <input  type="file" name="attach" >
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload Attachment">
                </div>
                </div>

                <input type="hidden" value="<?php echo $u_id; ?>" name="u_id">


                <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4"  type="submit" name="addnewnotice">SUBMIT</button>

            </form>

        </div>
      </div>
    </div>
  </div>
</div>
</main>
</body>


  <!-- jQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->



  <script>
  $(document).ready(() => {
  // SideNav Initialization
  $(".button-collapse").sideNav();

  new WOW().init();
  });

  </script>
</body>

</html>















