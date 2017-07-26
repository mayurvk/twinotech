<?php
   //$directory = "/var/www/html/TwinoTech/";
   //$directory = "./TwinoTech/";
   $username = $_POST['username'];
   $content = $_POST['code'];
   $extension = ".c"; 
   $filename = $username.$extension;
/*   if (file_put_contents($filename, $content) !== false) {
        echo "File created (" . basename($newFileName) . ")";
   } else {
        echo "Cannot create file (" . basename($filename) . ")";
   }*/
   $file = fopen( $filename, "w" );
   if( $file == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   fwrite( $file, $content );
   fclose( $file );
   //header("location: compileAndRun.php");
   $command = "gcc ".$filename." -o ".$username;
    $descriptors = array(
        0 => array(
            'pipe',
            'r'
        ) , // STDIN
        1 => array(
            'pipe',
            'w'
        ) , // STDOUT
        2 => array(
            'pipe',
            'w'
        ) // STDERR
    );
    $process = proc_open($command . ' 2>&1', $descriptors, $pipes);
    fclose($pipes[0]);
    $output = stream_get_contents($pipes[1]);
    if($output){
        echo "<p>output</p><br>";
        echo $output;
    }
	fclose($pipes[1]);
        $error = stream_get_contents($pipes[2]);
    if($error){
	echo "<p>error</p><br>";
        echo $error;
    }
    fclose($pipes[2]);
    echo "<p>Executing now</p><br>";
    $cmd = "stdbuf -o0 ./".$username." 2>&1";
    echo "<p>".$cmd."</p><br>";
    // what pipes should be used for STDIN, STDOUT and STDERR of the child
    $descriptorspec = array (
        0 => array("pipe", "r"),
        1 => array("pipe", "w"),
        2 => array("pipe", "w")
    );

    // open the child
    $proc = proc_open ($cmd, $descriptorspec, $pipes, getcwd());
    //echo "<p>here1</p><br>";
    // set all streams to non blockin mode
    stream_set_blocking($pipes[1], 0);
    stream_set_blocking($pipes[2], 0);
    stream_set_blocking(STDIN, 0);

    // check if opening has succeed
    if($proc === FALSE){
        throw new Exception('Cannot execute child process');
    }
    echo "<p>here2</p><br>";

    // get PID via get_status call
    $status = proc_get_status($proc);
    if($status === FALSE) {
        throw new Exception (sprintf('Failed to obtain status information '));
    }
    $pid = $status['pid'];
    echo "<br>pid".$pid."</p><br>";
    // now, poll for childs termination
    while(true) {
        echo "<p>inside loop</p><br>";
        // detect if the child has terminated - the php way
        $status = proc_get_status($proc);
        // check retval
        if($status === FALSE) {
            throw new Exception ("Failed to obtain status information for $pid");
        }
        if($status['running'] === FALSE) {
            $exitcode = $status['exitcode'];
            $pid = -1;
            echo "child exited with code: $exitcode\n";
            exit($exitcode);
        }

        // read from childs stdout and stderr
        // avoid *forever* blocking through using a time out (50000usec)
        echo "<p>here5</p><br>";
        foreach(array(1, 2) as $desc) {
            // check stdout for data
            echo "<p>foreach</p><br>";
            $read = array($pipes[$desc]);
            $write = NULL;
            $except = NULL;
            $tv = 0;
            $utv = 50000;

            $n = stream_select($read, $write, $except, $tv, $utv);
            if($n > 0) {
                do {
                    $data = fread($pipes[$desc], 8092);
                    //fwrite(STDOUT, $data);
                    echo $data;
                } while (strlen($data) > 0);
            }
        }


        $read = array(STDIN);
        $n = stream_select($read, $write, $except, $tv, $utv);
        if($n > 0) {
            $input = fread(STDIN, 8092);
            // inpput to program
            echo "<script type=\"text/javascript\">
                    function getValue(){
                    var retVal = prompt(\"Enter your name : \", \"your name here\");
                    document.write(\"You have entered : \" + retVal);
                }
                </script>";
            ///fwrite($pipes[0], $input);
        }
    }
?>