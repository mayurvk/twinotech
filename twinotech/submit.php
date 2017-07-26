<?php
	$con = mysqli_connect("localhost","root","r4e3w2q1","twinotech"); 
if(!$con)
	{
		die("Could not connect".mysqli_error($con));
	}
	else
	{
		
        $rno= mysqli_real_escape_string($con,$_POST['rno']);
        $fname= mysqli_real_escape_string($con,$_POST['fname']);
		$sname= mysqli_real_escape_string($con,$_POST['lname']);
		$college= mysqli_real_escape_string($con,$_POST['college']);
		$emailId= mysqli_real_escape_string($con,$_POST['mail']);
		$phno= mysqli_real_escape_string($con,$_POST['phoneno']);
		$regtype=mysqli_real_escape_string($con,$_POST['regis']);
		
		$sql = "INSERT INTO parts_regs(recieptno,fname,sname,college,emailid,phno,regtyp) VALUES ('$rno','$fname','$sname','$college','$emailId','$phno','$regtype')";
		$password = mt_rand(10000,100000);
        
		if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
		}
        $class ="INSERT INTO login (Username,Password,Visited) VALUES ('$emailId','$password','NV')";
        		if (!mysqli_query($con,$class)) {
		die('Error: ' . mysqli_error($con));
		}
        echo "<script>";
        echo "alert('Inserted into database');
        
        		 window.location.href='Signup.html'";
        echo "</script>";
        mysql_close($con);
	}	
?>