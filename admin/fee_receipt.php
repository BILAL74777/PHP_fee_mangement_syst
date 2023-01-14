<?php 
include('model/connection.php');
$semester_id =  $_GET['semster'];
$std_Id = $_GET['std_Id'];
$dob = $_GET['dob'];
$totalamt = $_GET['totalamt'];
 
 
$amountTobepaid = $_GET['amountTobepaid'];

 
//echo $semester_id." / ".$std_Id." / ".$dob." / ".$totalamt." / ".$concision." / ".$finalamount;

$select_sem = mysqli_query($conn,"SELECT * FROM semester where id = '$semester_id'");
$semesteFetchArray = mysqli_fetch_array($select_sem);
//echo $semesteFetchArray['semester'];	



$select_std = mysqli_query($conn,"SELECT * FROM registered_student where id = '$std_Id'");
$stdFetchArray = mysqli_fetch_array($select_std);
//echo $stdFetchArray['full_name'];



 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PIMMS Print Slip</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="shortcut icon" type="image/x-icon" href="../logo.jpeg">
	 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
</head>
<body class="">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
	<div class="table-responsive text-center container" id="print" style="border:2px solid orange;border-radius: 50px;">
		<h2 style="color: orange">Peshawar Medical & Management Sciences</h2>
		<p>Student Fee Reciept</p>
	 <table class="table table-bordered  table-striped table-hover">
	 	<tr>
	 		<td class="bg-dark text-white">Student Name</td>
	 		<td style="color:indigo; font-weight: bold;"> <?php echo $stdFetchArray['full_name']; ?> </td>
	 	</tr>
	 	<tr>
	 		<td class="bg-dark text-white">Father Name</td>
	 		<td style="color:indigo; font-weight: bold;"> <?php echo $stdFetchArray['father_name']; ?> </td>
	 	</tr>
	 	<tr>
	 		<td class="bg-dark text-white">Admission ID</td>
	 		<td style="color:indigo; font-weight: bold;"> <?php echo $stdFetchArray['admission_id']; ?> </td>
	 	</tr>
	 	 
	 	<tr>
	 		<td class="bg-dark text-white">Fee Full Amount </td>
	 		<td style="color:indigo; font-weight: bold;"> PKR :- <?php echo $totalamt; ?> </td>
	 	 

	 		 
	 	</tr>

	 	<tr>
	 		<td class="bg-dark text-white">Balance Amount </td>
	 		<td style="color:indigo; font-weight: bold;"> PKR :- <?php if($totalamt - $amountTobepaid == 0){echo "Fully Paid";}else{ echo $totalamt - $amountTobepaid;} ?> </td>
	 	</tr>

	 	<tr>
	 		<td class="bg-dark text-white">Submission Date</td>
	 		<td style="color:indigo; font-weight: bold;"> <?php echo $dob; ?> </td>
	 	</tr>

	 	<tr>
	 		<td class="bg-dark text-white">Accountant Sign</td>
	 		<td style="color:indigo; font-weight: bold;">_______________________________________</td>
	 	</tr>
	 	 
	 </table>
	
</div>
	
	<div class="text-center"><hr>
		<button class="btn btn-primary"  onclick="PrintDiv();">Print</button>
		<a href="dashboard.php" class="btn btn-warning" >Goto Home</a>

	</div> 


</div>
</div>


<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('print');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
</body>
</html>

