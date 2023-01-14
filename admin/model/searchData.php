<?php 
include('connection.php');
if(isset($_POST['searchProsfectusFee'])){


$session = $_POST['session'];


$selectProsFee = mysqli_query($conn,"SELECT * FROM prospectus_fee where session_id = '$session'");

$fetchArrayProspectus = mysqli_fetch_array($selectProsFee);
if($session == @$fetchArrayProspectus['session_id']){

	$selectSession = mysqli_query($conn,"SELECT * FROM session where id = '$session'");
	$fetchArraysession = mysqli_fetch_array($selectSession);

	$storeSession = $fetchArraysession['session'];

$store  = $fetchArrayProspectus['prosfectus_fee'];
 
 if($fetchArrayProspectus){

 		$Message = urlencode($store);
 		$Message2 = urldecode($storeSession);



 
 
		header("location:../prospectus_fee.php?errorMsg=".$Message."&errorMsg2=".$Message2);
 }

}else{

	$Message = urlencode("Not Found Any Data For This Session Please First Add DATA");
 
 
		header("location:../prospectus_fee.php?errorMsg=".$Message);
}

}else if(isset($_POST['searchSemester'])){
 	$semser_id = $_POST['semesterSearch']; 
	$session_id_search = $_POST['sessionSearch']; 
	$regNo  = $_POST['regNo'];

	if($regNo != "" && $semser_id != "" && $session_id_search != ""){
 				 
 				header("location:../index.php?semesterSearchIdPass=$semser_id&session_id_search=$session_id_search");
 		}
	else if($regNo != ""){

		header("location:../index.php?searchRegNo=$regNo");
		 
	}else{	 
				// echo $semser_id." / ".$session_id_search;exit();
 				header("location:../index.php?semesterSearchIdPass=$semser_id&session_id_search=$session_id_search");
 		}

 }else if(isset($_POST['searchSemester'])){
 	$semser_id = $_POST['semesterSearch']; 
	$session_id_search = $_POST['sessionSearch']; 
	$regNo  = $_POST['regNo'];

	if($regNo != "" && $semser_id != "" && $session_id_search != ""){
 				 
 				header("location:../index.php?semesterSearchIdPass=$semser_id&session_id_search=$session_id_search");
 		}
	else if($regNo != ""){

		header("location:../index.php?searchRegNo=$regNo");
		 
	}else{	 
				// echo $semser_id." / ".$session_id_search;exit();
 				header("location:../index.php?semesterSearchIdPass=$semser_id&session_id_search=$session_id_search");
 		}

 }else if(isset($_POST['searchstudentsForFee'])){


 	$semser_id = $_POST['semesterSearch']; 
 	$session_id = $_POST['sessionSearch']; 
  	$regNo  = $_POST['regNo'];

  		if($regNo != "" && $semser_id != "" && $session_id != ""){
 				 
 				header("location:../add_fee.php?semesterSearchIdPass=$semser_id&sessionIdPass=$session_id");
 		}
	 	else if($regNo != ""){
	 		header("location:../add_fee.php?searchRegNo=$regNo");
			 
		}else{	 
	 
 			header("location:../add_fee.php?semesterSearchIdPass=$semser_id&sessionIdPass=$session_id");
 		}
 }
else if(isset($_POST['searchSemesterFee'])){

$session = $_POST['batch'];
 

$selectSemFee = mysqli_query($conn,"SELECT * FROM semester_fee where batch = '$session'");

$fetchArraySemester = mysqli_fetch_array($selectSemFee);
if($session == @$fetchArraySemester['batch']){

	 

	$storeSession = $fetchArraySemester['batch'];
 
 		header("location:../semester_fee.php?dataPassess=$storeSession");
 }
else{

	$Message = urlencode("Not Found Any Data For This Batch Please First Add DATA");
 
 
		header("location:../semester_fee.php?errorMsg=".$Message);
}
}else if(isset($_POST['searchstudentsHistory'])){
 	 
	$regNo  = $_POST['regNo'];

	 

		header("location:../fullHistory.php?searchRegNo=$regNo");
		 
	 
 }




 ?>