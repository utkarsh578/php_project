<?php

class Listen extends Thread
{
	private $spawn1;
 
    public function __construct($spawn)
    {
      $spawn1 = $spawn;
    }
 
    public function run()
    {
        while (true) {
        	$input=socket_read($spawn1, 1024);
        	$input = trim($input);
        	echo "clien mssg : ".$input;
        	echo "\n";
        }
    }
}




$host = "127.0.0.1";
$port = 25004;
// don't timeout!
set_time_limit(0);
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// bind socket to port
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
echo "listening to the client....";
// start listening for connections
$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

// accept incoming connections
// spawn another socket to handle communication
$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
echo "connected";
// read client input
$listen_thread = new Listen($spawn);
$listen_thread->start;
// reverse client input and send back
//$output = strrev($input) . "\n";
$data="i m faad";
socket_write($spawn, $data, strlen ($data)) or die("Could not write output\n");
// close sockets
socket_close($spawn);
socket_close($socket);

?>