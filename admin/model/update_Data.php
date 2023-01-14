<?php 
include("connection.php");
if(isset($_POST['update_student_registration']))
{
$studentUpdateId = $_POST['id'];
//echo $studentUpdateId;exit();
$student_name = strtoupper($_POST['student_name']);
 $father_name = strtoupper($_POST['father_name']);
 $gender = $_POST['gender'];
 $dob = $_POST['dob'];
  
 $session = $_POST['session'];
 $relegion = $_POST['religion'] ;
 $email = $_POST['email'];
  
 $admission_id = $_POST['admission_id'];
 $phone = $_POST['phone'];
 //$photo  = $_POST['photo'];
$photo = $_FILES['photo']['name'];
  

 	$result = mysqli_query($conn, "SELECT * FROM registered_student where id='$studentUpdateId'");
	$record = mysqli_fetch_array($result);
	$db_image =  $record['photo'];
  global $db_image;
  	if($photo==""){
		 $photo=$db_image;
	}
  
  /*echo $student_name." / ".$father_name." / ".$gender." / ".$dob." / Roll# = ".$roll." / Session = ".$session." / ".$relegion." / ".$email." / class = ".$class." / ".$admission_id." / ".$phone." / photo = ".$photo." / currnt image";exit(); 
  */
  
 ///selecting data from database to check with the exist roll in the class and also check registration code starts...
 

/*echo $storeRoll." / ".$storeClass."<br>";
echo $roll." / ".$class;*/

 
 
//echo $storeReg." / ".$admission_id;exit();
///selecting data from database to check with the exist roll in the class and also check registration code end...
if($photo ==  $db_image){

	 $updateData = mysqli_query($conn,"UPDATE registered_student SET full_name='$student_name',father_name='$father_name',gender='$gender',dob='$dob',email='$email',relegion='$relegion',session_id='$session',admission_id='$admission_id',phone='$phone',photo='$db_image'  WHERE id = '$studentUpdateId'");
	  if($updateData){
	  	 $Message = urlencode(" Student Record Updated Successfully");
   		 header("location:../student_profile.php?successMsg=".$Message."&passId=".$studentUpdateId);
	  }else{
	  	$Message = urlencode("Query Or Database Error"); 
	  	  
		header("location:../update_student_profile.php?errorMsg=".$Message);
	  }
}else if($photo!=""){
  
 /*echo $student_name." / ".$father_name." / ".$gender." / ".$dob." / Roll# = ".$roll." / Session = ".$session." / ".$relegion." / ".$email." / class = ".$class." / ".$admission_id." / ".$phone." / photo = ".$photo." / currnt image";exit(); 
  */
$location = '../studentImages/'; //where the images store 
$supported_image = array('gif','jpg','jpeg','png');
$src_file_name = $photo;
$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

$photo_tmp = $_FILES['photo']['tmp_name'];

 if (in_array($ext, $supported_image))

	 {
	  if(move_uploaded_file($photo_tmp, $location.$photo)){
	  $updateData = mysqli_query($conn,"UPDATE registered_student SET full_name='$student_name',father_name='$father_name',gender='$gender',dob='$dob',email='$email',relegion='$relegion',session_id='$session',admission_id='$admission_id',phone='$phone',photo='$photo'  WHERE id = '$studentUpdateId'");
	  if($updateData){
	  	 $Message = urlencode(" Student Record Updated Successfully");
   		 header("location:../student_profile.php?successMsg=".$Message."&passId=".$studentUpdateId);
	  }else{
	  	echo "This place 2";exit();
	  	$Message = urlencode("Query Or Database Error"); 
	  	  
		header("location:../update_student_profile.php?errorMsg=".$Message);
	  }
	}else{
		echo "File Not Moving";
		echo "This place 3";exit();
	 }
	}

	else 

	{

	   $Message = urlencode('Kindly Select Only GIF,jpg,jpeg,png Type Only for image');
	   header("location:../update_student_profile.php?errorMsg=".$Message."&passIdForUpdate=".$studentUpdateId);

	}


 

 


}

}else if(isset($_POST['update_fee_record'])){

$semester_id = $_POST['semester_id'];
	 $amount = $_POST['amount'];
$studentUpdateId = $_POST['std_id'];
$SemUpdateId = $_POST['sem_id_for_selecting_sem'];

	//echo $semester_id." / ".$amount." /" .$studentUpdateId." / ".$SemUpdateId;exit();
	 $updateData = mysqli_query($conn,"UPDATE student_submitted_fee SET semester_id = '$semester_id', submitted_fee = '$amount' where semester_id = '$SemUpdateId' and student_id = '$studentUpdateId'");
if($updateData){
	  	 $Message = urlencode(" Fee Record Updated Successfully");
   		 header("location:../student_fee_details.php?successMsg=".$Message."&passId=".$studentUpdateId);
	  }else{
	  	$Message = urlencode("Query Or Database Error"); 
	  	  
		header("location:../update_fee_record.php?errorMsg=".$Message);
	  }

 
}else if(isset($_POST['promoteStudents'])){

$session  =  $_GET['session'];
$semster =  $_GET['semester'];
$session_full_name =  $_POST['session_full_name'];
// echo $session." / ".$semster." / ".$session_full_name;
 
 $spFall = substr($session_full_name,-13,4);
 $year = substr($session_full_name,-4,4);
   // echo "<br>".$spFall . "   <br> ".$year ; exit;
  

  //echo $_POST['session']." <br>";
 if($spFall == "Fall"){

 	$cuurent_year  = date("Y");
	
	$batch = "Spring - ".($year+1); 
// 	 echo "This". $batch; 
// 	  exit();
}
 else if($spFall =="Spri"){

 			  
			 $batch = "Fall - ".$year;  
  		// 	echo "this".$batch;exit();

 }
  	

 	$selectStudentForPromotion = mysqli_query($conn,"SELECT * FROM registered_student WHERE session_id = '$session' and semester = '$semster'"); 	

 	while($show = mysqli_fetch_array($selectStudentForPromotion)){

 		$promo_status = @$_POST[$show['id']];

 		// echo $promo_status; 

 		$situation = "";
 		if($promo_status == "on"){

 			$situation = 1;
 			
 		}else{

 			$situation = 0;
 		}
 
  if($situation  == 1){
 
	$std_id = $show['id'];
 
	 $promote = mysqli_query($conn,"UPDATE registered_student SET semester =  semester+1, session_id = '$batch' where id = '$std_id';");
	 if ($promote) {
	 	 $Message = urlencode(" Students Promoted Successfully");
   		 header("location:../promotion.php?successMsg=".$Message);
	 } 
	}
 }



 }
 else if(isset($_POST['update_user'])){
 	 $id = $_POST['user_id'];
 	 $user_name = $_POST['username'];
 	 $password = $_POST['pass'];

 	 $update_data = mysqli_query($conn,"UPDATE login SET user_name = '$user_name' , password = '$password' WHERE id = '$id'");
 	 if ($update_data) {
	 	 $Message = urlencode(" Changes Granted To Admin Data");
   		 header("location:../account-settings.php?successMsg=".$Message);
	 }
 }

 ?>