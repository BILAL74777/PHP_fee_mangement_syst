<?php include('model/connection.php'); ?>

<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/add-expense.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:03 GMT -->
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
                    <h3>Add Fee For Semester</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Add Fee For Semester</li>
                    </ul>
                </div>
                   <!-- Coding Starts for receiving messages after submiting -->
                          <?php 
                                    if(isset($_GET['errorMsg']) && isset($_GET['errorMsg2'])){

                                     ?>
                                         <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>
                                             <?php echo "You Searched For  Session <strong style='color:red'> [ ". $_GET['errorMsg2']." ]</strong> This Session Prospectus Fee Is : <strong style='color:red'>PKR [  ".$_GET['errorMsg']." ]</strong>";?>
                                         </strong>
                                         </div>
                                     <?php }else if(isset($_GET['errorMsg'])){?>
                                        <div class="alert alert-warning alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert">&times;</button> 
                                         <?php echo $_GET['errorMsg'];?></div>
                                    <?php }?>
                        <!-- Coding End for receiving messages after submiting --> 
                <!-- Breadcubs Area End Here -->
                <!-- Add Expense Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Fee Here</h3>
                            </div>
                           
                        </div>
                        <form class="new-added-form" method="post" action="model/insert_Data.php">
                            <div class="row">
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select Batch Too *</label>
                                     <select name="batch" id="" class="form-control">
                                         
                                         <option selected="" hidden="">Select Batch Please</option>
                                         <?php 
                                            include('model/connection.php');
                                         $query = mysqli_query($conn,"SELECT * FROM batch");
                                            while($show = mysqli_fetch_array($query)){?>
                                                 <option value="<?php echo $show['batch'];?>"><?php echo $show['batch'];?></option>
                                            <?php }
                                         ?>
                                        
                                          
                                     </select>
                                </div>
                                
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select  Session *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM session  ORDER BY id ASC LIMIT 5');
                                       
                                     ?>
                                    <select class="select2" name="session" required="" >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['id']; ?>"><?php echo $show_Session['session']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>
                                  <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select  Semester *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM semester ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="select2" name="semester_id" required="" >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['id']; ?>"><?php echo $show_Session['semester']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>
                                
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Tution Fee *</label>
                                    <input type="text" placeholder="Enter Amount" name="amount" class="form-control">
                                </div>

                               <!--  <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Examination Fee *</label>
                                    <input type="text" placeholder="Enter Amount" name="exame_fee" class="form-control">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Registration Fee *</label>
                                    <input type="text" placeholder="Enter Amount" name="reg_fee" class="form-control">
                                </div> -->
                                
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" name="semester_fee_add" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Expense Area End Here -->
                <footer class="footer-wrap-layout1">
                      Designed By <a href="tel:+923339202521">Al-Fajr IT Solutions</a>
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
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/add-expense.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:03 GMT -->
</html>