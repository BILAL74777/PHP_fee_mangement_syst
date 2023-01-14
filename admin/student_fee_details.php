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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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
    <!-- <div id="preloader"></div> -->
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
                            <a href="add_fee.php" class="nav-link"><i class="flaticon-classmates"></i><span>Fee Detail's And Add</span></a>
                             
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
                    <h3>Students Fee Submission</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Student Fee Detail's</li>
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
                <?php if(isset($_GET['passId']) or isset($_POST['passId'])){
                    
                    if(isset($_GET['passId']))
                    {
                        
                        $recievedId = $_GET['passId'];
                        
                    }
                    else if(isset($_POST['passId']))
                    {
                        $recievedId = $_POST['passId'];
                        
                    }
                    
                   if(isset($_GET['semester_idPass']))
                   { 
                       $recvSemesterId = $_GET['semester_idPass'];
                       
                   }else if(isset($_POST['semester_idPass']))
                   { 
                       $recvSemesterId = $_POST['semester_idPass'];
                       
                   }else if(isset($_POST['session_id']))
                   { 
                       $recvSessionId = $_POST['session_id'];
                       
                   }
                    $selectThroughId = mysqli_query($conn,"SELECT * FROM registered_student WHERE id = '$recievedId'");
                    
                    $fetchArray = mysqli_fetch_array($selectThroughId);
                    $student_id = $fetchArray['id'];
                    $fetchedStudentId = $fetchArray['id'];
                    $sessionStore = $fetchArray['session_id'];

                }

                 ?>

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Fee Detail's And Submission </h3>
                            </div>
                            
                        </div>

                        <div class="single-info-details">
                            <div class="item-img">
                               <img   src="studentImages/<?php echo $fetchArray['photo'];?>">


                               <?php $selectSemesterUploadedFee = mysqli_query($conn,"SELECT * FROM semester_fee WHERE session_id = '$sessionStore'"); ?>


                              

                            </div>
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?php echo $fetchArray['full_name']; ?></h3>
                                     
                                </div> 

                                
                               
                                <div class="info-table table-responsive">
                                    <table class="table text-nowrap ">
                                        <tbody>
                                            <tr>
                                                <td>Technology:</td>
                                                <?php 
                                                $ids = $fetchArray['technology'];

                                                    $techId = mysqli_query($conn,"SELECT * FROM technology where id = '$ids'");
                                                    $fetchTech = mysqli_fetch_array($techId);
                                                 ?>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchTech['technology']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="font-medium text-dark-medium"><?php $full_name = $fetchArray['full_name']; echo $full_name;  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Father Name:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['father_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Admission Date:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['admission_date']; ?></td>
                                            </tr>
                                            
                                             
                                            <tr>
                                                <td>Admission ID:</td>
                                                <td class="font-medium text-dark-medium"><?php echo $fetchArray['admission_id']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Batch : </td>
                                                <td class="font-medium text-dark-medium"><?php $batchName = $fetchArray['batch']; echo $batchName; ?></td>
                                            </tr>

                                             <tr>
                                                <td>Session :</td>
                                                <td class="font-medium text-dark-medium"> 
                                                    <?php 
                                                    
                                                    if(isset($_POST['session_id'])){
                                                                
                                                                $store_session = $_POST['session_id'];
                                                                
                                                            }else{
                                                                 $store_session =  $fetchArray['session_id'];
                                                            }
                                                       
                                                        $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                                        $fetchSessionArray = mysqli_fetch_array($selectSession);
                                                            $stored_session = $fetchSessionArray['session'];
                                                            echo $stored_session;
                                                            
                                                            $session_table_primary_id = $fetchSessionArray['id'];
                                         

                                                    ?>
                                                        
                                                    </td>
                                            </tr>


                                            
               
                                            <!-- div for the fist table -->
                                            <div>
                                                
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green"> Total Fee </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  Total Submitted </td>
                                                     
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Total Concission </td>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Balance </td>
                                                     
                                                 </tr>
                                                 
                                                  

                                                 <!-- 2nd Semester -->

                                                  
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> 
                                                                
                                                             <?php    $selectSemesterName = mysqli_query($conn,"SELECT * FROM semester WHERE id = '$recvSemesterId'");
                                                                    $shwoSemesterName = mysqli_fetch_array($selectSemesterName);
                                                                    
                                                                    echo $shwoSemesterName['semester'];
                                                                    ?>
                                                            
                                                    </td>
                                                    <td class="font-medium text-danger" style="border:1px solid green">
                                                        <?php $selectTotalFee = mysqli_query($conn,"SELECT * FROM semester_fee where semester_id = '$recvSemesterId' AND session_id = '$session_table_primary_id'");
                                                        $fetchselectTotalFee = mysqli_fetch_array($selectTotalFee);
                                                        echo @$fetchselectTotalFee['amount'];
                                                        ?>
                                                    </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  
 
                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(submitted_fee) FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = '$recvSemesterId' ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $total_paid_to_us  =  $showTTLFee['SUM(submitted_fee)'];
                                                    echo $total_paid_to_us;  
                                                }

                                            ?>

                                                     </td>
                                                     
                                                    <!-- td for total concission -->
                                                     <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(concission_upto) FROM concissions WHERE student_id = '$fetchedStudentId' AND semester_id = '$recvSemesterId' ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $concission_with_student  =  $showTTLFee['SUM(concission_upto)'];
                                                    echo $concission_with_student;  
                                                }

                                            ?>

                                                     </td>
                                                     <td class="font-medium text-danger" style="border:1px solid green">
                                                            <?php 
                                                                $conc_and_paid = (@$total_paid_to_us + @$concission_with_student);
                                                                echo @$fetchselectTotalFee['amount'] - @$conc_and_paid;

                                                             ?>
                                                     </td>
                                                 </tr>
                                                 <?php //echo $fetchselectTotalFee['amount']. " / ".$total_paid_to_us. " / ".$conc_and_paid; exit();?>
                                                 <tr>
                                                    <td colspan="4">
                                                        <?php if(@$fetchselectTotalFee['amount'] - @$conc_and_paid != 0 OR @$fetchselectTotalFee['amount'] - @$conc_and_paid > 0 OR @$conc_and_paid < @$fetchselectTotalFee['amount']){?>
                                                        <form action="pay_Semester_Fee.php?passIdForFee=<?php echo $fetchArray['id']; ?>" method="post">
                                                             <input type="hidden" name="semester_idPass" value="<?php echo $recvSemesterId; ?>" />   
                                                             <input type="hidden" name="session_id" value="<?php echo $session_table_primary_id;  ?>" />
                                                             <input type="hidden" name="batchName" value="<?php echo $batchName;  ?>" />
                                                             <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Pay Now">  
                                                             
                                                              <?php }else{?>

                                                                <tr>
                                                                    <td colspan="2">
                                                                       
                                                                        <button type="submit" class="fw-btn-fill btn-gradient-red">Fully Paid  No Due's Against Mr . <?php echo $full_name; ?></button>
                                                                         
                                                                    </td>
                                                                </tr>
                    
                                                            <?php } ?>
                                                        </form>
                                                        
                                                    </td>
                                                 </tr>

                                                 
                                                 




                                            </div>
                                           
                                            <!-- DIV FOR THE DETAILED TABLE -->

                                            
                                            


                                          


                                            <tr>
                                                 <td class="font-medium text-dark-medium text-center" style="color:blue; font-weight: bold;" colspan="4"><hr> <br>Submitted Fee Detail's</td>
                                            </tr>
                                             <tr>
                                                  
                                                    <td class="font-medium text-danger" style="border:1px solid green">  Submitted </td>
                                                     
                                                    <td class="font-medium text-danger" style="border:1px solid green"> On Date </td>
                                                     
                                            </tr>
                                            <?php $selectAllFromSubmittedFee = mysqli_query($conn,"SELECT * FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = '$recvSemesterId' ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showFee = mysqli_fetch_array($selectAllFromSubmittedFee)){    
                                            ?>
                                           

                                             
                                             <tr>
                                                 
                                                <td  class="font-medium text-dark-medium " style="border:1px solid green"> PKR - <?php echo $showFee['submitted_fee']; ?> 
                                                </td>
                                                
                                                <td class="font-medium text-dark-medium" style="border:1px solid green"> <?php echo $showFee['submission_date']; ?>
                                                 </td>
                                               
                                            </tr>

                                             
                                             
                                     <?php 
                                     
                                  } ?>
                                            
                                             
                                            
                                 <tr>
                                     <td colspan="3"><hr></td>
                                 </tr>
                                            <!-- <tr>
                                                 <td>Total Paid</td>
                                                  <td class="font-medium text-dark-medium">PKR - <?php echo $totalPaid; ?></td>
                                             </tr> -->
                                             

                                            
                                            
                                          
                                            
                                           
                                            <tr>
                                                <td colspan="2">
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SEARCH FOR RECORD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                    <form action="student_fee_details.php?passId=<?php echo $fetchArray['id']; ?>" method="post">
              
                                        <div class="form-text">Select Semester</div> 
                                        
                                        <select class="form-control" name="semester_idPass">
                                             <?php $querySemester = mysqli_query($conn,'SELECT * FROM semester'); ?>
                                            <?php while($show = mysqli_fetch_array($querySemester)){?>
                                            
                                            <option value="<?php echo $show['id'];?>"><?php echo $show['semester'];?></option>
                                            
                                            <?php }?>
                                        </select>
                                        
                                          <div class="form-text">Select Session</div>
                                        <select class="form-control" name="session_id">
                                             <?php $querySess = mysqli_query($conn,"SELECT * FROM session WHERE batch ='$batchName'"); ?>
                                            <?php while($show = mysqli_fetch_array($querySess)){?>
                                            
                                            <option value="<?php echo $show['session'];?>"><?php echo $show['session'];?></option>
                                            
                                            <?php }?>
                                        </select>
                                        
                                      
                                        
                                        
                                        
                                      </div>
                                      <div class="modal-footer">
                                         
                                        <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Search Record">
                                      </div>
                                      
                                      
                                       </form>
                                      
                                      
                                      
                                      </div>
      
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
  Click Here To Search Session & Semester  For Fee Payment
</button>
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
                      Designed By <a href="img/Bilal hussain.jpg">Bilal Hussain</a> 0300-5974777 
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