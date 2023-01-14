<?php 
    include('model/connection.php'); 
    $recieveIdForUpdateData  = $_GET['passIdForUpdate'];

    $selectDataForUpdateSQL = mysqli_query($conn,"SELECT * FROM registered_student where id = '$recieveIdForUpdateData'");
    $FetchArrayForUpdateSQL =mysqli_fetch_array($selectDataForUpdateSQL);

    ?>

<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/admit-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
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
        <?php   include('include/header.php');?>
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
                            <a href="student_profile.php?passId=<?php echo $recieveIdForUpdateData;?>" class="nav-link"><i class="flaticon-classmates"></i><span>Back To Profile</span></a>
                             
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Registration Update</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Student Registration Update</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Students Record</h3>
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

                        <form class="new-added-form" action="model/update_Data.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo $FetchArrayForUpdateSQL['id'];?>">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label> Full Name *</label>
                                    <input type="text" name="student_name"  value="<?php echo $FetchArrayForUpdateSQL['full_name'];?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father Name *</label>
                                    <input type="text" name="father_name"   value="<?php echo $FetchArrayForUpdateSQL['father_name'];?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender" >
                                        <option value="<?php echo $FetchArrayForUpdateSQL['gender'];?>" selected="" ><?php echo $FetchArrayForUpdateSQL['gender'];?></option>
                                         
                                        <option value="Male">Male</option>
                                   
                                        <option value="Female">Female</option>
                                     
                                         
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Current Date Of Birth *</label>
                                    <input type="text" name="dob"  value="<?php echo $FetchArrayForUpdateSQL['dob'];?>" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label> Current Session  *</label>
                                    <input type="text" name="session" class="form-control" value="<?php echo $FetchArrayForUpdateSQL['session_id']; ?>">
                             
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Religion *</label>
                                    <select class="select2" name="religion" >
                                         
                                         
                                        <option value="Others" selected="">Others</option>
                                        <option value="Islam">Ilsam</option>
                                    </select>
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>E-Mail</label>
                                    <input type="email" name="email"  value="<?php echo $FetchArrayForUpdateSQL['email'];?>" class="form-control">
                                </div>
                                <!-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Current Class *</label>
                                    <select class="select2" name="class" >
                                        <option value="<?php echo $FetchArrayForUpdateSQL['class']; ?>"><?php echo $FetchArrayForUpdateSQL['class']; ?></option>
                                        <option value="Play">Play</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                        <option value="Four">Four</option>
                                        <option value="Five">Five</option>
                                        <option value="Six">Six</option>
                                        <option value="Seven">Seven</option>
                                        <option value="Eight">Eight</option>
                                        <option value="Nine">Nine</option>
                                        <option value="Ten">Ten</option>
                                    </select>
                                </div> -->
                                 
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Admission ID</label>
                                    <input type="text" name="admission_id"  value="<?php echo $FetchArrayForUpdateSQL['admission_id'];?>" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone</label>
                                    <input type="text" placeholder="Enter Phone Number"  name="phone" value="<?php echo $FetchArrayForUpdateSQL['phone'];?>" class="form-control">
                                </div>
                                <?php $location = 'studentImages'; ?>
                                 
                                <div class="col-lg-3 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Update Student Photo If You Want (150px X 150px)</label>
                                       <input type="file" name="photo" >
                                </div>

                                <div class="col-lg-4 col-12 form-group mg-t-30">
                                       <label class="text-dark-medium">Current Image</label>
                                       <img src="studentImages/<?php echo $FetchArrayForUpdateSQL['photo'];?>" width="150px" height="150px">
                                </div>

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="update_student_registration">Save Updation's</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Remove Updataion's</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
               <footer class="footer-wrap-layout1">
                      Designed & Developed By <a href="img/Bilal hussain.jpg">Bilal Hussain</a> 0300-5974777 
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