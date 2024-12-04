<?php 

$host = "localhost";        
$user = "root";             
$pass = "";                
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";  

$conn = new mysqli($host, $user, $pass , 'todoapp');  
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    exit(); 
}

mysqli_query($conn, $sql); 

$create = "CREATE TABLE IF NOT EXISTS tasks(
    id INT PRIMARY KEY AUTO_INCREMENT,  
    title VARCHAR(200) NOT NULL        
)";

$don = mysqli_query($conn, $create);  



?>
