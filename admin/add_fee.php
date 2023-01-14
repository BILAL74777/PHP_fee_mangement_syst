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
                                  <div class="col-xl-4 col-lg-12 col-12 form-group">
                                    <label>Select  Session *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM session ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="form-control" name="sessionSearch" >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['session']; ?>"><?php echo $show_Session['session']; ?></option>
                                   <?php } ?>
                                   <option value="" selected="" hidden="">Please Select Semester</option>
                                    </select>
                             
                                </div>

                                 <div class="col-xl-4 col-lg-12 col-12 form-group">
                                    <label>Select  Semester Student's*</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM semester ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="form-control" name="semesterSearch"  >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){

                                       ?>
                                          <option value="<?php echo $show_Session['id']; ?>"><?php echo $show_Session['semester']; ?></option>

                                   <?php } ?>
                                   <option value="" selected=""  hidden="">Please Select Session</option>
                                    </select>


                             
                                </div>

                                <div class="col-xl-4 col-lg-12 col-12 form-group">
                                    <label>OR Search Through Reg#</label>
                                    
                                    <input type="text" class="form-control" placeholder="Enter Registration Number " name="regNo" value="<?php if(isset($_GET['searchRegNo'])){ echo "You Searched For :  [ ". $_GET['searchRegNo']." ]";}?>">
                                     
                             
                                </div>

                                  
                                 
                                 
                                

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark" name="searchstudentsForFee">Search 
                                    </button>
                                    <br>
                                </div>

                            </div>
                        </form>



                       <!-- coding for alert show after search -->


                        <?php if(@$_GET['semesterSearchIdPass'] && @$_GET['sessionIdPass'] ){ 
                                $semester_searched = @$_GET['semesterSearchIdPass'];
                                $session_searched = @$_GET['sessionIdPass'];

                                 


                                //echo $semester_searched. " /  ".$session_searched." / ".$fallorspring;exit();
                                    $selectFromSemester = mysqli_query($conn,"SELECT * FROM semester where id = '$semester_searched'");
                                    $fetchArrayData = mysqli_fetch_array($selectFromSemester);

                                 ?>
                               <div class="alert alert-success text-center">
                                You Searched For Semester   <strong style="color: red;"> 

                                  <?php
                                    
                                        $store_session = $session_searched;
                                            $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                            $fetchSessionArray = mysqli_fetch_array($selectSession);
                                            $session_table_primary_id = $fetchSessionArray['id'];
                                            
                                        


                                 echo  $fetchArrayData['semester']." ".$fetchSessionArray['session']; ?></strong> Students The List is Below!


                                        
                                </div>
                        <?php }elseif(@$_GET['searchRegNo'] ){ 
                                $searchRegNo = @$_GET['searchRegNo'];                               

                                 ?>
                               <div class="alert alert-success text-center"> 
                                You Searched For   <strong style="color: red;"> 

                                  <?php                               
                                     
                                 echo  $searchRegNo; ?></strong> Check The Data Table!


                                        
                                </div>
                        <?php }  ?>

                       <!-- coding for alert show after search ends -->
                       <!-- table coding starts here for searching through sesssion and semester\ -->
                        <?php if(@$_GET['semesterSearchIdPass']){ 
                                $semester_searched = @$_GET['semesterSearchIdPass'];
                                $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student where semester = '$semester_searched'and session_id = '$session_searched'  ");
                            ?>
                              
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap"  id="myTable">
                                <thead>
                                     <tr>
                                        <th><label class="">Reg #</label></th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                       
                                        <th>Semester</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Concission</th>
                                        <th>Balance</th>
                                        <th> Session </th>
                                        <th>Info</th>
                                         <th>Concission</th>
                                    </tr>
                                </thead>

                              
                               <tbody>
                                    <?php while($show = mysqli_fetch_array($selectAllStudents)){ 

                                      $student_id_save = $show['id'];
                                      $admissionRegNo = $show['admission_id'];
                                      ?>
                                    <tr>
                                        <!-- shoow student reg No -->
                                        <td>
                                            
                                                <label class="form-check-label"><?php echo $admissionRegNo ; ?></label>
                                             
                                        </td>
                                        <!-- show student image -->
                                       <td class="text-center">

                                            <img width="50px" height="50px" src="studentImages/<?php echo $show['photo'];?>" style="border-radius: 10px;" alt="student">

                                       </td>
                                        <!-- show student Name -->
                                        <td>
                                            <?php echo $show['full_name']; ?>
                                            
                                        </td>

                                         <!-- show semester -->
                                        <td>

                                            <?php 
                                                $semser_id = $show['semester'];
                                            $selectClass = mysqli_query($conn,"SELECT * FROM semester where id = '$semser_id'");
                                             $fetchArray = mysqli_fetch_array($selectClass);
                                             echo $fetchArray['semester'];
                                                ?>

                                            </td>
                                             

                                         <!-- code for fetching total fee -->
                                          <!-- fee setting code -->
                                            <?php  

                                                             foreach(mysqli_query($conn,"SELECT SUM(submitted_fee) 
                                                          FROM student_submitted_fee WHERE student_id = '$student_id_save' AND semester_id ='$semser_id'") as $row) {
                                                            $total_fee = $row['SUM(submitted_fee)'];
                                                            
                                                            $total_fee_to_be_print = $total_fee_to_be_print + $total_fee;
                                                            
                                                       

                                                          $semester_fee_selecting = mysqli_query($conn,"SELECT * FROM semester_fee WHERE id = '$semser_id'");
                                                          $fetchArraySemesterFee = mysqli_fetch_array($semester_fee_selecting);

                                                          $total_dues = $fetchArraySemesterFee['amount'] - $total_fee;
                                                          $print_total_dues_sum = $print_total_dues_sum + $total_dues;
                                                                                                                     }

                                                         ?>
                                        <td>
                                            <?php 
                                                $total_fee_of_all_students = $total_fee_of_all_students + $fetchArraySemesterFee['amount'];
                                            echo"<i style='color:white;font-weight:bold;background-color:blue; padding:5px; border-radius:100px;'>  ". $fetchArraySemesterFee['amount']."</i>" ; ?>
                                                
                                        </td>

                                        <!-- start code for paid fee -->
                                      <td>
                                        <?php 

                                        if($total_fee < $fetchArraySemesterFee['amount']){ 
                                                  if($total_fee){
                                                    echo  "<i style='color:white;font-weight:bold;background-color:green; padding:5px; border-radius:100px;'>  ". $total_fee."</i>";
                                                  }else{
                                                       echo  "<i style='color:white;font-weight:bold;background-color:red; padding:5px; border-radius:100px;'> 0 Paid</i>";
                                                  }
                                            }else{
                                                  echo "<i style='color:white;font-weight:bold; background-color:green; padding:5px; border-radius:100px;' class='fas fa-check'> Paid</i>";
                                                }

                                         ?>
                                          

                                      </td>
                                      <!-- end paid fee td -->
                                      <!-- start concission td -->
                                      <td>
                                            <?php 
                                            
                                                    $concSelectQuery = mysqli_query($conn,"SELECT * FROM concissions WHERE student_id = ' $student_id_save' AND semester_id = '$semester_searched' AND session_id = '$session_table_primary_id'");

                                                    $fetchConcissionArray = mysqli_fetch_array($concSelectQuery);
                                                    $ConcissionAmount  =  @$fetchConcissionArray['concission_upto'];
                                                   
                                                    if($ConcissionAmount == ""){
                                                        echo  " 
                                                        <i style='color:white;font-weight:bold;background-color:red; padding:5px; border-radius:100px;'>  0 Concission</i>";                                                    

                                                     }else{
                                                        echo "<i style='color:white;font-weight:bold;background-color:indigo; padding:5px; border-radius:100px;'> ".$ConcissionAmount."</i>";
                                                            
                                                        }

                                             ?>
                                      </td>
                                      <!-- td for showing balance -->
                                      <td>
                                          <?php 
                                              if($total_dues - @$ConcissionAmount < $fetchArraySemesterFee['amount']){ $tt_dues  = ($total_dues-@$ConcissionAmount);  
                                              echo"<i style='color:white;font-weight:bold;background-color:orange; padding:5px; border-radius:100px;''>". $tt_dues."</i>";
                                              }else{
                                                    echo "<i style='color:white;font-weight:bold;background-color:red; padding:5px; border-radius:100px;''>Not Paid Yet</i>";
                                              }
                                              
                                              
                                            ?>                                       
                                      </td>

                                   
                                      <!-- td for showing session  -->
                                        <td>
                                            <?php 
                                                $store_session = $show['session_id'];
                                                $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                                $fetchSessionArray = mysqli_fetch_array($selectSession);
                                                echo $fetchSessionArray['session'];
                                             ?>
                                             
                                         </td> 

                                            <!-- td for full info button about student fee -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                     
                                                    <a class="dropdown-item" href="student_fee_details.php?passId=<?php echo $show['id'];?>&semester_idPass=<?php echo $semser_id?>"><i class="fas fa-cogs text-dark-pastel-green"></i>Fee Detail's</a>
                                                     
                                                    
                                                </div>
                                            </div>
                                        </td>

                                        <!-- td for opening cocission form model -->
                                        <td>
                                            <?php 
                                                     $fetchConcissionArray = mysqli_fetch_array($concSelectQuery);
                                                     
                                                    
                                                      $ttl_concission_print  = $ttl_concission_print + $ConcissionAmount;
                                                    if($ConcissionAmount==""){
                                                       
                                             ?>
                                                <i class="fas fa-undo text-white concission" onclick="concissionFunction('<?php echo $show['id'];?>')" style="background: blue; padding: 10px; width:50px; text-align: center; border-radius: 50px;"></i>
                                            <?php }else{?>

                                                    <i class="fas fa-check text-white" style="background: green; padding: 10px; width:50px; text-align: center; border-radius: 50px;"></i>
                                            <?php } ?>
                                                  
                                                   
                                                 
                                        </td>
                                    </tr>

                                <?php $batch = $show['batch']; } ?>
                               
                              
                                 </tbody>
                                   <tfoot>
                                    <tr>
                                        <th><label class="">Reg #</label></th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                         
                                        <th>Semester</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Concission</th>
                                        <th>Balance</th>
                                        <th> Session </th>
                                        <th>Info</th>
                                        <th>Concission</th>
                                    </tr>
                                      <tr >
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="border:2px solid red; border-radius:10px"><?php echo $total_fee_of_all_students;?></td>
                                    <td style="border:2px solid red; border-radius:10px">
                                         <?php echo  $total_fee_to_be_print;?>
                                    </td>
                                    <td style="border:2px solid red; border-radius:10px"><?php echo $ttl_concission_print;?></td>
                                    <td style="border:2px solid red; border-radius:10px"><?php echo $print_total_dues_sum - $ttl_concission_print;?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                                <!-- button for Print -->

                                    <div class="col-12 form-group mg-t-8">
                                      <a href="print_student_fee_list.php?fallorspring=<?php echo  $session_searched;?>&session=<?php echo $session_searched; ?>&semester=<?php echo  $semester_searched;?>&batch=<?php echo $batch;?>">
                                        <button type="submit" name="searchSemester" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"><i class="fa fa-print" aria-hidden="true"></i></button>
                                       </a> 
                                       
                                     </div>
                                 <!-- button for Print -->

                            </table>
                        </div>
                    <?php } ?>
                    <!-- coding for searching through form data session and semester ends -->
                    <!-- coding for searching through regNo starts-->

                    <?php if(@$_GET['searchRegNo']){ 
                                $searchRegNo = @$_GET['searchRegNo'];
                                $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student where admission_id = '$searchRegNo'");
                                


                            ?>
                              
                       <div class="table-responsive">
                            <table class="table display data-table text-nowrap"  id="myTable">
                                <thead>
                                     <tr>
                                        <th><label class="">Reg #</label></th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                       
                                        <th>Semester</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Concission</th>
                                        <th>Balance</th>
                                        <th> Session </th>
                                        <th>Info</th>
                                         <th>Concision</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th><label class="">Reg #</label></th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                         
                                        <th>Semester</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Concission</th>
                                        <th>Balance</th>
                                        <th> Session </th>
                                        <th>Info</th>
                                        <th>Concision</th>
                                    </tr>
                                </tfoot>
                               <tbody>
                                    <?php while($show = mysqli_fetch_array($selectAllStudents)){ 
                                        $semester_searched = $show['semester'];
                                        $session_searched = $show['session_id'];
                                        $batch = $show['batch'];
                                        $sessions_fetched = mysqli_query($conn,"SELECT * FROM session WHERE session = '$session_searched'");
                                        $session_array_fetched = mysqli_fetch_array($sessions_fetched);
                                        $session_table_primary_id  = $session_array_fetched['id'];
                                        $student_id_save = $show['id'];
                                          ?>
                                    <tr>
                                        <!-- shoow student reg No -->
                                        <td>
                                            
                                                <label class="form-check-label"><?php echo $show['admission_id']; ?></label>
                                             
                                        </td>
                                        <!-- show student image -->
                                       <td class="text-center">

                                            <img width="50px" height="50px" src="studentImages/<?php echo $show['photo'];?>" style="border-radius: 10px;" alt="student">

                                       </td>
                                        <!-- show student Name -->
                                        <td>
                                            <?php echo $show['full_name']; ?>
                                            
                                        </td>

                                         <!-- show semester -->
                                        <td>

                                            <?php 
                                                $semser_id = $show['semester'];
                                            $selectClass = mysqli_query($conn,"SELECT * FROM semester where id = '$semser_id'");
                                             $fetchArray = mysqli_fetch_array($selectClass);
                                             echo $fetchArray['semester'];
                                                ?>

                                            </td>
                                             

                                         <!-- code for fetching total fee -->
                                          <!-- fee setting code -->
                                            <?php  

                                                             foreach(mysqli_query($conn,"SELECT SUM(submitted_fee) 
                                                          FROM student_submitted_fee WHERE student_id = '$student_id_save' AND semester_id ='$semser_id'") as $row) {
                                                            $total_fee = $row['SUM(submitted_fee)'];
                                                            
                                                         

                                                          $semester_fee_selecting = mysqli_query($conn,"SELECT * FROM semester_fee WHERE id = '$semser_id'");
                                                          $fetchArraySemesterFee = mysqli_fetch_array($semester_fee_selecting);

                                                          $total_dues = $fetchArraySemesterFee['amount'] - $total_fee;
                                                                                                                     }

                                                         ?>
                                        <td>
                                            <?php echo"<i style='color:white;font-weight:bold;background-color:blue; padding:5px; border-radius:100px;'>  ". $fetchArraySemesterFee['amount']."</i>" ; ?>
                                                
                                        </td>

                                        <!-- start code for paid fee -->
                                       <td>
                                        <?php 

                                        if($total_fee < $fetchArraySemesterFee['amount']){ 
                                                  if($total_fee){
                                                    echo  "<i style='color:white;font-weight:bold;background-color:green; padding:5px; border-radius:100px;'>  ". $total_fee."</i>";
                                                  }else{
                                                       echo  "<i style='color:white;font-weight:bold;background-color:red; padding:5px; border-radius:100px;'> 0 Paid</i>";
                                                  }
                                            }else{
                                                  echo "<i style='color:white;font-weight:bold; background-color:green; padding:5px; border-radius:100px;' class='fas fa-check'> Paid</i>";
                                                }

                                         ?>
                                          

                                      </td>
                                      <!-- end paid fee td -->
                                      <!-- start concission td -->
                                      <td>
                                            <?php 
                                            
                                                    $concSelectQuery = mysqli_query($conn,"SELECT * FROM concissions WHERE student_id = ' $student_id_save' AND semester_id = '$semester_searched' AND session_id = '$session_table_primary_id'");

                                                    $fetchConcissionArray = mysqli_fetch_array($concSelectQuery);
                                                    $ConcissionAmount  =  @$fetchConcissionArray['concission_upto'];
                                                     
                                                     $ttl_concission_print = ( $ConcissionAmount + $ConcissionAmount); 
                                                    if($ConcissionAmount == ""){
                                                        echo  " 
                                                        <i style='color:white;font-weight:bold;background-color:red; padding:5px; border-radius:100px;'>  0 Concission</i>";                                                    

                                                     }else{
                                                        echo "<i style='color:white;font-weight:bold;background-color:indigo; padding:5px; border-radius:100px;'> ".$ConcissionAmount."</i>";
                                                            
                                                        }

                                             ?>
                                      </td>
                                      <!-- td for showing balance -->
                                      

                                       <td>
                                          <?php 
                                              if($total_dues - @$ConcissionAmount < $fetchArraySemesterFee['amount']){
                                              echo"<i style='color:white;font-weight:bold;background-color:orange; padding:5px; border-radius:100px;''>". $total_dues-@$ConcissionAmount."</i>";
                                              }else{
                                                    echo "<i style='color:white;font-weight:bold;background-color:red; padding:5px; border-radius:100px;''>Not Paid Yet</i>";
                                              }
                                            ?>                                       
                                      </td>

                                   
                                      <!-- td for showing session  -->
                                        <td>
                                            <?php 
                                                $store_session = $show['session_id'];
                                                $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                                $fetchSessionArray = mysqli_fetch_array($selectSession);
                                                echo $fetchSessionArray['session'];
                                             ?>
                                             
                                         </td> 

                                            <!-- td for full info button about student fee -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                     
                                                    <a class="dropdown-item" href="student_fee_details.php?passId=<?php echo $show['id'];?>&semester_idPass=<?php echo $semser_id?>"><i class="fas fa-cogs text-dark-pastel-green"></i>Fee Detail's</a>
                                                     
                                                    
                                                </div>
                                            </div>
                                        </td>

                                        <!-- td for opening cocission form model -->
                                        <td>
                                            <?php 
                                                     $fetchConcissionArray = mysqli_fetch_array($concSelectQuery);
                                                     
                                                     
                                                    if($ConcissionAmount==""){
                                             ?>
                                                <i class="fas fa-undo text-white concission" onclick="concissionFunction('<?php echo $show['id'];?>')" style="background: blue; padding: 10px; width:50px; text-align: center; border-radius: 50px;"></i>
                                            <?php }else{?>

                                                    <i class="fas fa-check text-white " style="background: green; padding: 10px; width:50px; text-align: center; border-radius: 50px;"></i>
                                            <?php } ?>
                                                  
                                                   
                                                 
                                        </td>
                                    </tr>
                                <?php }   $registrationNo =$_GET['searchRegNo'];?>
                                </tbody>

                                
                                <!-- button for Print -->

                                    <div class="col-12 form-group mg-t-8">
                                      <a href="print_student_fee_list.php?fallorspring=<?php echo  $session_searched;?>&session=<?php echo $session_searched; ?>&semester=<?php echo  $semester_searched;?>&batch=<?php echo $batch;?>&regNo=<?php echo $registrationNo ;?>">
                                        <button type="submit" name="searchSemester" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"><i class="fa fa-print" aria-hidden="true"></i></button>
                                       </a> 
                                       
                                     </div>
                                 <!-- button for Print -->

                            </table>
                        </div>
                    <?php } ?>


                    <!-- coding for searching through regNo ends-->
                    </div>

                </div>
                <!-- Student Table Area End Here -->
                 <footer class="footer-wrap-layout1">
                      Designed By <a href="tel:+923339202521">Al-Fajr IT Solutions</a>
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