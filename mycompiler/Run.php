<?php
   $filename = $_POST['filename'];
   $username = $_POST['username'];
   $command = "gcc ".$filename." -a ".$username;
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
    echo $output;
	fclose($pipes[1]);
	$error = stream_get_contents($pipes[2]);
    echo $error;
	fclose($pipes[2]);

?>