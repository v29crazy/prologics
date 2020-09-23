<?php session_start();
  require_once 'connection.php';

    if(isset($_POST['submit'])){

        $conn->query("UPDATE user_data SET u_name='{$_POST['u_name']}' , u_email='{$_POST['u_email']}' ,u_tel='{$_POST['u_tel']}' ,u_company='{$_POST['u_company']}' WHERE u_id='{$_SESSION['user_id']}' ");
    
    }

    if(isset($_GET['rmv'])){
        $conn->query("UPDATE user_data SET u_active='no' WHERE u_id='{$_GET['rmv']}' ");
     
    }
    if(isset($_GET['rmvnt'])){
        $conn->query("UPDATE notes SET n_active='no' WHERE n_id='{$_GET['rmvnt']}' ");
   
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
      <p>Administrator Account</p>
    </div>
          <?php require '../inc/stnav.php'; ?>
  </nav>
  <!-- /.Navbar -->
</header>
<!--/.Double navigation-->
<main style="padding-top:100px">     
  <div class="main">
	<div class="main-content">
            <!-- Form with header -->
            <div class="card wow fadeIn mb-5" data-wow-delay="0.3s">
                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">
                <h2 class="text-center mb-4 mt-4 font-weight-bold">All Notes
                </h2><hr>


                    <input class="form-control mb-4" id="tableSearc" type="text" placeholder="Type something to search list items">
                    <table id="myTabl" class="table table-striped table-responsive-md btn-table bg-white" >
        
                        <thead class=" white-text" style="background:#430234">
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>View</th>
                        </tr>
                        </thead>
                    
                        <tbody>
                            
                    <?php
                        $i=1;
                        $resultsetyear=$conn->query("SELECT * FROM notes WHERE u_id='{$_SESSION["user_id"]}' AND n_active='yes'");
                        while($row=$resultsetyear->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['n_name']}</td>"; ?>
                        <td> <?php echo substr($row['n_desc'],0,100)."..."; ?> <?php "</td>";
                        echo "<td><a href=\"note.php?de={$row['n_id']}\"><i class='far fa-eye'></i></i></a> </td>";


                            $i++;
                        echo "</tr>";
                        }
                    ?>

                       
                        </tbody>
                    
                    </table>
                            
                    </div>
            </div>
            <!-- Form with header -->
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


        echo "<br><br><a href='note.php?notice={$n_id}' >
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

    $(document).ready(function() {
      $("#modalsubmit").click();
	});
  
  </script>




</body>
</html>













