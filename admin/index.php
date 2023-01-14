
<?php include('model/connection.php'); ?>
<!doctype html>
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
      <div id="preloader"></div>
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
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>All Students</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Students Data Search </h3>
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

                        <div class="card-body">
                        
                        <form class="new-added-form"  action="model/searchData.php" method="post">
                            <div class="row">
                                   <div class="col-xl-4 col-lg-12 col-12 form-group">
                                    <label>Select  Session *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM session ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="form-control" name="sessionSearch"   >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['session']; ?>"><?php echo $show_Session['session']; ?></option>
                                   <?php } ?>
                                    <option value="" selected=""  hidden="">Please Select Session</option>
                                    </select>
                             
                                </div>
                                  <div class="col-xl-4 col-lg-12 col-12 form-group">
                                    <label>Select  Semester Student's*</label>
                                    <?php $fetchSemester = mysqli_query($conn,'SELECT * FROM semester ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="form-control" name="semesterSearch" class="">
                                    <?php
                                      while($show_Semester = mysqli_fetch_array($fetchSemester)){ ?>
                                          <option value="<?php echo $show_Semester['id']; ?>"><?php echo $show_Semester['semester']; ?></option>
                                   <?php } ?>
                                    <option value="" selected=""  hidden="">Please Select Semester</option>
                                    </select>
                             
                                </div>
                               
                                <!-- FOR SEARCING REGISTRATION NUMBER  -->

                                <div class="col-xl-4 col-lg-12 col-12 form-group">
                                    <label>OR Search Through Reg#</label>
                                    
                                    <input type="text" class="form-control" placeholder="Enter Registration Number " name="regNo" value="<?php if(isset($_GET['searchRegNo'])){ echo "You Searched For :  [ ". $_GET['searchRegNo']." ]";}?>">
                                     
                             
                                </div>
                               


                                 

                               
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" name="searchSemester" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
                                     
                                </div>
                            </div>
                        </form>



                       
                        <?php if(@$_GET['semesterSearchIdPass'] && @$_GET['session_id_search'] ){ 
                                $semester_searched = @$_GET['semesterSearchIdPass'];
                                $session_searched = @$_GET['session_id_search'];

                                 


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
                        <?php if(@$_GET['semesterSearchIdPass']){ 
                                $semester_searched = @$_GET['semesterSearchIdPass'];

                                $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student where semester = '$semester_searched' and session_id = '$session_searched'  order by id asc");

                               // print_r($selectAllStudents);exit();
                            ?>
                             
                        <hr>

                        <div class="table-responsive">
                           <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                       <th>S.NO</th>
                       <th>Name</th>

                                        <th>Father Name</th>
                                        
                                        <th>Admission Id</th>
                                       <th> Session </th>
                                        
                                        <th>Batch</th>
                                        <th>Admission Date</th>
                                        <th>Profile</th>
                    </tr>
                  </thead>
                  <tfoot>
                     <th>S.NO</th>
                        <th>Name</th>
                                        <th>Father Name</th>
                                        
                                        <th>Batch</th>
                                       <th> Session </th>
                                        <th>Admission Id</th>
                                        <th>Admission Date</th>
                                        <th>Profile</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php $i= 1;while($show = mysqli_fetch_array($selectAllStudents)){ ?>
                                    <tr>
                                       <td> <?php echo $i++; ?>  </td>
                                       
                                        <td><?php echo $show['full_name']; ?></td>
                                        <td><?php echo $show['father_name']; ?></td>
                                         
                                         
                                        <td> <?php echo $show['admission_id']; ?> </td>
                                        
                                      
                                        <td><?php 
                                        $store_session = $show['session_id'];
                                            $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                            $fetchSessionArray = mysqli_fetch_array($selectSession);
                                            echo $fetchSessionArray['session'];
                                         ?></td> 
                                          <td>
                                            
                                               <?php echo $show['batch']; ?>  
                                             
                                        </td>  
                                        <td><?php echo $show['admission_date']; ?></td> 
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                     
                                                    <a class="dropdown-item" href="student_profile.php?passId=<?php echo $show['id'];?>"><i
                                                            class="fas fa-cogs text-dark-pastel-green"></i>Profile</a>
                                                     
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                     
                       <!-- button for Print -->
 
                                
                 <div class="col-12 form-group mg-t-8">
                                    <a href="print_student.php?session=<?php echo $session_searched; ?>&semester=<?php echo  $semester_searched;?>">
                                      <button type="submit" name="searchSemester" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"><i class="fa fa-print" aria-hidden="true"></i></button>
                                     </a> 
                                     
                </div>
                <!-- button for Print -->
                     
                  
                  </tbody>
                </table>

               


              </div>
                        </div>
                    <?php }else if(@$_GET['searchRegNo']){ 
                                $searchRegNo = @$_GET['searchRegNo'];

                                $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student where admission_id = '$searchRegNo'");

                               // print_r($selectAllStudents);exit();
                            ?>
                             <form class="mg-b-20">
                            <div class="row gutters-8">
                                 
                               <!--  <div class="col-12-xxxl col-xl-12 col-lg-12 col-12 form-group" style="border:1px solid lightgreen; border-radius: 5px;">
                                    <input type="text" placeholder="Search by Name ..."  id="myInput" onkeyup="myFunction()"  class="form-control">
                                </div> -->
                                 
                                 
                            </div>
                        </form>
                        <hr>

                        <div class="table-responsive">
                           <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                       <th>S.NO</th>
                       <th>Name</th>

                                        <th>Father Name</th>
                                        
                                        <th>Batch</th>
                                       <th> Session </th>
                                        <th>Admission Id</th>
                                        <th>Admission Date</th>
                                        <th>Profile</th>
                    </tr>
                  </thead>
                  <tfoot>
                     <th>S.NO</th>
                        <th>Name</th>
                                        <th>Father Name</th>
                                        
                                        <th>Batch</th>
                                       <th> Session </th>
                                        <th>Admission Id</th>
                                        <th>Admission Date</th>
                                        <th>Profile</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php $i= 1;while($show = mysqli_fetch_array($selectAllStudents)){ ?>
                                    <tr>
                                       <td> <?php echo $i++; ?>  </td>
                                       
                                        <td><?php echo $show['full_name']; ?></td>
                                        <td><?php echo $show['father_name']; ?></td>
                                         
                                         
                                        <td><?php echo $show['batch']; ?></td>
                                        
                                      
                                        <td><?php 
                                        $store_session = $show['session_id'];
                                            $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                            $fetchSessionArray = mysqli_fetch_array($selectSession);
                                            echo $fetchSessionArray['session'];
                                         ?></td> 
                                          <td>
                                            
                                                  <?php echo $show['admission_id']; ?> 
                                             
                                        </td>  
                                        <td><?php echo $show['admission_date']; ?></td> 
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                     
                                                    <a class="dropdown-item" href="student_profile.php?passId=<?php echo $show['id'];?>"><i
                                                            class="fas fa-cogs text-dark-pastel-green"></i>Profile</a>
                                                     
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                     
                       <!-- button for Print -->
 
                                
                 <!-- <div class="col-12 form-group mg-t-8">
                                    <a href="print_student.php?session=<?php echo $session_searched; ?>&semester=<?php echo  $semester_searched;?>">
                                      <button type="submit" name="searchSemester" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"><i class="fa fa-print" aria-hidden="true"></i></button>
                                     </a> 
                                     
                </div> -->
                <!-- button for Print -->
                     
                  
                  </tbody>
                </table>

               


              </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <!-- Student Table Area End Here -->
               <footer class="footer-wrap-layout1">
                      Created & Designed By <a href="tel:+923005974777">Bilal Hussain</a>
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
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

 <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/datatables-demo.js"></script>
</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/all-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:57 GMT -->
</html>