<?php include('model/connection.php');





 ?>
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
    <!-- <div id="preloader"></div> -->
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
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Promotion</li>
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
                <!-- Student Promotion Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        
                        <form class="new-added-form"  action="promotion.php" method="post">
                            <div class="row">
                                   <div class="col-xl-6 col-lg-12 col-12 form-group">
                                    <label>Select  Session *</label>
                                    <?php $fetchSessions = mysqli_query($conn,'SELECT * FROM session ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="select2" name="sessionSearch" style="color: white; width: 100%; height: 40px; border-radius: 3px;  border:1px solid;  background-color: orange; font-size: 18px; text-align: center;" >
                                    <?php
                                      while($show_Session = mysqli_fetch_array($fetchSessions)){ ?>
                                          <option value="<?php echo $show_Session['session']; ?>"><?php echo $show_Session['session']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>
                                  <div class="col-xl-6 col-lg-12 col-12 form-group">
                                    <label>Select  Semester Student's*</label>
                                    <?php $fetchSemester = mysqli_query($conn,'SELECT * FROM semester ORDER BY id ASC');
                                       
                                     ?>
                                    <select class="select2" name="semesterSearch" style="color: white; width: 100%; height: 40px; border-radius: 3px;  border:1px solid;  background-color: orange; font-size: 18px; text-align: center;" >
                                    <?php
                                      while($show_Semester = mysqli_fetch_array($fetchSemester)){ ?>
                                          <option value="<?php echo $show_Semester['id']; ?>"><?php echo $show_Semester['semester']; ?></option>
                                   <?php } ?>
                                    </select>
                             
                                </div>
                               
                               
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" name="searchStdForPromotion" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
                                     
                                </div>
                            </div>
                        </form>
                          

                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap"  id="myTable">
                                <thead>
                                    <tr>
                                        <th>
                                            
                                                 
                                                <label class="">Roll #</label>
                                            
                                        </th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Class</th>
                                       
                                        <th>Admission ID</th>
                                        <th>Admission Date</th>
                                        
                                        
                                         
                                        <th> Session </th>
                                        <th> Action </th>
                                         
                                      
                                    </tr>
                                </thead>
                                 <?php 

                          if(isset($_POST['searchStdForPromotion'])){

                            $session = $_POST['sessionSearch'];
                            $semester = $_POST['semesterSearch'];
                             
                            $selectStudents = mysqli_query($conn,"SELECT * FROM registered_student WHERE session_id = '$session' and semester = '$semester'");  

                            

                                $session_display = @$_POST['sessionSearch'];echo $session_display;   
                                ?>
                                <form action="model/update_Data.php?session=<?php echo $session_display;?>&semester=<?php echo $semester;?>" method="post">
                               <tbody>
                                    <?php while($show = mysqli_fetch_array($selectStudents)){ 

                                           

                                        ?>
                                    <tr>
                                        <td>
                                            
                                                <label class="form-check-label">#00<?php echo $show['admission_id']; ?></label>
                                             
                                        </td>
                                       <td class="text-center"><img width="40px" height="40px" src="studentImages/<?php echo $show['photo'];?>" style="border-radius: 100px;" alt="student"></td>
                                        <td><?php echo $show['full_name']; ?></td>
                                        <td><?php echo $show['father_name']; ?></td>
                                        <td>

                                            <?php 
                                                $semser_id = $show['semester'];
                                            $selectClass = mysqli_query($conn,"SELECT * FROM semester where id = '$semser_id'");
                                             $fetchArray = mysqli_fetch_array($selectClass);
                                             echo $fetchArray['semester'];
                                             $semester_to_button = $fetchArray['semester'];
                                                ?>

                                            </td>
                                        <td><?php echo $show['admission_id']; ?></td>
                                        <td><?php echo $show['admission_date']; ?></td>
                                        
                                            
                                      
                                        <td><?php 
                                        $store_session = $show['session_id'];
                                            $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$store_session'");
                                            $fetchSessionArray = mysqli_fetch_array($selectSession);
                                             $session_full = $fetchSessionArray['session'];
                                           
                                            echo $session_full;
                                         ?>
                                             
                                             <input type="hidden" name="session_full_name" value="<?php echo $session_full;?>" class="form-control">
                                         </td>    
                                        <td>
                                            <input type="checkbox" name="<?php echo $show['id']; ?>" class="form-control">

                                        </td>
                                    </tr>

                                <?php $student_id = $show['id'];} ?>
                                </tbody>
                            </table>

                        </div><hr>
                          <input type="hidden" name="student_id" value="<?php echo $student_id;?>">
                        <?php if(@$semser_id <= 8){ ?>
                           <td colspan="7">
                            <input type="submit" name="promoteStudents" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Click Me To Promote <?php echo @$semester_to_button;  ?> Students Into Next One" onclick="javascript:return confirm('Are You Sure! You Want To Promote These Students ?')" >
                            </td>
                             <td colspan="7">
                            <input type="submit" name="promoteStudents" class="btn-fill-lg btn-danger btn-hover-bluedark" value="Click Me To Demote <?php echo @$semester_to_button;  ?> Semester Into Previous One" onclick="javascript:return confirm('Are You Sure! You Want To Promote These Students ?')" >
                            </td>
                        <?php } ?>
                   
                    </div>
                    </form>
                <?php }else{echo "No Data Found";} ?>
                       
                         

                </div>
                <!-- Student Promotion Area End Here -->
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