<?php include('model/connection.php'); ?>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/all-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS | All Students</title>
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
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
   <!--  <div id="preloader"></div> -->
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
                      <!-- Coding Starts for receiving messages after submiting -->
                          <?php 
                                    if(isset($_GET['loggedinMsg'])){
                                     ?>
                                         <div class="alert alert-success alert-dismissible text-center">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                             <?php echo $_GET['loggedinMsg'];?></div>
                                     <?php }?>
                        <!-- Coding End for receiving messages after submiting -->    
                    <h3>Student's Fee Details</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Search Students By Semester</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Fee Submission </h3>
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

                        <form class="new-added-form" action="model/searchData.php" method="post">
                            <div class="row">
                                   

                                 
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Search Through Reg#</label>
                                    
                                    <input type="text" class="form-control" placeholder="Enter Registration Number " name="regNo" value="<?php if(isset($_GET['searchRegNo'])){ echo "You Searched For :  [ ". $_GET['searchRegNo']." ]";}?>">
                                     
                             
                                </div>

                                  
                                 
                                 
                                

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark" name="searchstudentsHistory">Search 
                                    </button>
                                    <br>
                                </div>

                            </div>
                        </form>



                       <!-- coding for alert show after search -->


                        <?php  if(@$_GET['searchRegNo'] ){ 
                                $searchRegNo = @$_GET['searchRegNo'];                               

                                 ?>
                               <div class="alert alert-success text-center"> 
                                You Searched For   <strong style="color: red;"> 

                                  <?php                               
                                     
                                 echo  $searchRegNo; ?></strong> Check The Data Table!


                                        
                                </div>
                        <?php }  ?>

                      

                    <!-- coding for searching through form data session and semester ends -->
                    <!-- coding for searching through regNo starts-->

                    <?php if(@$_GET['searchRegNo']){ 
                                $searchRegNo = @$_GET['searchRegNo'];
                                 
                                                    $selectThroughId = mysqli_query($conn,"SELECT * FROM registered_student WHERE admission_id = '$searchRegNo'");
                    
                                                $fetchArray = mysqli_fetch_array($selectThroughId);
                                                $student_id = $fetchArray['id'];
                                                $fetchedStudentId = $fetchArray['id'];
                                                $sessionStore = $fetchArray['session_id'];
                                                $recvSemesterId = $fetchArray['semester'];
                 


                            ?>
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
                                                <td class="font-medium text-dark-medium"><?php $batchShowVariable =  $fetchArray['batch']; echo $batchShowVariable; ?></td>
                                            </tr>

                                             <tr>
                                                <td>Session :</td>
                                                <td class="font-medium text-dark-medium"> 
                                                    <?php 
                                                        $store_session =  $fetchArray['session_id'];
                                                        $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                                        $fetchSessionArray = mysqli_fetch_array($selectSession);
                                                            $stored_session = $fetchSessionArray['session'];
                                                            echo $stored_session;
                                                            $session_table_primary_id = $fetchSessionArray['id'];
                                         

                                                    ?>
                                                        
                                                    </td>
                                            </tr>

                                           

                                        </tbody>

                                    
                                
                                    </table>
                                </div>


<div class="info-table table-responsive">
                                    <table class="table text-nowrap ">
                                        <tbody>
                                             
                                        </tbody>

                                               
 <hr>
 <h5>Each Semester Fee Submitted</h5>


                                          

                                            <!-- div for the fist table -->
                                            <div>
                                                
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green"> Total Fee </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  Total Submitted </td>
                                                     
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Total Concission </td>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Balance </td>
                                                     
                                                 </tr>
                                                 <!-- firt semester -->
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester Fist </td>
                                                    <td class="font-medium text-danger" style="border:1px solid green">
                                                       
                                                        <?php $selectTotalFee = mysqli_query($conn,"SELECT * FROM semester_fee where semester_id = 1 AND batch = '$batchShowVariable'");
                                                        $fetchselectTotalFee = mysqli_fetch_array($selectTotalFee);
                                                        echo @$fetchselectTotalFee['amount'];
                                                        ?>
                                                    </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  

                                                 <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT *  FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 1 ORDER BY semester_id ASC"); 
                                                 $total_paid_to_us = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $total_paid_to_us   = $total_paid_to_us + (int)$showTTLFee['submitted_fee'];
                                                     
                                                }
                                                 echo $total_paid_to_us;

                                            ?>

                                                     </td>
                                                     
                                                    <!-- td for total concission -->
                                                     <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(concission_upto) FROM concissions WHERE student_id = '$fetchedStudentId' AND semester_id = 1 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $concission_with_student = $showTTLFee['SUM(concission_upto)'];
                                                    echo $concission_with_student;  
                                                }

                                            ?>

                                                     </td>
                                                      <td class="font-medium text-danger" style="border:1px solid green">
                                                            <?php 
                                                                $conc_and_paid = $total_paid_to_us + $concission_with_student;
                                                                echo (@$fetchselectTotalFee['amount'] - $conc_and_paid);

                                                             ?>
                                                     </td>
                                                 </tr>

                                                 <!-- 2nd Semester -->

                                                  
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester 2nd </td>
                                                    <td class="font-medium text-danger" style="border:1px solid green">
                                                        
                                                       <?php $selectTotalFee = mysqli_query($conn,"SELECT * FROM semester_fee where semester_id = 2  AND batch = '$batchShowVariable'");
                                                        $fetchselectTotalFee = mysqli_fetch_array($selectTotalFee);
                                                        echo @$fetchselectTotalFee['amount'];
                                                        ?>
                                                    </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(submitted_fee) FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 2 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $total_paid_to_us  =  $showTTLFee['SUM(submitted_fee)'];
                                                    echo $total_paid_to_us;  
                                                }

                                            ?>

                                                     </td>
                                                     
                                                    <!-- td for total concission -->
                                                     <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(concission_upto) FROM concissions WHERE student_id = '$fetchedStudentId' AND semester_id = 2 ORDER BY semester_id ASC"); 
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

                                                 <!-- third semester -->
                                                  
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester Third </td>
                                                    <td class="font-medium text-danger" style="border:1px solid green">
                                                        <?php $inc1session = $session_table_primary_id+2;?>
                                                        <?php $selectTotalFee = mysqli_query($conn,"SELECT * FROM semester_fee where id = 3 AND batch = '$batchShowVariable'");
                                                        $fetchselectTotalFee = mysqli_fetch_array($selectTotalFee);
                                                        echo @$fetchselectTotalFee['amount'];
                                                        ?>
                                                    </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(submitted_fee) FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 3 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $total_paid_to_us  =  $showTTLFee['SUM(submitted_fee)'];
                                                    echo $total_paid_to_us;  
                                                }

                                            ?>

                                                     </td>
                                                     
                                                    <!-- td for total concission -->
                                                     <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(concission_upto) FROM concissions WHERE student_id = '$fetchedStudentId' AND semester_id = 3 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $concission_with_student = $showTTLFee['SUM(concission_upto)'];
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

                                                 <!-- 4th semester  -->
                                                  
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester 4th </td>
                                                   <td class="font-medium text-danger" style="border:1px solid green">
                                                        <?php $inc1session = $session_table_primary_id+3;?>
                                                        <?php $selectTotalFee = mysqli_query($conn,"SELECT * FROM semester_fee where id = 4 AND batch = '$batchShowVariable'");
                                                        $fetchselectTotalFee = mysqli_fetch_array($selectTotalFee);
                                                        echo @$fetchselectTotalFee['amount'];
                                                        ?>
                                                    </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(submitted_fee) FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 4 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $total_paid_to_us  =  $showTTLFee['SUM(submitted_fee)'];
                                                    echo $total_paid_to_us;  
                                                }

                                            ?>

                                                     </td>
                                                     
                                                    <!-- td for total concission -->
                                                     <td class="font-medium text-danger" style="border:1px solid green">  

                                                <?php $selectAllFromSubmittedTotalFee = mysqli_query($conn,"SELECT SUM(concission_upto) FROM concissions WHERE student_id = '$fetchedStudentId' AND semester_id = 4 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showTTLFee = mysqli_fetch_array($selectAllFromSubmittedTotalFee)){ 
                                                    $concission_with_student = $showTTLFee['SUM(concission_upto)'];
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




                                            </div>
                                           
                                            <!-- DIV FOR THE DETAILED TABLE -->
                                             <div style="">
                                                <tr>
                                                     <td class="font-medium text-dark-medium text-center" style="color:blue; font-weight: bold;" colspan="4"><hr> <br>Submitted Fee Detail's</td>
                                                </tr>
                                                 <tr>
                                                    <td class="font-medium text-danger" style="border:1px solid green"> Semester </td>

                                                    <td class="font-medium text-danger" style="border:1px solid green">  Submitted </td>
                                                     
                                                    <td class="font-medium text-danger" style="border:1px solid green"> On Date </td>

                                                    

                                                     
                                            </tr>

                                            <!-- manually selection for each semester because of developer mubashir and waqar they destroy everything so thats why iam doing like this if any one doing changes not my mistakes Sorry-->

                                            <?php $selectAllFromSubmittedFee = mysqli_query($conn,"SELECT * FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 1 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showFee = mysqli_fetch_array($selectAllFromSubmittedFee)){    
                                            ?>
                                                 <tr >
                                                 <td class="font-medium text-dark-medium " style="border:2px solid red">
                                                     Semester First
                                                 </td>
                                                <td  class="font-medium text-dark-medium " style="border:2px solid red"> PKR - <?php echo $showFee['submitted_fee']; ?> 
                                                </td>
                                                
                                                <td class="font-medium text-dark-medium" style="border:2px solid red"> <?php echo $showFee['submission_date']; ?>
                                                 </td>
                                                 <!-- td for concission and total fee -->
                                                 
                                               
                                            </tr>

                                             
                                             
                                     <?php 
                                     
                                  } 

                                  // SEMESTER 2
                                $selectAllFromSubmittedFee = mysqli_query($conn,"SELECT * FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 2 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showFee = mysqli_fetch_array($selectAllFromSubmittedFee)){    
                                            ?>
                                           

                                             
                                             <tr>
                                                 <td class="font-medium text-dark-medium " style="border:2px solid blue">
                                                     Semester 2nd
                                                 </td>
                                                <td  class="font-medium text-dark-medium " style="border:2px solid blue"> PKR - <?php echo $showFee['submitted_fee']; ?> 
                                                </td>
                                                
                                                <td class="font-medium text-dark-medium" style="border:2px solid blue"> <?php echo $showFee['submission_date']; ?>
                                                 </td>
                                                
                                            </tr>

                                             
                                             
                                     <?php 
                                     
                                  }  
                                  // semester 3rd
                                   $selectAllFromSubmittedFee = mysqli_query($conn,"SELECT * FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 3 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showFee = mysqli_fetch_array($selectAllFromSubmittedFee)){    
                                            ?>
                                           

                                             
                                             <tr>
                                                 <td class="font-medium text-dark-medium " style="border:3px solid orange">
                                                     Semester 3rd
                                                 </td>
                                                <td  class="font-medium text-dark-medium " style="border:3px solid orange"> PKR - <?php echo $showFee['submitted_fee']; ?> 
                                                </td>
                                                
                                                <td class="font-medium text-dark-medium" style="border:3px solid orange"> <?php echo $showFee['submission_date']; ?>
                                                 </td>
                                                
                                            </tr>

                                             
                                             
                                     <?php 
                                     
                                  } 
                                  // semster 4th
                                   $selectAllFromSubmittedFee = mysqli_query($conn,"SELECT * FROM student_submitted_fee WHERE student_id = '$fetchedStudentId' AND semester_id = 4 ORDER BY semester_id ASC"); 
                                                 $totalPaid = 0;
                                                while($showFee = mysqli_fetch_array($selectAllFromSubmittedFee)){    
                                            ?>
                                           

                                             
                                             <tr>
                                                 <td class="font-medium text-dark-medium " style="border:3px solid tomato">
                                                     Semester 4th
                                                 </td>
                                                <td  class="font-medium text-dark-medium " style="border:3px solid tomato"> PKR - <?php echo $showFee['submitted_fee']; ?> 
                                                </td>
                                                
                                                <td class="font-medium text-dark-medium" style="border:3px solid tomato"> <?php echo $showFee['submission_date']; ?>
                                                 </td>
                                                
                                            </tr>

                                             
                                            
                                             </div>
                                              
                                     <?php 
                                     
                                  } 

                                  ?>
                                            
                                             
                                            
                                
                                             
                                            
                                            
                                           
                                         
                                    </table>
                                </div>
                            </div>
                        </div>
                         
                    <?php } ?>


                    <!-- coding for searching through regNo ends-->
                    </div>

                </div>
                <!-- Student Table Area End Here -->
                 <footer class="footer-wrap-layout1">
                      Designed & Developed By <a href="tel:+923005974777">BILAL HUSSAIN</a>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>


    <!-- concission Modal -->
<div class="modal fade" id="concissionModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Concission Form  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="model/concissionPHPFILE.php" method="post">
          <div class="modal-body">
                    <label for="">Concission Amount</label>
                    <input type="text" class="form-control"   name="amount" placeholder="Enter Amount">
                    <input type="hidden" name="semester_id" value="<?php echo $semser_id;?>">
                    <input type="hidden" name="session_id" value="<?php echo $session_table_primary_id ?>">
                    <input type="hidden" name="regNo" value="<?php echo @$searchRegNo;?>">
                    <input type="hidden" id="studentIdField" name="student_id">
                    
                    <!-- <div id="studentIdField"></div> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>


<script>

 function concissionFunction(student_id){
           
              var id  = student_id;
                document.getElementById('studentIdField').value=student_id;
                 $('#concissionModal').modal('show');
                  

      };


</script>

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
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/all-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
</html>