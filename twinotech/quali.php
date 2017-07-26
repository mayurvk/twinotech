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
			$con = mysqli_connect("localhost","root","r4e3w2q1","TwinOTech"); 
				
				if(!$con)
				{
				die("Could not connect".mysqli_error($con));
				}
				else
				{
					$sql = "SELECT * FROM quali_details";
                    $result = mysqli_query($con,$sql);
					
					echo"
					<table border ='1'>
						<tr>
							<th>Name</th>
							<th>Email Id</th>
							<th>Score</th>
							<th>Question no.</th>
							<th>Run ?</th>
						</tr>
					
					";
					
					while($row = mysqli_fetch_array($result))
					{
						echo"
						<tr>
							<td>".$row['name']."</td>
							<td>".$row['emailid']."</td>
							<td>".$row['score']."</td> 
							<td>".$row['queno']."</td>
							<td>".$row['ron']."</td>
						</tr>
						";
					}
					echo "</table></br>";
				}
		?>
            
		</form>
        </center>
    </body>
</html>