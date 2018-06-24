<?php
// $servername = "db";
// $servername = "10.10.10.28";
//   $servername = "d6fb19ade0ac"

 $servername = "172.17.0.2";
// $servername = "localhost";
$username = "john";
$password = "password";
$port = "3306";

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=mydatabase", $username, $password);
	 // $conn = new PDO("mysql:host=$servername:3306; dbname=mydatabase", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	// var_dump($conn);
    }
?>