<html>

<head>
  <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Lato.css">
  <script src="js/jquery.min.js"></script>

  <?php
if(!isset($_COOKIE['visited1']))
{
    setcookie('visited1','true',time()+60*50);
}
else
{
    session_start();
    setcookie('visited1','false',time()-60*50);
    session_destroy();
    echo "
    <script>
    alert('You are disqualified for refreshing the page');
        window.location.href='login.html';
    </script>
    ";
}
?>
</head>

<body>
  <style>
    body {
      background-color: #041e41;
    }
    /*
div{
color:#EFD0CA;
font-size:20px;
text-align:center;
}
*/
    
    .overlay {
      background-color: #EFEFEF;
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 1000;
      top: 0px;
      left: 0px;
      opacity: .5;
      filter: alpha(opacity=50);
    }
    
    a {
      color: #a1d36c;
      text-decoration: none;
      cursor: pointer;
    }
    
    a:hover {
      text-decoration: none;
      color: #a1d36c;
    }
    
    textarea {
      height: 300;
      width: 300;
      margin: 50;
      resize: none;
    }
    
    #input {
      height: 50;
      top: 304px;
      left: 50px;
      position: absolute;
      background: black;
      color: chartreuse;
    }
    
    #clock {
      position: absolute;
      top: 387px;
      left: 532px;
      text-align: center;
    }
    
    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
    
    #coutput {
      height: 300;
      width: 400;
      background-color: black;
      color: chartreuse;
      top: 399px;
      position: absolute;
      left: 2;
      font-family: monospace;
    }
    
    label {
      color: aliceblue;
    }
    
    #code {
      font-family: monospace;
      background-color: black;
      color: chartreuse;
      height: 300;
      width: 400;
    }
    
    #input1 {
      height: 300;
      width: 300;
      margin: 50;
      background-color: red;
      font-family: monospace;
    }
    
    #output1 {
      height: 300;
      width: 300;
      margin: 50;
      background-color: red;
      font-family: monospace;
    }
    
    #editor {
      position: absolute;
      top: 0;
      right: 100;
      bottom: 23px;
      left: 789px;
      height: 300;
      width: 400;
      margin: 50;
      background-color: black;
      color: chartreuse;
      font-family: monospace;
      overflow-x: hidden;
    }
    
    #out {
      position: absolute;
      top: 398px;
      right: 100;
      bottom: 23px;
      left: 789px;
      height: 300;
      width: 400;
      margin: 50;
      background-color: black;
      color: chartreuse;
      font-family: monospace;
      overflow-x: hidden;
    }
    
    #inputdef {
      height: 50;
      top: 304px;
      left: 849px;
      position: absolute;
      background: black;
      color: chartreuse;
      font-family: monospace;
    }
    
    #ques {
      pointer-events: none;
    }
    
    #overlay {
      width: 380;
      height: 300;
      z-index: 1;
      background-color: gra#EFEFEF;
      opacity: .5;
      filter: alpha(opacity=50);
    }
    
    #overlay {
      position: absolute;
      top: 51px;
      right: 100;
      bottom: 23px;
      left: 840px;
    }
    
    #subml {
      position: relative;
      top: 182px;
      left: -13px;
    }
    
    #event {
      color: cornflowerblue;
      position: absolute;
      font-family: cursive;
      top: 20px;
      left: 480px;
      font-size: 3.5em;
    }
  </style>

  <body>
    <div id="event"> <strong> Twin-O-Tech</strong> </div>
    <div id="clock"> <a onclick="checkScore();" id="btn"><span id="timer" style="
position: relative;
font-size: 5em;
top: -40px;
left: 59px;
"></span></a></div>
    <form id="myform" name="myform" method="post" action="compilecode">
      <?php
session_start();
$sql = "SELECT * FROM `r3_que`";
$con = mysqli_connect("localhost","root","r4e3w2q1","twinotech");
if(!$con)
{
    die("Could not connect".mysqli_error($con));
}
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
$queno = mt_rand(0,$count-1);
$iterator = 0;
while($iterator <= $queno)
{
    $row = mysqli_fetch_array($result);
    if($iterator == $queno){
        echo ("<div id = \"overlay\"> </div>");
        echo ("<textarea id = \"editor\" name = \"editor\" row = \"100\" cols = \"50\" disabled >");
        echo ("//Given piece of Code.!");
        echo("
        
        ");
        echo $row['question'];
        echo ("</textarea>");
        
        echo ("<div id = \"overlay\"> </div>");
        echo "<textarea id=\"out\" name = \"out\" row = \"100\" cols = \"50\" disabled>";
        
        echo "//given Output!";
        echo("
        
        ");
        echo $row['output'];
        echo "</textarea>";
        echo ("<input id = filename type=\"hidden\" value=");
        echo $_SESSION['username'];
        echo ("/>");
        
        
        echo '<textarea id="inputdef" name = "inputdef" row = "100" cols = "50" disabled>';
        echo $row['input'];
        echo "</textarea>";
    }
    /* echo $row['question'];*/
    $iterator++;
}
?>


        <span id="hiddenTimer" style="display:none;"></span>







        <textarea id="code" name="code" row="100" cols="50">// Enter your logic Here Folks!</textarea>
        <textarea id="input" name="input" row="100" cols="50"></textarea>


        <textarea id="coutput" disabled></textarea>
        <center>
          <!--
<iframe src='abcd.html' id="editor" scrolling='yes' frameborder='0' disabled></iframe>
<iframe src='abcdout.html' id="out" scrolling='no' frameborder='0' disabled></iframe>

-->

          <!--
<div id="overlay">
</div>
-->
          <!--
<iframe src="abcd.html" id="editor" scrolling="yes" name = "editor">
</iframe>
</div>
<iframe src = "abcdout.html" id="out" name = "out"></iframe>
-->

          <div id="subml">
            <label><i>Compile With Input : </i></label>
            <input type="radio" name="inputRadio" id="inputRadio" value="true" />
            <label><i>Yes</i></label>
            <input type="radio" name="inputRadio" id="inputRadio" value="false" />
            <label><i>No</i></label>
            <br />
            <input type="submit" value="Compile!" id="submit" target="_blank" class="btn btn-primary" name="submit" />
          </div>
        </center>
    </form>

    <!--<script src="/ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
-->
    <script>
      //
      //    var editor = ace.edit("editor");
      //    editor.setTheme("ace/theme/monokai");
      //    editor.getSession().setMode("ace/mode/javascript");
      //    editor.session.setOption("useWorker", false);
      //
      //

      $(document).ready(function() {
        $("button").click(function() {
          var choice = prompt("enter any no.");
          var choi = parseInt(choice);

          switch (choi) {
            case 1:
              document.getElementById("editor").src = "abcd.html";
              document.getElementById("out").src = "abcdout.html";
              break;
          }

        });
      });

      var timer;
      var hiddenTimer;
      document.getElementById("timer").innerHTML =  1 + ":" + 00;
      document.getElementById("hiddenTimer").innerHTML = 1 + ":" + 00;
      startTimer();
      startHiddenTimer();

      function startTimer() {
        var presentTime = document.getElementById("timer").innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));

        if (s == 59) {
          m = m - 1
        }
        //if(m<0){alert('timer completed')}
        if (m < 1 && s > 30) {
          document.getElementById("timer").style.color = "#fff145";
          document.getElementById("timer").style.animation = "blinker 1s linear infinite";

        }
        if (m < 1 && s < 30) {
          document.getElementById("timer").style.color = "red";
          document.getElementById("timer").style.animation = "blinker .5s linear infinite";



        }
        if (m < 1 && s < 15) {
          document.getElementById("timer").style.color = "red";
          document.getElementById("timer").style.animation = "blinker .3s linear infinite";

        }

        if (m < 0) {
          clearTimer();
          disableScreen();

          return 0;
        }

        document.getElementById('timer').innerHTML =
          m + ":" + s;
        timer = setTimeout(startTimer, 1000);
      }


      function startHiddenTimer() {
        var presentTime = document.getElementById("hiddenTimer").innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));

        if (s == 59) {
          m = m - 1
        }
        if (m < 0) {
          clearTimer();
          disableScreen();

          return 0;
        }

        document.getElementById('hiddenTimer').innerHTML =
          m + ":" + s;
        hiddenTimer = setTimeout(startHiddenTimer, 1000);
      }



      function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {
          sec = "0" + sec
        }; // add zero in front of numbers < 10
        if (sec < 0) {
          sec = "59"

        };
        return sec;
      }

      function hideSec(sec) {
        //if (sec < 10 && sec >= 0) {sec sec}; // add zero in front of numbers < 10
        if (sec < 1) {
          sec = "59"

        };
        return sec;
      }


      function checkScore() {
        var presentTime = document.getElementById("hiddenTimer").innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = hideSec((timeArray[1] - 1));
        var base = 100;
        var x;
        if (s == 59) {
          x = (base + m * 60);
        } else {
          x = (base + m * 60) + s;
        }
        window.alert("Done! Your score is : " + x);



        clearTimer();
        disableScreen();


        return 0;
      }

      function clearTimer() {

        clearTimeout(timer);
        clearTimeout(hiddenTimer);

      }

      function compileCode(code, input) {

        var inputRadio = input.trim().length ? true : false;
        var fileName = $('#filename').val();
        // fileName = fileName+".cpp";
        $.ajax({
          url: 'http://localhost:8080/compilecode',
          //url: 'http://192.168.65.191:8080/compilecode',
          method: 'POST',
          data: {
            code: code,
            input: input,
            inputRadio: inputRadio,
            fileName: fileName //edit by pg

          },
          success: function(response) {
            console.log(response);
            $("#coutput").val(response);

          }

        });

      };

      function resetbox() {

        document.getElementById("#coutput").reset();
      }


      $('#myform').on('submit', function(e) {
        e.preventDefault();
        compileCode($('#code').val(), $('#input').val()); //there was a type here, fixed it
        return false;
      });


      function disableScreen() {
        // creates <div class="overlay"></div> and
        // adds it to the DOM
        //    var div= document.createElement("div");
        //    div.className += "overlay";
        //    document.body.appendChild(div);XZA
        document.getElementById("code").disabled = true;
 
      }
    </script>
  </body>

</html>
