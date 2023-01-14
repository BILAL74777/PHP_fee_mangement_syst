<?php include('model/connection.php'); ?>
<!doctype html>
<html class="no-js" lang=""> 


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
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
           <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="img/logo1.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        
                        <li class="nav-item sidebar-nav-item">
                            <a href="index.php" class="nav-link"><i class="flaticon-classmates"></i><span>All Student's</span></a>
                             
                        </li>

                         <li class="nav-item sidebar-nav-item">
                            <a href="index.php" class="nav-link"><i class="flaticon-classmates"></i><span>Main Menu</span></a>
                             
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Details</li>
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
                <!-- Student Details Area Start Here -->
                <?php if(isset($_GET['passId'])){
                    $recievedId = $_GET['passId'];
                    $selectThroughId = mysqli_query($conn,"SELECT * FROM registered_student WHERE id = '$recievedId'");
                    $fetchArray = mysqli_fetch_array($selectThroughId);
                }

                 ?>

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>About Student</h3>
                            </div>
                            
                        </div>
                        <div class="single-info-details">
                            <div class="item-img">
                               <img src="studentImages/<?php echo $fetchArray['photo'];?>">
                            </div>
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?php echo $fetchArray['full_name']; ?></h3>
                                     
                                </div> 

                                
                               
                                <div class="info-table table-responsive">
                                    <table class="table text-nowrap">
                                        <tbody>
                                             <tr>
                                                <td>Technology:</td>
                                                <?php
                                                $tecId =  $fetchArray['technology'];
                                                $selectTec = mysqli_query($conn,"SELECT * FROM technology where id = '$tecId'");
                                                $fetchTechArray = mysqli_fetch_array($selectTec);

                                                ?>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchTechArray['technology']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Admission ID:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['admission_id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['full_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Father Name:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['father_name']; ?></td>
                                            </tr>
                                             <tr>
                                                <td>Gender:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['gender']; ?></td>
                                            </tr>
                                              <tr>
                                                <td>CNIC/Form B Number:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['cnic']; ?></td>
                                            </tr>
                                             <tr>
                                                <td>Father's CNIC:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['fcnic']; ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Date Of Birth:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['dob']; ?></td>
                                            </tr>
                                           
                                             <tr>
                                                <td>Permanent Address:</td>
                                                <td class="font-medium text-dark-medium"><?php echo"Domicile ".$fetchArray['domicile']. "<br> Distt : ".$fetchArray['district']."<br> Street ".$fetchArray['street']; ?></td>
                                            </tr>
                                              
                                              
                                            <tr>
                                                <td>Marital Status:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['marital_status']; ?></td>
                                            </tr>
                                              
                                            <tr>
                                                <td>E-mail:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Semester</td>
                                                <?php 
                                                $sem_id = $fetchArray['semester'];
                                                    $semesterName = mysqli_query($conn,"SELECT * FROM semester where id = '$sem_id'");
                                                    $fetchSemId = mysqli_fetch_array($semesterName);
                                                 ?>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchSemId['semester']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Batch</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['batch']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Session </td>
                                                <td class="font-medium text-dark-medium"> 
                                                    <?php 
                                                        $store_session =  $fetchArray['session_id'];
                                                        $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                                        $fetchSessionArray = mysqli_fetch_array($selectSession);
                                                            echo $fetchSessionArray['session'];
                                         

                                                    ?>
                                                        
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>Admission Date:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['admission_date']; ?></td>
                                            </tr>
                                            
                                             
                                            
                                             
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['phone']; ?></td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">
                                                  <a href="update_student_profile.php?passIdForUpdate=<?php echo $fetchArray['id']; ?>">
                                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">UPDATE</button>
                                                    </a>
                                                </td>
                                            </tr>


                                        </tbody>

                                    
                                
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Details Area End Here -->
                <footer class="footer-wrap-layout1">
                       Designed & Developed By <a href="http://www.facebook.com/alfajritsol" target="_blank">Al-Fajr IT Solutions</a> 
                </footer>
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
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
</html>