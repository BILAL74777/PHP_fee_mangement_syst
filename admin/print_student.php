<?php 
include('model/connection.php');

$session = $_GET['session'];
$semester = $_GET['semester'];
$selectFromSemester = mysqli_query($conn,"SELECT * FROM semester where id = '$semester'");
    $fetchArrayData = mysqli_fetch_array($selectFromSemester);

      $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE id = '$session'");
                                     $fetchSessionArray = mysqli_fetch_array($selectSession);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PIMMS Print Student's</title>

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
				Student's OF <?php  echo  $fetchArrayData['semester']." [ ". $session." ] "; ?>
					
			</strong>  
	   </p>
	 <table class="table table-bordered  table-striped table-hover">
	 	  <?php  
                                $selectAllStudents = mysqli_query($conn,"SELECT * FROM registered_student where semester = '$semester' and session_id = '$session' order by id asc");
                            ?>


                             <thead>
                    <tr>
                       <th>S.NO</th>
                       <th>Name</th>

                                        <th>Father Name</th>
                                        
                                        <th>Batch</th>
                                       <!-- <th> Session </th> -->
                                        <th>Admission Id</th>
                                        <th>Admission Date</th>
                                        
                    </tr>
                  </thead>
                  <tfoot>
                     <th>S.NO</th>
                        <th>Name</th>
                                        <th>Father Name</th>
                                        
                                        <th>Batch</th>
                                       <!-- <th> Session </th> -->
                                        <th>Admission Id</th>
                                        <th>Admission Date</th>
                                        
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php $i= 1;while($show = mysqli_fetch_array($selectAllStudents)){ ?>
                                    <tr>
                                       <td> <?php echo $i++; ?>  </td>
                                       
                                        <td><?php echo $show['full_name']; ?></td>
                                        <td><?php echo $show['father_name']; ?></td>
                                         
                                         
                                        <td><?php echo $show['batch']; ?></td>
                                        
                                      
                                        <!-- <td>
                                            <?php 
                                        // $store_session = $show['session_id'];
                                        //     $selectSession = mysqli_query($conn,"SELECT * FROM session WHERE id = '$store_session'");
                                        //     $fetchSessionArray = mysqli_fetch_array($selectSession);
                                        //     echo $fetchSessionArray['session'];
                                         ?>
                                             
                                         </td>  -->
                                          <td>
                                            
                                                  <?php echo $show['admission_id']; ?> 
                                             
                                        </td>  
                                        <td><?php echo $show['admission_date']; ?></td> 
                                         
                                    </tr>
                                <?php } ?>
                     
                      
                     


	 </table>
	
</div>
	
	<div class="text-center"><hr>
		<button class="btn btn-primary"  onclick="PrintDiv();">Print</button>
		<a href="index.php" class="btn btn-warning" >Goto Home</a>

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