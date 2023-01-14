<?php

 
$index = "";
$admit_form = "";
 
$fullHistory = "";
$batch = "";
$promotion = "";
$fee_structure = "";
$fee_recepit = "";
$prospectus_fee = "";
$account = "";
$session = "";

$basename = basename($_SERVER['PHP_SELF'], '.php');

if($basename=="index"){
    
    $index = "menu-active";
    $indexGroup = "sub-group-active";
    
}else if($basename=="admit_form"){
    
    $admit_form= "menu-active";
     $indexGroup = "sub-group-active";
    
}if($basename=="semester_fee"){
    
    $fee_structure = "menu-active";
    $feeGroup = "sub-group-active";
    
}else if($basename=="fee_recepit"){
    
    $fee_recepit = "menu-active";
    $feeGroup = "sub-group-active";
    
}else if($basename=="add_fee"){
    
    $add_fee = "menu-active";
    $feeGroup = "sub-group-active";
    
}if($basename=="promotion"){
    
    $promotion = "menu-active";
    
}
else if($basename=="messaging"){
    
    $message = "menu-active";
    
}
else if($basename=="batch"){
    
    $batch = "menu-active";
    $addNewGroup = "sub-group-active";
    
}

else if($basename=="session"){
    
    $session = "menu-active";
    $addNewGroup = "sub-group-active";
    
}

else if($basename=="account-settings"){
    
    $account = "menu-active";
    
}
else if($basename=="prospectus_fee"){
    
    $prospectus_fee = "menu-active";
    $feeGroup = "sub-group-active";
}
else if($basename =="semester_fee_add"){

        $semester_fee_add = "menu-active";
          $addNewGroup = "sub-group-active";
}
else if($basename == "prospectus_fee_add"){

         $prospectus_fee_add = "menu-active";
          $addNewGroup = "sub-group-active";
}
else if($basename == "semester"){

         $semester = "menu-active";
          $addNewGroup = "sub-group-active";
}else if($basename == "fullHistory"){

         $fullHistory = "menu-active";
          $addNewGroup = "sub-group-active";
}
else if($basename == 'dashboard'){
        $dash = 'menu-active';
}


?>


 <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">

               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                       <strong style="color:white;"> PIMMS Dashboard</strong>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                          <li class="nav-item sidebar-nav-item">
                            <a href="dashboard.php" class="nav-link  <?php echo $dash; ?>"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu <?php echo $indexGroup; ?>">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link <?php echo $index; ?>"><i class="fas fa-angle-right"></i>
                                        Students</a>
                                </li>
                                
                                 
                                <li class="nav-item">
                                    <a href="admit_form.php" class="nav-link <?php echo $admit_form; ?>"><i
                                            class="fas fa-angle-right"></i>Admission Form</a>
                                </li>
                            </ul>
                        </li>
                        
                         
                         
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Student Ledger</span></a>
                            <ul class="nav sub-group-menu <?php echo $feeGroup; ?>">
                                <li class="nav-item">
                                    <a href="semester_fee.php" class="nav-link <?php echo $fee_structure; ?>"><i class="fas fa-angle-right"></i>Semester Fee</a>
                                </li>
                                <li class="nav-item">
                                    <a href="prospectus_fee.php" class="nav-link <?php echo $prospectus_fee; ?>"><i
                                            class="fas fa-angle-right"></i>Propectus Fee</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add_fee.php" class="nav-link <?php echo $add_fee; ?>"><i
                                            class="fas fa-angle-right"></i>Fee Info (Search & Add)</a>
                                </li>
                                
                            </ul>
                        </li>

                          


                         


                        <li class="nav-item">
                            <a href="promotion.php" class="nav-link <?php echo $promotion; ?>"><i
                                    class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Promotion</span></a>
                        </li>
                         
                        
                         
                         
                        
                       <!--  <li class="nav-item">
                            <a href="messaging.php" class="nav-link <?php echo $message; ?>"><i
                                    class="flaticon-chat"></i><span>Student SMS</span></a>
                        </li>
                          -->

                         <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Add New</span></a>
                            <ul class="nav sub-group-menu <?php echo $addNewGroup; ?>">
                                 
                                <li class="nav-item">
                                    <a href="session.php" class="nav-link <?php echo $session; ?>"><i
                                            class="fas fa-angle-right"></i> Session</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="batch.php" class="nav-link <?php echo $batch; ?>"><i
                                            class="fas fa-angle-right"></i> Batch</a>
                                </li>
                                <li class="nav-item">
                                    <a href="prospectus_fee_add.php" class="nav-link <?php echo $prospectus_fee_add; ?>"><i
                                            class="fas fa-angle-right"></i>Propectus Fee Add</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="semester_fee_add.php" class="nav-link <?php echo $semester_fee_add; ?>"><i
                                            class="fas fa-angle-right"></i>Semester's  Fee Add</a>
                                </li>
                                 
                            </ul>
                        </li>
                         
                        <li class="nav-item">
                            <a href="account-settings.php" class="nav-link <?php echo $account; ?>"><i
                                    class="flaticon-settings"></i><span>Account</span></a>
                        </li> 
                        <li class="nav-item">
                            <a href="fullHistory.php" class="nav-link <?php echo $fullHistory; ?>"><i class="flaticon-technological"></i><span>Full History</span></a>
                        </li>
                    </ul>
                </div>
            </div>