<!doctype html>
<html class="no-js" lang="">
 

<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-promotion.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS | Students Promotion</title>
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
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
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
        <?php include('include/header.php');?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
          <?php include('include/side_menu.php');?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Session </h3>
                    <ul>
                        <li>
                            <a href="index.phps">Home</a>
                        </li>
                        <li>New Batch</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Promotion Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Batch</h3>

                            </div>

                                  
                           
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


                        <?php //$end = date("Y", strtotime('+4 years')); ?>
                        <?php $end = date("Y");
                            $current_monthe = date("m");

                            if($current_monthe < 6){
                                $selectedBatch = "Fall";
                            }
                            else{

                                $selectedBatch = "Spring";
                            }
                         ?>
                        <form class="new-added-form" action="model/insert_Data.php" method="post">
                            <div class="row">
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>From Year *</label>
                                       <input type="number" name="from_year" value="<?php  echo $end;?>" class="form-control" placeholder="To Year">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>To Year *</label>
                                    <input type="number" name="to_year" value="<?php  echo $end;?>" class="form-control" placeholder="To Year">
                                </div>
                                
                                
                                <div class="col-12 form-group mg-t-8">
                                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save" name="batch_save"> 
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- Student Promotion Area End Here -->
               <footer class="footer-wrap-layout1">
                      Designed By <a href="tel:+923005974777">Bilal Hussain</a>
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
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Smoothscroll Js -->
    <script src="js/jquery.smoothscroll.min.html"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-promotion.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:02 GMT -->
</html>