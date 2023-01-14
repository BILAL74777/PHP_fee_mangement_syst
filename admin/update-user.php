	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Update</title>
		<style>
			*{
				background-color: orange;

			}
			.design{
				border-radius: 10px;
				border:red solid 2px;
				margin-top:100px;
			}
		</style>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
		<?php
		include('model/connection.php');
		if(isset($_GET['user_id'])){
   
   $user_id = $_GET['user_id'];

   $selectUpdateuser = mysqli_query($conn,"SELECT * FROM login WHERE id = '$user_id'");

   $fetchRow = mysqli_fetch_array($selectUpdateuser);
 
}

		 ?>



		 

<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-3 design">
		<form action="model/update_Data.php" method="post">
			<input type="hidden"  name="user_id" value="<?php echo $fetchRow['id'];?>">
			 
			 <div class="form-group">
	   			 <label for="exampleInputEmail1">Current Admin Login ID</label>
				<input type="text" class="form-control" name="username" value="<?php echo $fetchRow['user_name'];?>">
			</div>


			<div class="form-group">
    			<label for="exampleInputEmail1">Current Password</label>
				<input type="text" name="pass"  class="form-control" value="<?php echo $fetchRow['password'];?>"><hr>
				 <input type="submit"  class="btn btn-danger btn-block" name="update_user" value="Update Now">                  
				                  
             </div>
		</form>
		<a href="account-settings.php"   class="btn btn-success btn-block"    > Go Back Now</a> <hr>
</div>
	<div class="col-md-4"></div>

		</div>
		
	</body>
	</html>