<!doctype html>
<html class="no-js" lang="">

<?php 

include('model/connection.php');


?>
<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:50:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="../logo.jpeg">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
       <?php include('include/header.php'); ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
           <?php include('include/side_menu.php'); ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Admin</li>
                    </ul>
                </div>
                  <!-- Coding Starts for receiving messages after submiting -->
                          <?php 
                                    if(isset($_GET['errorMsg'])){
                                     ?>
                                         <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                             <?php echo $_GET['errorMsg'];?></div>
                                     <?php }else if(isset($_GET['successMsg'])){?>
                                        <div class="alert alert-success alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert">&times;</button> 
                                         <?php echo $_GET['successMsg'];?></div>
                                    <?php }?>
                        <!-- Coding End for receiving messages after submiting -->       
                <!-- Breadcubs Area End Here -->
                
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap ">
                        
                            <tr>
                                <td>ID#</td>
                                <td>Current User Name</td>
                                <td>Current Password</td>
                                <td>Change</td>
                                 
                            </tr>
                             
                            <?php 
                            
                            $i= 1; $select_all_user = mysqli_query($conn,"SELECT * FROM login"); 
                            while($show = mysqli_fetch_array($select_all_user)){ ?>
                            <tr>
                                
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $show['user_name'] ;?></td>
                                <td><?php echo $show['password'] ;?></td>
                                <td><a href="update-user.php?user_id=<?php echo $show['id'];?>" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Change</a></td>

                            </tr>
                        <?php } ?>
                       
                    </table>
                </div>
              
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Counterup Js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Moment Js -->
    <script src="js/moment.min.js"></script>
    <!-- Waypoints Js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Full Calender Js -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- Chart Js -->
    <script src="js/Chart.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:50:50 GMT -->
</html>