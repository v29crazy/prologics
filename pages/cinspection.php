<?php 
  session_start();
  require_once 'connection.php';
  if(isset($_GET['edit'])){
    $_SESSION['current_cutomer']=$_GET['edit'];
  }


  if(isset($_POST['submit'])){

    $filename1 = str_replace(" ", "_","{$_FILES['attach']['name']}");
    $conn->query("UPDATE user_data SET u_name='{$_POST['u_name']}' , u_email='{$_POST['u_email']}' ,u_tel='{$_POST['u_tel']}' ,u_company='{$_POST['u_company']}',u_pp='{$filename1}' WHERE u_id='{$_POST['u_id']}' ");
    
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
    header("location:dashhead.php");
  }

  if (isset($_GET['notice'])) {
    $id = $_GET['notice'];

    // fetch file to download from database
    $sql = "SELECT * FROM notes WHERE n_id='$id'";
    $rst = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($rst);
    $filepath = '../img/note/' . $file['n_attachment'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../img/note/' . $file['n_attachment']));
        readfile('../img/note/' . $file['n_attachment']);

        exit;
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
      <div class="card pb-5 container-fluid mb-5" style="width:80%">
        <h5 class="card-header h5">Customer Details</h5>
        <div class="card-body">



          <form method="post" action="cinspection.php" enctype="multipart/form-data" >
            <?php
            $result=$conn->query("SELECT * FROM user_data WHERE u_id='{$_SESSION['current_cutomer']}'");
            while($row=$result->fetch_assoc()){
              $u_name=$row['u_name'];
              $u_email=$row['u_email'];
              $u_tel=$row['u_tel'];
              $u_company=$row['u_company'];
              $u_pp=$row['u_pp'];
              $u_id=$row['u_id'];
            }
           
            ?>
            <div class="row my-5">
              <div class="col-md-6">
                <center><img src="../img/userpp/<?php echo $u_pp; ?>" id="u_pp" width="200px" class="rounded-circle z-depth-2 img-thumbnail" id="profile-image"></center>
                <div id="pp_upload" class="file-field medium md-form">
                  <div class="btn btn-sm  btn-secondary float-left">
                      <span>Choose file</span>
                      <input  type="file" name="attach" >
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" value="<?php echo $u_pp; ?>" placeholder="Upload Attachment">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mt-0">
                    <input type="text"  class="form-control" value='<?php echo $u_name; ?>' name="u_name" id="u_name" required >
                    <label >User Name</label>
                </div>

                <div class="md-form mt-0">
                    <input type="email"  class="form-control" value='<?php echo $u_email; ?>' name="u_email"  id="u_email" required >
                    <label >Email</label>
                </div>

                <div class="md-form mt-0">
                    <input type="text"  class="form-control" value='<?php echo $u_tel; ?>' name="u_tel"  id="u_tel" required >
                    <label >Mobile Number</label>
                </div>

                <div class="md-form mt-0">
                    <input type="text"  class="form-control" value='<?php echo $u_company; ?>' name="u_company" id="u_company" required >
                    <label >Company</label>
                </div>
              </div>
            </div>
            <br>


            <input type="hidden"  class="form-control" value='<?php echo $u_id; ?>' name="u_id" id="u_id" required >
            <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 hide" id="keep"  name="edit">Keep Current Details </button>


        
            


            <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 " id="submit" type="submit" name="submit">Update Details </button>

          </form>
         
          <button class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 " id="edit"  name="edit">Edit Details </button>

            <hr><br>
          <h6 class="card-header h6">Customer Notes</h6>
          
          <?php
          $resultnote=$conn->query("SELECT * FROM notes WHERE u_id='{$_SESSION['current_cutomer']}' AND n_active='yes' ");
          ?>
          <div class="m-4"> 
            <div class="row">
              <div class="col-md-6">
                <a class="waves-effect waves-dark btn btn-sm btn-primary m-0 mt-4 "  href="addnotice.php?add=<?php echo $u_id; ?>" id="addn"  name="edit">Add Note </a>
              </div>

              <div class="col-md-6">
                <div class="md-form active-purple active-purple-2 mb-3">
                  <input class="form-control" id="tableSearc" type="text" placeholder="Search" aria-label="Search">
                </div>
              </div>
            </div>
            <table id="myTabl" class="table table-striped table-responsive-md btn-table bg-white " >

                <thead class=" white-text" style="background:#430234">
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Notice Head</th>
                    <th>Description</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
                </thead>
            
                <tbody>
                    
            <?php
                $i=1;
                while($row=$resultnote->fetch_assoc()){
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['n_name']}</td>"; ?>
                 <td> <?php echo substr($row['n_desc'],0,100)."..."; ?> <?php "</td>";
                echo "<td><a href=\"cinspection.php?de={$row['n_id']}\"><i class='far fa-eye'></i></i></a> </td>";
                echo "<td><a href=\"dashhead.php?rmvnt={$row['n_id']}\"><i class='far fa-trash-alt'></i></a> </td>";
                $i++;


                echo "</tr>";
                }
            ?>

                
                </tbody>
            
            </table>
          </div>
                            



        </div>
      </div>
    </div>
    </div>
  </div>
</main>
        

</body>


<?php
	if(isset($_GET['de'])){
	?>
	<!-- Button trigger modal -->
    <button type="button" class="btn " id="modalsubmit" data-toggle="modal" data-target="#centralModalSm" style="width:1px; height:1px; background-color: Transparent;
      background-repeat:no-repeat;
      border: none;
      cursor:pointer;
      overflow: hidden; ">
    Launch demo modal
    </button>
    <?php $result=$conn->query("SELECT * FROM notes WHERE n_id='{$_GET['de']}' ");
    while($row=$result->fetch_assoc()){
      $n_name=$row['n_name'];
      $n_desc=$row['n_desc'];
      $n_attachment=$row['n_attachment'];
      $n_id=$row['n_id'];
    }?>
    <!-- Central Modal Small -->
    <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-md" role="document">


      <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"><?php echo $n_name;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo $n_desc;
      if(isset($n_attachment)){


        echo "<br><br><a href='cinspection.php?notice={$n_id}' >
        <button type='submit' name='noticedownload' class='btn btn-teal btn-rounded btn-sm m-0'>Download</button>
        </a>";
      }?>
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

    $(document).ready(function() {
      $("#modalsubmit").click();
	  });

  </script>




</body>
</html>













