<?php

$servername = "mysql-server:3306";
$username = "poc_user";
$password = "123-PoC*456+";
$dbname = "poc";
	
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "CREATE TABLE IF NOT EXISTS poc (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(20), created_at TIMESTAMP)";
$conn->query($query);

$query = "INSERT INTO poc (name, created_at) values ('TEST 123', NOW())";
$conn->query($query);

$query = "SELECT id,name,created_at FROM poc order by id desc";
$stmt = $conn->query($query);

foreach ($stmt as $row) {
	echo $row['id'] . "<br>";
	echo $row['name'] . "<br>";
	echo $row['created_at'] . "<br>";
}