<html>
	  <style>
      body{
        background-color: #282f2f;
    }
          th{
              background-color: darkseagreen;
          }
          
          tr:hover {
              background-color: #ddd;
              border-style: dashed;
              border-width: 2px;
          }

	th,td{
			
		font-size:20px;
		padding-left:15px;
		padding-right:15px;
		padding-top:2px;
		padding-bottom:2px;
		border-style:hidden;
	}
	#b1{
		width: 120px;
		height: 30px;
		background-color:#282f2f;
		color:#2e6da4;
        border-radius: 25px;
        
	}
          form{
            
              margin-left: 10px;
              margin-right: 10px;
              
    
    background-color:#31708f;
    box-shadow: 5px 7px 5px grey; 
          }
          table{
              border-style:hidden;
          }
	</style>
	<body>
        
	<center><form><br>
<?php 
				$con = mysqli_connect("localhost","root","r4e3w2q1","twinotech"); 
				
				if(!$con)
				{
				die("Could not connect".mysqli_error($con));
				}
				else
				{
					$sql = "SELECT * FROM parts_regs ORDER BY recieptno ASC";
					$result = mysqli_query($con,$sql);
					
					echo"
					<table border ='1'>
						<tr>
                            <th>Reciept No.</th>
							<th>Leader Name</th>
							<th>Second Person</th>
							<th>Email Id</th>
							<th>Phone No</th>
							<th>College </th>
						</tr>
					
					";
					
					while($row = mysqli_fetch_array($result))
					{
						echo"
						<tr>
							<td>".$row['recieptno']."</td>
                            <td>".$row['fname']."</td>
							<td>".$row['sname']."</td>
							<td>".$row['emailid']."</td> 
							<td>".$row['phno']."</td>
							<td>".$row['college']."</td>
						</tr>
						";
					}
					echo "</table></br>";
				}
			?>
			<br>
			
        
		</form>
        </center>
	</body>
</html>