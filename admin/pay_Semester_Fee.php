<?php include('model/connection.php'); ?>
<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/student-promotion.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:52:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS

</title>
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
    <!-- <div id="preloader"></div> -->
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
         <!-- Header Menu Area Start Here -->
        <?php include('include/header.php');?>
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
                            <a href="add_fee.php" class="nav-link"><i class="flaticon-classmates"></i><span>Go Back</span></a>
                             
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
                    <h3>Students Fee Payment</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Student Fee Submission</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Promotion Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                             <?php
                                      $recieveStdId = $_GET['passIdForFee']; 
                                      $recvSemId = $_POST['semester_idPass']; 

                                      //////////////session Name getting///////////////////////////
                                      $session_id  = $_POST['session_id'];
                                      
                                      $batchName = $_POST['batchName'];
                                        
                                      $selectSessionName = mysqli_query($conn,"SELECT * FROM session WHERE id = '$session_id'");
                                      $fetchSessionId = mysqli_fetch_array($selectSessionName);
                                      $storedSessionId  =  $fetchSessionId['id'];
                                      $storedSessionName  =  $fetchSessionId['session'];
                                       
                                      ///////////////////////////////////////////////////////////

                                    $selectStudentSession = mysqli_query($conn,"SELECT * FROM registered_student WHERE id = '$recieveStdId'");
                                    $fetchSessionArray = mysqli_fetch_array($selectStudentSession);
                                    $fetchExactSession = $fetchSessionArray['session_id'];
                                    $fetchFullName = $fetchSessionArray['full_name'];
                                    
                                 $selectSemesers = mysqli_query($conn,"SELECT * FROM semester where id = '$recvSemId'");
                                 $selectSemesterAmount = mysqli_query($conn,"SELECT * FROM semester_fee ");

                                 $current_date = date("Y-m-d");
                                  ?>
                                   

                            <div class="item-title">
                                <h3>Pay Here For <i style="color: red;"><?php echo  $fetchFullName; ?></i></h3>
                            </div>
                           
                        </div>
                         

                        <form name="myForm" class="new-added-form" action="model/insert_Data.php" method="post" onsubmit="return validateForm()">
                            <div class="row">

                               
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Fee For Semester</label>
                                     
                                    <?php  $show = mysqli_fetch_array($selectSemesers);?>  
                                     <input type="text"  readonly class="form-control" 
                                        value=" <?php echo $storedSessionName. "  [ ".$show['semester']." ]";?>">
                                </div>

                                <!-- data to be passed for submission into database -->
                                    <input type="hidden" value="<?php echo $recieveStdId;?>" name="std_id">
                                    <input type="hidden" value="<?php echo $recvSemId;?>" name="semester_id">
                                    <input type="hidden" value="<?php echo $storedSessionId;?>" name="session_id">
                                    <input type="hidden" value="<?php echo $batchName;?>" name="batchName">
                                <!-- data to be passed for submission into database -->

                               <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Amount </label>                                      
                                    <?php 
                                    // echo $recvSemId. "  / ".$storedSessionId;
                                        $fetchTotalAmountQuery = mysqli_query($conn,"SELECT * FROM semester_fee WHERE session_id = '$storedSessionId' AND semester_id = '$recvSemId'");
                                     $showTotalAmount = mysqli_fetch_array($fetchTotalAmountQuery);
                                     $resultTotalAmount = $showTotalAmount['amount'];
                                     ?>  
                                     <input type="text"  readonly class="form-control" 
                                        value=" <?php echo $resultTotalAmount;?>" name="total_amount">
                                </div>


                                 
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <!-- code for paid amount/////////////////////////////// -->
                                    <?php 
                                        $fetchPaidAmountQuery = mysqli_query($conn,"SELECT * FROM student_submitted_fee  WHERE student_id = '$recieveStdId' AND    semester_id = '$recvSemId' AND session_id = '$storedSessionId' ");
                                        while($ResultPaidAmout = mysqli_fetch_array($fetchPaidAmountQuery)){

                                         $TotalPaidAmount =  @$TotalPaidAmount  + @$ResultPaidAmout['submitted_fee'];
                                            // echo $TotalPaidAmount;
                                             
                                        }
                                     ?>



                                      <!-- amount to be paid are  -->
                                      <?php 
                                      /////////////////////////////////////////////////////////////////////
                                      // code for fetching concission amount //////////////////////////////

                                        $concSelectQuery = mysqli_query($conn,"SELECT * FROM concissions WHERE student_id = ' $recieveStdId' AND semester_id = '$recvSemId' AND session_id = '$storedSessionId'");

                                                    $fetchConcissionArray = mysqli_fetch_array($concSelectQuery);
                                                    $ConcissionAmount  =  @$fetchConcissionArray['concission_upto'];
                                                     

                                      // code for fetching concission amount  ends//////////////////////////
                                      //////////////////////////////////////////////////////////////////////

                                      @$amountToBePaid = $resultTotalAmount - $TotalPaidAmount - $ConcissionAmount;
                                       ?>
                                    <label>Amount Balance</label>
                                     <input type="text" class="form-control" name="amount" value="<?php if($amountToBePaid>0){echo $amountToBePaid;}else{echo "Fully Paid";}
                                        ?>">

                                     <input type="hidden" name="alreadyPaid" value="<?php echo $TotalPaidAmount; ?>">
                                     <input type="hidden" name="concission" value="<?php echo $ConcissionAmount; ?>">
                                </div>


                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Submission Date</label>
                                     <input type="date" readonly="" class="form-control" value="<?php echo $current_date;?>" name="dos" >
                                </div>
                                 
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" name="submit_fee" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Default</button>
                                </div>
                            </div>

                            <input type="hidden" name="amountTobepaid" value="<?php echo $amountToBePaid;?>">
                        </form>
                    </div>
                </div>
                <!-- Student Promotion Area End Here -->
                <footer class="footer-wrap-layout1">
                      Designed By <a href="img/Bilal hussain.jpg">Bilal Hussain</a> 0300-5974777 
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>


    <script>
        function validateForm() {
          const  x = document.forms["myForm"]["total_amount"].value;
          const  y = document.forms["myForm"]["amount"].value;
          const  z = document.forms["myForm"]["alreadyPaid"].value;
          const  zA = document.forms["myForm"]["concission"].value;

          const  sum = parseInt(z) + parseInt(y)+ parseInt(zA);

          if (x < sum) {

            alert("Total Amount Are "+x + " And Paid WillBe "+sum+" So Entered Amount Is More Than Total Amount Please Correct It And Then Submit");
            return false;
          }
}
</script>
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