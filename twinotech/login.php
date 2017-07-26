<?php
/*$con = mysqli_connect("localhost","root","r4e3w2q1","twinotech"); if(!$con)

{
die("Could not connect".mysqli_error($con));
}
else
{
session_start();
$myusername = mysqli_real_escape_string($con,$_POST['emailId']);
$mypassword = mysqli_real_escape_string($con,$_POST['password']);
$cv = "Admin@sits.ind";

$sql = "SELECT Username AND Password FROM login WHERE Username = '$myusername' and Password = '$mypassword'";
$check = "SELECT Visited FROM login WHERE Username='$myusername' and Visited='NV'";
// code for checking username and password validation
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);
// code for checking wether the user is visited or not !
$result1 = mysqli_query($con,$check);
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

$count1 = mysqli_num_rows($result1);

if(($count == 1) and ($myusername == $cv ))
{

header("location: admin.php");

}


// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1 and $count1 == 1) {

$sql1="UPDATE login SET Visited='V'WHERE Username = '$myusername'";
if (!mysqli_query($con,$sql1)) {
die('Error: ' . mysqli_error($con));
}
$_SESSION['username']=$myusername;
setcookie('uncookie',$myusername,time()+60*5);

header("location: instr.php");
}else {
if($count == 0)
{
echo "
<script>
alert('Check your Username or Password ');
window.location.href='login.html';
</script>
";
}
else{
echo "
<script>
alert('You have already appeared for the Event !!!');
window.location.href='login.html';
</script>
";
}

}
}*/
$con = mysqli_connect("localhost","root","r4e3w2q1","twinotech");
if(!$con){
    die("Could not connect".mysqli_error($con));
}
else{
    session_start();
    $myusername = mysqli_real_escape_string($con,$_POST['emailId']);
    $mypassword = mysqli_real_escape_string($con,$_POST['password']);
    $sql = "SELECT Username AND Password FROM login WHERE Username = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
      echo "Login Successful";
      $_SESSION['username']=$myusername;
      setcookie('uncookie',$myusername,time()+60*5);
    }
    else
      echo "Invalid Credentials";
}

?>