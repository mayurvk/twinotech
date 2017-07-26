<?php 
	 session_start();
//    if(!isset($_COOKIE['visited']))
//	{
//		setcookie('visited','true',time()+60*10);
//	}
//	else
//	{
//		setcookie('visited','false',time()-60*10);
//		session_destroy();
//		echo "
//		 <script> 
//		 alert('You are disqualified for refreshing the page');
//		 window.location.href='login.html';
//		 </script>
//		 ";
//	}
?>

<html>
    <head>
        <title> Twin-O-Tech</title>
    </head>
<!--  <link rel="stylesheet" type="text/css" href="style.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/Lato.css">
       <script src="js/jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
<style>

    
    
      body{
          background-color: #272525;
          background-size: cover;
            color: #d4d5d8;
          font-family: cursive;
          font-size: 1.5em;
    
    }

    
    h1{
        text-align: center;
    }
      a
      {
          z-index: 1000;
          color: inherit;
          text-decoration: none;
          position: absolute;
          text-align: center;
          left: 555px;
          top: 70px;
		width: 250px;
		height: 74px;
		background-color: #2b4ba0;
		box-shadow: 10px 10px 5px #888888;
      
      }
      
      a:hover{
          
          color: whitesmoke;
      }
    h3{
        color: aliceblue;
    }
    #blink{
        
    position: absolute;
    top: 77px;
    left: 900px;
    font-size: 3em;
    font-style: italic;
    color: cornflowerblue;
    }
    
    
    @keyframes blinker{
        50% {
            opacity: 0;
        }
    }
    #head{
        position: absolute;
        top : 10px;
    }
    img{
    vertical-align: middle;
    width: 685px;
    height: 426px;
    position: relative;
    top: 179px;
    left: -42px;
    }
    
    #event{ 
    }
    
        </style>
        <body >
            <div id="blink"> <---Click here</div>
           <a href="codeWindow.php"> <h1 align="middle">Twin-O-Tech </h1></a>
            <div class="col-md-6">
                    
               
                 
                 <br>
                
                 <br>
                    <h3>Rules and Regulations!</h3>
            
             <p>
              
<strong>Problem Statement :</strong><i> <br>A call for all the Coders out there. lets "jugadofy" a new avatar<br>for the solution.</i><br><hr width = "19%" align="left">
<strong>Outcome:</strong> <br><i>show your C and C++ skills. If you have any :P </i> <br><br>
<strong><b>Round details:</b></strong> <br> 
<br>             <strong >Level 1::</strong> <br><i>we all are good at imitating. so use your brains to write a code which would give <br> the same output as that of the given code.</i><br>
<b>P.S.</b> <i>  Copy Paste wont work here. :P </i><br><br>
 <strong>Level 2:: </strong><br> <i>Lets gear up the game! Why to code in fragments when we can recreate the whole <br>mess!</i><br>
             
<i>top<b> 10 </b> technogeeks will be entertained further! </i><br>
    <br>         
<strong>level 3:: </strong><br><i> Lets light up the fire now. Its not just about coding but also about making <br>it legible. Not everyone is a techie so lets indent it for them!</i><br>
<b>P.S. </b><i> Dont miss out on Mrs.TickTock! (There is a "waqt ki pabandi")</i><br>
             <B>Note : </B> Don't use pre-defined functions, use your mind instead :P
             <b><i>All the Best! ;) </i></b>
             </div></div>
             <div class="col-md-6">
                 <div id= "imgborder">
             <img src="images/www.GIFCreator.me_EjnffI.gif"  style="border:5px solid black">
             </div>
             
             </div>
</div>
             <script>
             document.getElementById("blink").style.animation = "blinker 1s linear infinite";
             
             </script>
        </body>
    </html>