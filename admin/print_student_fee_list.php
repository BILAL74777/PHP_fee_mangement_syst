<?php 
include('model/connection.php');
$fallOrSpring = $_GET['fallorspring'];
$session = $_GET['session'];
$semester = $_GET['semester'];
$batch = $_GET['batch'];
$regNo = $_GET['regNo'];
$selectFromSemester = mysqli_query($conn,"SELECT * FROM semester where id = '$semester'");
    $fetchArrayData = mysqli_fetch_array($selectFromSemester);

      $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE session = '$session'");
                                     $fetchSessionArray = mysqli_fetch_array($selectSession);
                                     $session_table_primary_id = $fetchSessionArray['id'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PIMMS</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <link rel="shortcut icon" type="image/x-icon" href="../logo.jpeg">
</head>
<body class="">
	<div class="row">
		 
		<div class="col-md-12">
	<div class="table-responsive text-center container" id="print" style="border:2px solid orange;border-radius: 50px;">
		<h2 style="color: orange">Peshawar Medical & Management Sciences</h2>
		
		<p>
			<strong>
				Student's Fee List Of <br>Batch ( <?php  echo   $batch." ) <br>Semester ( ".$fetchArrayData['semester']." )<br>Session ( ".$session." ) "; ?>  
					
			</strong>  
	   </p>

     <div class="table-responsive">
                            <table class="table display data-table text-nowrap"  id="myTable">
                                <thead>
                                    <tr>
                                        <th>
                                            
                                                 
                                                <label class="">Reg #</label>
                                            
                                        </th>
                                       
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Semester</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th> Concission </th>
                                        <th>Balance</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>
                                            
                                                 
                                                <label class="">Reg #</label>
                                            
                                        </th>
                                         
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Semester</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th> Concission </th>
                                        <th>Balance</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                               <tbody>
                                <?php  
                                if($regNo != ""){

                                     $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student WHERE semester = '$semester' AND session_id = '$session' AND admission_id = '$regNo'  order by id asc");

                                }else{
                                $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student where semester = '$semester' and session_id = '$session' order by id asc");
                          
                            }
                                     while($show = mysqli_fetch_array($selectAllStudents)){ 
                                      $student_id_save = $show['id'];
                                      ?>
                                    <tr>
                                        <td>
                                            
                                                <label class="form-check-label"><?php echo $show['admission_id']; ?></label>
                                             
                                        </td>
 
                                        <td><?php echo $show['full_name']; ?></td>
                                        <td><?php echo $show['father_name']; ?></td>
                                        <td>

                                            <?php 
                                                $semser_id = $show['semester'];
                                            $selectClass = mysqli_query($conn,"SELECT * FROM semester where id = '$semser_id'");
                                             $fetchArray = mysqli_fetch_array($selectClass);
                                             echo $fetchArray['semester'];
                                                ?>

                                            </td>
                                              <!-- fee setting code -->
                                            <?php  

                                                             foreach(mysqli_query($conn,"SELECT SUM(submitted_fee) 
                                                          FROM student_submitted_fee WHERE student_id = '$student_id_save' AND semester_id ='$semser_id'") as $row) {
                                                            $total_fee = $row['SUM(submitted_fee)'];
                                                            
                                                         

                                                          $semester_fee_selecting = mysqli_query($conn,"SELECT * FROM semester_fee WHERE id = '$semser_id'");
                                                          $fetchArraySemesterFee = mysqli_fetch_array($semester_fee_selecting);

                                                          $total_dues = $fetchArraySemesterFee['amount'] - $total_fee;
                                                                                                                     }

                                                         ?>
                                         
                                        <td><?php echo"<i style='color:indigo;font-weight:bold'>  ". $fetchArraySemesterFee['amount']."</i>" ; ?></td>
                                      <td>
                                        <?php 

                                        if($total_fee < $fetchArraySemesterFee['amount']){ 
                                                  if($total_fee){
                                                    echo  "<i style='color:orange;font-weight:bold'>  ". $total_fee."</i>";
                                                  }else{
                                                       echo  "<i style='color:red;font-weight:bold'> Not Paid</i>";
                                                  }
                                            }else{
                                                  echo "<i style='color:green;font-weight:bold; ' class='fas fa-check'> Paid</i>";
                                                }

                                         ?>
                                          

                                      </td>
                                      <!-- td for concission coding -->
                                        <td>
                                            <?php 
                                            
                                                    $concSelectQuery = mysqli_query($conn,"SELECT * FROM concissions WHERE student_id = ' $student_id_save' AND semester_id = '$semester' AND session_id = '$session_table_primary_id'");

                                                    $fetchConcissionArray = mysqli_fetch_array($concSelectQuery);
                                                    $ConcissionAmount  =  @$fetchConcissionArray['concission_upto'];
                                                    if($ConcissionAmount == ""){
                                                        echo  " 
                                                        <i style='color:red;font-weight:bold;'>  0 Concission</i>";                                                    

                                                     }else{
                                                        echo "<i style='color:green;font-weight:bold;'> ".$ConcissionAmount."</i>";
                                                            
                                                        }

                                             ?>
                                        </td>   
                                         <!-- concission coding ends here -->



                                      <td><?php 
                                      if($total_dues - $ConcissionAmount < $fetchArraySemesterFee['amount']){
                                      echo"<i style='color:red;font-weight:bold'>". $total_dues-$ConcissionAmount."</i>";
                                      
                                     
                                      }else{echo"<i style='color:red;font-weight:bold'>". 0 ."</i>";}  ?>
                                        

                                      </td>

                                      <!-- fee setting code area ends -->

                                        
                                    </tr>
                                <?php } ?>
                                </tbody>

                                <!-- button for Print -->

                                     
                                 <!-- button for Print -->

                            </table>
                        </div>
	  
	
</div>
	
	<div class="text-center"><hr>
		<button class="btn btn-primary"  onclick="PrintDiv();">Print</button>
		<a href="add_fee.php" class="btn btn-warning" >Goto Home</a>

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