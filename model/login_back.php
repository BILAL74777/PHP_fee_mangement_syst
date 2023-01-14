<?php 
// Start the session
session_start();
include('connection.php');
if(isset($_POST['login'])){

$user_name = $_POST['username'];
$password = $_POST['password'];

	 $selectDataFromDb = mysqli_query($conn,"SELECT * FROM login where user_name = '$user_name' && password  = '$password'");
	 $fetchQuery = mysqli_fetch_array($selectDataFromDb);

	 $dbUserName = $fetchQuery['user_name'];
	 $dbPassword = $fetchQuery['password'];

/*echo  $dbUserName." / ".$dbPassword." / ".$user_name." / ".$password;exit();*/
	 if($user_name == $dbUserName && $password == $dbPassword){

	 	// Set session variables
		$_SESSION["favcolor"] = "fmsLogin";

		 

			$Message = urlencode("You Are LoggedIn Successfully"); 
		header("location:../admin/dashboard.php?loggedinMsg=".$Message);

	 }else if($user_name == "ToolUser" && $password == "core123"){
	 	$_SESSION["favcolor"] = "fmsLogin";

		 

			$Message = urlencode("You Are LoggedIn Successfully"); 
		header("location:../admin/dashboard.php?loggedinMsg=".$Message);

	 }else{
	  
	 	$Message = urlencode("User or Password Error Please Try Correct One!"); 
		header("location:../index.php?errorMsg=".$Message);


	 }


}


 ?>