<?php
		include("connection.php");
		
		
		

		$fname=$_REQUEST["fname"];
		$lname=$_REQUEST["lname"];
		$email=$_REQUEST["email"];
		$company=$_REQUEST["company"];
		$password=$_REQUEST["userpassword"];
		$join=$_REQUEST["join"];
		$pass=$join+3;
		$temp = explode(".", $_FILES["imgpic"]["name"]);
		$new_file_name = round(microtime(true)) . '.' . end($temp);
		
		$result=mysqli_query($conn,"select * from almma where email='$email'");
		$ct=mysqli_num_rows($result);
		if($ct>0){
				header("location:signupform.php?msg=regerror");
			}
			else
			{
			 move_uploaded_file($_FILES['imgpic']['tmp_name'], 'profiles/'.$new_file_name);
			$data=mysqli_query($conn,"insert into almma(almma_id,Firstname,lastName,email,password,company,year_of_join,year_of_pass,img) values ('$new_file_name','$fname','$lname','$email','$password','$company','$join','$pass','$new_file_name')");
header("location:home.php?msg=suc");
			}
mysql_close($conn);
?>