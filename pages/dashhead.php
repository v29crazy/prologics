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
                <h2 class="text-center mb-4 mt-4 font-weight-bold">Customer List
                </h2><hr>


                    <input class="form-control mb-4" id="tableSearc" type="text" placeholder="Type something to search list items">
                    <table id="myTabl" class="table table-striped table-responsive-md btn-table bg-white" >
        
                        <thead class=" white-text" style="background:#430234">
                        <tr>
                            <th>Register Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Company</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>Notice</th>
                        </tr>
                        </thead>
                    
                        <tbody>
                            
                    <?php
                        
                        $resultsetyear=$conn->query("SELECT * FROM user_data WHERE u_active='yes'");
                        while($row=$resultsetyear->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>{$row['u_id']}</td>";
                        echo "<td>{$row['u_name']}</td>";
                        echo "<td>{$row['u_email']} </td>";
                        echo "<td>{$row['u_tel']}</td>";
                        echo "<td>{$row['u_company']} </td>";
                        echo "<td><a href=\"cinspection.php?edit={$row['u_id']}\"><i class='far fa-eye'></i></i></a> </td>";
                        echo "<td><a href=\"dashhead.php?rmv={$row['u_id']}\"><i class='far fa-trash-alt'></i></a> </td>";
                        echo "<td><a href=\"addnotice.php?add={$row['u_id']}\"><i class='far fa-sticky-note'></i></a> </td>";


   
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
  
  </script>




</body>
</html>













