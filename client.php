<?php
$host    = "127.0.0.1";
$port    = 25004;
$message = "Hello Server";
echo "Message To server :".$message;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
echo "trying to connect to localhost...request sent";
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
// send string to server
if($result > 0)
{
	echo "connected to $host";
}
socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
// get server response
$result = socket_read ($socket, 1024) or die("Could not read server response\n");
//$result=strrev($result);
echo "Reply From Server  :".$result;
echo "\n";
// close socket
socket_close($socket);

?>