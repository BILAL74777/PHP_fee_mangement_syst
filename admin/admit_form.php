<?php 
    include('model/connection.php'); ?>

<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/admit-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS | Admission Form</title>
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
        <?php   include('include/header.php');?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
          <?php include('include/side_menu.php'); ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Registration</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Student Registration Form</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Students</h3>
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

                        <form class="new-added-form" action="model/insert_Data.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Technology *</label>
                                    <?php $fetchTechnology = mysqli_query($conn,'SELECT * FROM technology ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="select2" name="technology" required="" >
                                    <?php
                                      while($show_Technology = mysqli_fetch_array($fetchTechnology)){ ?>
                                    <option value="<?php echo $show_Technology['id']; ?>"><?php echo $show_Technology['technology']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Full Name *</label>
                                    <input type="text" name="student_name" required="" placeholder="Enter Student Name" class="form-control">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father Name *</label>
                                    <input type="text" name="father_name" required=""  placeholder="Enter Father Name" class="form-control">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender" required="" >
                                        <option value="">Please Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Birth *</label>
                                    <input type="text" name="dob" required=""  placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Religion *</label>
                                    <select class="select2" name="religion" required="" >
                                        <option value="">Please Select</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Marital Status *</label>
                                    <select class="select2" name="marital_status" required="" >
                                        <option value="">Please Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                    </select>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Permanent Address *</label>
                                    <input type="street" name="street" required=""  placeholder="Enter postal address" class="form-control">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District *</label>
                                    <input type="city" name="district" required=""  placeholder="" class="form-control">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Domicile *</label>
                                    <input type="city" name="domicile" required=""  placeholder="" class="form-control">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Cell No. *</label>
                                    <input type="tel" name="phone" required=""  placeholder="NIC Number (format: xxxx-xxxxxxx)" class="form-control" pattern="^\d{4}-\d{7}$" title="Mobile Number (format:  xxxx-xxxxxxx)">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Candidate CNIC/Form B * </label>
                                    <input type="text" name="cnic"   placeholder="NIC Number (format: xxxxx-xxxxxxx-x)" class="form-control"  title="NIC Number (format: xxxxx-xxxxxxx-x)">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father's CNIC *</label>
                                    <input type="text" name="fcnic" required=""  placeholder="NIC Number (format: xxxxx-xxxxxxx-x)" class="form-control" pattern="^\d{5}-\d{7}-\d{1}$" title="NIC Number (format: xxxxx-xxxxxxx-x)">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student's E-Mail</label>
                                    <input type="email" name="email"   placeholder="Enter Correct Email " class="form-control">
                                </div>
                                
                               
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Batch *</label>
                                    <?php $fetchBatch = mysqli_query($conn,'SELECT * FROM batch ORDER BY id DESC');
                                       
                                     ?>
                                    <select class="select2" name="batch" required="" >
                                    <?php
                                      while($show_Batch = mysqli_fetch_array($fetchBatch)){ ?>
                                          <option value="<?php echo $show_Batch['batch']; ?>"><?php echo $show_Batch['batch']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>

                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Session *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM session ORDER BY id DESC');
                                       
                                     ?>
                                    <select class="select2" name="session" required="" >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['session']; ?>"><?php echo $show_Session['session']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>

                                
                                
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <!-- <label>Semester</label> -->
                                    <input type="hidden" name="semester"  readonly=""  placeholder="First Semester" class="form-control" >
                                </div>
                                 
                                
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                                    <input type="file" class="form-control-file" name="photo" required=""  accept="image/png, .jpeg, .jpg, image/gif" >
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="register_student">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
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
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/admit-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:00 GMT -->
</html>