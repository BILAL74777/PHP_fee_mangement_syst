 <?php 
    include('model/connection.php'); ?>
<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-promotion.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS </title>
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

 <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                    <h3>Semester's Fee</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Semester's Fee</li>
                    </ul>
                </div>

                 
                <!-- Breadcubs Area End Here -->
                <!-- Student Promotion Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Search Semester's Fee In The Session</h3>
                            </div>
                            
                        </div>
                        <form class="new-added-form" action="model/searchData.php" method="post">
                            <div class="row">
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select  Batch *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM batch ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="select2" name="batch" required="" >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['batch']; ?>"><?php echo $show_Session['batch']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>
                                 
                                 
                                
                                 

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="searchSemesterFee">Search 
                                    </button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>

                            </div>
                        </form>




                        <!-- start table -->

                         <div class="">

          <!-- Page Heading -->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Semester's Fee In The Searched Batch</h6>
            </div>
            <div class="card-body">
                <!-- Coding Starts for receiving messages after submiting -->
                          <?php 
                                    if(isset($_GET['errorMsg']) && isset($_GET['errorMsg2'])){

                                     ?>
                                         <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>
                                             <?php echo "You Searched For  Batch <strong style='color:red'> [ ". $_GET['errorMsg2']." ]</strong> This Session Prospectus Fee Is : <strong style='color:red'>PKR [  ".$_GET['errorMsg']." ]</strong>";?>
                                         </strong>
                                         </div>
                                     <?php }else if(isset($_GET['errorMsg'])){?>
                                        <div class="alert alert-warning alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert">&times;</button> 
                                         <?php echo $_GET['errorMsg'];?></div>
                                    <?php }?>
                        <!-- Coding End for receiving messages after submiting -->
                        
                <?php if(@$_GET['dataPassess']){
                        $session_searched = @$_GET['dataPassess'];

                    $selectProsData = mysqli_query($conn,"SELECT * from semester_fee where batch = '$session_searched'");
                     ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                  <thead>
                    <tr class="text-center">
                      <th>S.No</th>
                     
                      <th>Semester</th>
                      <th>Session</th>
                      <th>Tution Fee</th>
                      <th>Reg Fee</th>
                      <th>Exame Fee</th>
                      <th>Total Fee</th>
                       
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="text-center">
                       <th>S.No</th>
                       
                      <th>Semester</th>
                      <th>Session</th>
                      <th>Tution Fee</th>
                      <th>Reg Fee</th>
                      <th>Exame Fee</th>
                      <th>Total Fee</th>
                      
                    </tr>
                     
                   </tfoot>
                     
                   <?php 

                   $i = 1;

                   while($show = mysqli_fetch_array($selectProsData)){ 
                    //echo $show['semester_id'];
                    ?>
                    <tr class="text-center">
                      <td><?php echo $i; ?></td>
                      
                      <td  style="color: red; font-weight: bold;">

                         <?php $search_semester =  $show['semester_id'];
                        // echo $session_searched." / ".$search_semester;

                         $selectSemester = mysqli_query($conn,"SELECT * FROM semester where id = '$search_semester'");
                       
                        $semesterArrayFetch = mysqli_fetch_array($selectSemester);
                         echo $semesterArrayFetch['semester'];
                         ?>
                             
                         </td>
                         <td>
                             <?php 

                                // batach selecting
                        $session_id = $show['session_id'];
                       $selectBatch = mysqli_query($conn,"SELECT * FROM session where id = '$session_id'");
                       $BatchArrayFetch = mysqli_fetch_array($selectBatch);
                        echo $BatchArrayFetch['session'];

                             ?>
                         </td>  
                         <td> PKR - <?php echo $show['amount'];?></td>
                         <td> PKR - <?php echo $show['reg_fee'];?></td>
                         <td> PKR - <?php echo $show['exame_fee'];?></td>
                         <td style="color: red; font-weight: bold;"> PKR - <?php echo $show['amount']+$show['reg_fee']+$show['exame_fee']; ?> </td>
                       
                    </tr>
                <?php $i++;} ?>



                  </tbody>

                </table>
                <a href="prospectus_fee_add.php" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Add New</a>
              </div>
            </div>
        <?php } ?>
          </div>

        </div>
        <!-- /.container-fluid -->
                        <!-- end table -->
                    </div>
                </div>
                <!-- Student Promotion Area End Here -->
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
    <!-- Smoothscroll Js -->
    <script src="js/jquery.smoothscroll.min.html"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

    <!-- Bootstrap core JavaScript-->
 
   <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
   

  <!-- Custom scripts for all pages-->
  <script src="jstable/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="jsjstable/demo/datatables-demo.js"></script>


</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-promotion.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:02 GMT -->
</html>