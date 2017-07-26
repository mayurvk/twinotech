<html>
    	  <style>
      body{
        background-color: #282f2f;
    }
          #b1{
              margin-top: 5px;
              margin-left: 23px;
              width: 130px;
		height: 30px;
		background-color:#282f2f;
		color:#2e6da4;
        border-radius: 25px;
          }
	</style>

    <body> 

        <a href="regs.php" target="main"><input type="button" id="b1" name="Registration" value="Registration"></a>
        <br><br>
        <a href="quali.php" target="main"><input type="button" id="b1" name="Qualification" value="Qualification Details"></a>
        <br><br>
        <a href="edit.php" target="main"><input type="button" id="b1" name="Edit" value="Edit"></a>
        <a href="edit.php" target="main"><input type="button" id="b1" name="Edit" value=""></a>
        <input type="button" id="b1" onclick="<?php header("location: login.html")?>" name="Logout" value="Logout">
	</body>
</html>