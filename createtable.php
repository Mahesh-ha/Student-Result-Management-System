<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "final";
	$conn = mysqli_connect($servername, $username, $password,$db);
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
// sql to create table
$sql = "CREATE TABLE admin_login (userid VARCHAR(30),password VARCHAR(30))";
if (mysqli_query($conn, $sql)) {
    echo "Table admin_login created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sqlC = "CREATE TABLE class (name VARCHAR(30),id INT(6))";
if (mysqli_query($conn, $sqlC)) {
    echo "Table Class created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}



$sqlS = "CREATE TABLE student (name VARCHAR(30),rno INT(3),class_name VARCHAR(30))";
if (mysqli_query($conn, $sqlS)) {
    echo "Table Class created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sqlR = "CREATE TABLE result (name VARCHAR(30),rno INT(3),class VARCHAR(30),p1 INT(3),p2 INT(3),p3 INT(3),p4 INT(3),p5 INT(3),marks VARCHAR (30), percentage VARCHAR(30))";
if (mysqli_query($conn, $sqlR)) {
    echo "Table Class created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
