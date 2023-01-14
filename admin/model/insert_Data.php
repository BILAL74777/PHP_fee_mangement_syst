<?php 
include('connection.php');

if(isset($_POST['session_save'])){

	$form_year = $_POST['from_date'];
	$to_year  = $_POST['to_date'];
	$fetchbatch  = $_POST['batch'];

	$batch  = $form_year." - ".$to_year;


	$fetchDataForValidation = mysqli_query($conn,"SELECT * FROM session");
	$fetchToArray = mysqli_fetch_array($fetchDataForValidation);

	$dbBatch = $fetchToArray['session'];
	$dbfetchBatch = $fetchToArray['batch'];


	if(($dbBatch == $batch) AND ($fetchbatch== $dbfetchBatch) ){
		 
		 $Message = urlencode("This Session Is Already Exist Please Try Another ! "); 
		header("location:../session.php?errorMsg=".$Message);
		
		
		 
	}else{
		
		        $insertBatch = mysqli_query($conn,"INSERT INTO session VALUES(null,'$batch','$fetchbatch')");
		        
            		if($insertBatch){		
            		 $Message = urlencode("Session  Inserted Successfully");
               		 header("location:../semester_fee_add.php?successMsg=".$Message);
            	    }else{
            		    $Message = urlencode("Query Or Database Error");
        		         header("location:../session.php?errorMsg=".$Message);
        	         }
	
	    
	}




}else if(isset($_POST['register_student'])){

 $student_name = strtoupper($_POST['student_name']);
 $father_name = strtoupper($_POST['father_name']);
 $gender = $_POST['gender'];
 $dob = $_POST['dob'];
 $marital_status = $_POST['marital_status'];
 $street = $_POST['street'];
 $district = $_POST['district'];
 $domicile = $_POST['domicile'];
 $cnic = $_POST['cnic'];
 $fcnic = $_POST['fcnic'];
 
 $session_batch = $_POST['batch'];//this is actuall batch the $batch is for session iam lazy so i cant change all the $batch variables name so thats why i declare $session_batch  for batch

 $spFall = substr($_POST['session'],-13,4);

   	echo $spFall." <br>";

 
if($spFall == "Fall"){
 $batch = substr($_POST['session'],-14,11);
 //echo $batch; exit();
  
}else if($spFall == "Spri"){
	$batch = substr($_POST['session'],-14,13);
	//echo $batch; exit();
}
 
if($spFall == "Fall"){
 $session = substr($_POST['session'],11);
  
}else if($spFall == "Spri"){
	$session = substr($_POST['session'],13);
}

//echo $session;exit();
 
 $religion = strtoupper( $_POST['religion']);
 $semester = 1;
 $email = $_POST['email'];
 
 $phone = $_POST['phone'];
  
$photo = $_FILES['photo']['name'];
$adm_date = date("Y/m/d");
    
    $technology = $_POST['technology'];
     
 
   
    $selectTech = mysqli_query($conn,"SELECT * FROM technology WHERE id = '$technology'");
    $fetchArrayTec = mysqli_fetch_array($selectTech);
    $techSearch  = $fetchArrayTec['technology'];





 if($techSearch == "Anesthesia" && $spFall == "Fall"){
 	 $date = date('Y');
 	$admission_id = "DAN-Fa ".$date."-".rand(1,100);
 	 
 }else  if($techSearch == "Surgical" && $spFall == "Fall"){
 	 $date = date('Y');
 	$admission_id = "DSR-Fa ".$date."-".rand(1,100);
 	 
 }
 else  if($techSearch == "Dental" && $spFall == "Fall"){
 	 $date = date('Y');
 	$admission_id = "DDN-Fa ".$date."-".rand(1,100);
 	 
 }

  else  if($techSearch == "Health" && $spFall == "Fall"){
 	 $date = date('Y');
 	$admission_id = "DHL-Fa ".$date."-".rand(1,100);
 	 
 }

 else  if($techSearch == "Pathology" && $spFall == "Fall"){
 	 $date = date('Y');
 	$admission_id = "DPA-Fa ".$date."-".rand(1,200);
 	 
 }
  else  if($techSearch == "Radiology" && $spFall == "Fall"){
 	 $date = date('Y');
 	$admission_id = "DRA-Fa ".$date."-".rand(1,100);
 	 
 }


 if($techSearch == "Anesthesia" && $spFall == "Spri"){
 	 $date = date('Y');
 	$admission_id = "DAN-Sp ".$date."-".rand(1,100);
 	 
 }else  if($techSearch == "Surgical" && $spFall == "Spri"){
 	 $date = date('Y');
 	$admission_id = "DSR-Sp ".$date."-".rand(1,100);
 	 
 }
 else  if($techSearch == "Dental" && $spFall == "Spri"){
 	 $date = date('Y');
 	$admission_id = "DDN-Sp ".$date."-".rand(1,100);
 	 
 }

  else  if($techSearch == "Health" && $spFall == "Spri"){
 	 $date = date('Y');
 	$admission_id = "DHL-Sp ".$date."-".rand(1,100);
 	 
 }

 else  if($techSearch == "Pathology" && $spFall == "Spri"){
 	 $date = date('Y');
 	$admission_id = "DPA-Sp ".$date."-".rand(1,100);
 	 
 }
  else  if($techSearch == "Radiology" && $spFall == "Spri"){
 	 $date = date('Y');
 	$admission_id = "DRA-Sp ".$date."-".rand(1,100);
 	
 }
 
 
 

///selecting data from database to check with the exist roll in the class and also check registration code starts...

 

/*echo $storeRoll." / ".$storeClass."<br>";
echo $roll." / ".$class;*/


 
 
//echo $storeReg." / ".$admission_id;exit();
///selecting data from database to check with the exist roll in the class and also check registration code end...


//echo $student_name." / ".$father_name." / ".$gender." / ".$dob." / session = ".$session." / ".$religion." / ".$email." / ".$phone." / ".$photo." / ".$fcnic. " / ".$domicile." / ".$district." / ".$street. " / ".$marital_status." / batch = ".$batch."/ Semester = ".$semester." / ".$technology." / ".$cnic." / ".$admission_id." / ".$adm_date;exit(); 
 
 
$location = '../studentImages/'; //where the images store 
$supported_image = array('gif','jpg','jpeg','png');
$src_file_name = $photo;
$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

$photo_tmp = $_FILES['photo']['tmp_name'];
 
 if (in_array($ext, $supported_image))

	 {
	  if(move_uploaded_file($photo_tmp, $location.$photo)){
          
	  $insertData = mysqli_query($conn,"INSERT INTO registered_student VALUES (null,'$technology','$student_name','$father_name','$gender','$dob','$marital_status','$street','$district','$domicile','$cnic','$fcnic','$session_batch','$email','$religion','$semester','$batch','$admission_id','$phone','$photo','$adm_date') ");

 
	  if($insertData){
	  	 $Message = urlencode(" <h3>New Student Added Successfully</h3>");
	  	// echo "string firedd"; exit();
   		 header("location:../index.php?successMsg=".$Message);
	  }else{
	   
	  	$Message = urlencode("Query Or Database Error, Check the issue!"); 
	  	//echo "string error";exit();
		header("location:../admit_form.php?errorMsg=".$Message);
	  }
	}else{
		echo "File Not Moving";
	 }
	}

	else 

	{

	   $Message = urlencode('Kindly Select Only GIF,jpg,jpeg,png Type Only for image');
	   header("location:../admit_form.php?errorMsg=".$Message);

	}


 
 




}else if(isset($_POST['pros_fee_add'])){

	$pros_fee = $_POST['pros_fee'];
	$session = $_POST['session'];

	$insert_data = mysqli_query($conn,"INSERT INTO prospectus_fee VALUES(null,'$pros_fee','$session')");
	if($insert_data){
		$Message = urlencode("prospectus Fee Added Successfully");
   		 header("location:../prospectus_fee.php?successMsg=".$Message);
	}
	else{
		$Message = urlencode(" Query Or Database Error ");
   		 header("location:../prospectus_fee_add.php?errorMsg=".$Message);
	}
}else if(isset($_POST['semester_fee_add'])){
	 $session_id = $_POST['session'];
	 $semester_id = $_POST['semester_id'];
	 $amount = $_POST['amount'];
	 $batch = $_POST['batch'];
	 //$reg_fee = $_POST['reg_fee'];
	 $reg_fee = 0;
	// $exame_fee = $_POST['exame_fee'];
	 $exame_fee = 0;

	  //echo $session_id." / ".$semester_id 	." / ".$amount	." / ".$reg_fee	." / ".$exame_fee;exit(); 
	$insert_data = mysqli_query($conn,"INSERT INTO semester_fee VALUES(null,'$session_id','$semester_id','$batch','$amount','$reg_fee','$exame_fee')");
	if($insert_data){
		$Message = urlencode("Semester Fee Added Successfully");
   		 header("location:../semester_fee.php?successMsg=".$Message);
	}
	else{
		$Message = urlencode(" Query Or Database Error ");
   		 header("location:../semester_fee_add.php?errorMsg=".$Message);
	}
}else if(isset($_POST['submit_fee'])){

	$semester_id		 = $_POST['semester_id'];
	$student_id 		 = $_POST['std_id'];
	$dateOfSubmission    = $_POST['dos'];
	$amout  			 = $_POST['amount'];
	$session_id 		 = $_POST['session_id'];
	$amountTobepaid = $_POST['amountTobepaid'];
	$batchName = $_POST['batchName'];
		// echo $semester_id. " / ".$student_id." / ".$dateOfSubmission." / ".$amout. " / ".$session_id; exit();
	// $amount = ($amountForm  / 100) * $concision;
	// $final_price = $amountForm - $amount;
	//echo $final_price." / ".$amountForm;exit();
	//echo $semester_id." / ".$student_id." / ".$dateOfSubmission." / ".$amount;exit();


	$insertToStdFee = mysqli_query($conn,"INSERT INTO student_submitted_fee VALUES(null,'$student_id','$semester_id','$session_id','$batch','$amout',0,'$dateOfSubmission')");

	 if($insertToStdFee){
	 	 
	  	 $Message = urlencode(" Fee Submitted Successfully! ThankYou!");
   		 header("location:../fee_receipt.php?semster=".$semester_id."&std_Id=".$student_id."&dob=".$dateOfSubmission."&totalamt=".$amout."&concision=".$concision."&finalamount=".$final_price."&amountTobepaid=".$amountTobepaid);
	  }else{
	  	 
	  	$Message = urlencode("Query Or Database Error "); 
	  	  
		header("location:../student_fee_details.php?errorMsg=".$Message);
	  }


}
if(isset($_POST['batch_save'])){

	$form_year = $_POST['from_year'];
	$to_year  = $_POST['to_year'];

	$batch  = $form_year." - ".$to_year;
 

	$fetchDataForValidation = mysqli_query($conn,"SELECT * FROM batch");
	$fetchToArray = mysqli_fetch_array($fetchDataForValidation);

	$dbBatch = $fetchToArray['batch'];


	if($dbBatch != $batch){
		 
		 $insertBatch = mysqli_query($conn,"INSERT INTO batch VALUES(null,'$batch')");
		if($insertBatch){		
		 $Message = urlencode(" Batch Inserted Successfully");
   		 header("location:../batch.php?successMsg=".$Message);
	}

	else{
		 
		 $Message = urlencode("Query Or Database Error");
 
 
		header("location:../batch.php?errorMsg=".$Message);
	}
		
		 
	}else{
		$Message = urlencode("This Batch Is Already Exist Please Try Another ! "); 
		header("location:../batch.php?errorMsg=".$Message);
		}




}

 ?>