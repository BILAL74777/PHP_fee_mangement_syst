<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PIMMS | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="admin/image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="admin/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="admin/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="admin/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="admin/fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="admin/css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin/style.css">
    <!-- Modernize js -->
    <script src="admin/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
     
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap" >
        <div class="login-page-content" style="margin-top:30px !important">
            <div class="login-box">
                <div class="item-logo" >
                    <img  width="130px" height="80px" src="logo.jpeg" alt="logo">
                </div>
                 <!-- Coding Starts for receiving messages after submiting -->
                          <?php 
                                    if(isset($_GET['errorMsg'])){
                                     ?>
                                         <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                             <?php echo $_GET['errorMsg'];?><br><h1 class="text-center">&#x1F975;</h1></div>
                                     <?php }else if(isset($_GET['successMsg'])){?>
                                        <div class="alert alert-success alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert">&times;</button> 
                                         <?php echo $_GET['successMsg'];?></div>
                                    <?php }?>
                        <!-- Coding End for receiving messages after submiting -->    
                <form action="model/login_back.php" class="login-form" method="post" >
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Enter usrename"  required=""  name="username" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" required="" name="password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                     
                    <div class="form-group">
                        <input type="submit" class="login-btn" name="login" value="Login">
                    </div>
                </form>
                  Designed And Developed By <a href="tel:+923005974777">Bilal Hussain</a>
            </div>
           
        </div>
    </div>
    
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="admin/js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="admin/js/plugins.js"></script>
    <!-- Popper js -->
    <script src="admin/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="admin/js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="admin/js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="admin/js/main.js"></script>

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 16:51:48 GMT -->
</html>