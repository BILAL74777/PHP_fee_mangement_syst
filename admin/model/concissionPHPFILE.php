<?php 
include('connection.php');

$amount = $_POST['amount'];
$student_id = $_POST['student_id'];
$semester_id = $_POST['semester_id'];
$session_id  = $_POST['session_id'];
if($_POST['regNo'] != ""){
	 $regNo  = $_POST['regNo'];

$insertQuery = mysqli_query($conn,"INSERT INTO `concissions`(`id`, `student_id`, `semester_id`, `session_id`, `concission_upto`) VALUES (null,'$student_id','$semester_id','$session_id','$amount')");
if($insertQuery){
 
	header('location:../add_fee.php?searchRegNo='.$regNo);
}

}else{


// echo $amount." / ".$student_id." / ".$semester_id." / ".$session_id;exit();

$insertQuery = mysqli_query($conn,"INSERT INTO `concissions`(`id`, `student_id`, `semester_id`, `session_id`, `concission_upto`) VALUES (null,'$student_id','$semester_id','$session_id','$amount')");
if($insertQuery){

	$selectSession = mysqli_query($conn,"SELECT * FROM session WHERE id = '$session_id'");
	$fetchSession = mysqli_fetch_array($selectSession);
	$sessionSelected = $fetchSession['session'];
 
	header('location:../add_fee.php?semesterSearchIdPass='.$semester_id.'&sessionIdPass='.$sessionSelected);
}
}


 ?>