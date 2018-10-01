<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE ".$dbname;
if ($conn->query($sql) === TRUE)
{
    echo "Database created successfully";
}
else
{
  echo ("<script LANGUAGE='JavaScript'>
      window.alert('Error creating database');
      </script>");
  echo "Error creating database: " . $conn->error;
}
$conn->close();
//Create tables
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
  echo ("<script LANGUAGE='JavaScript'>
      window.alert('Conn failed');
      </script>");
    die("Connection failed: " . $conn->connect_error);
}
else {
  $sql = "CREATE TABLE details(
    name VARCHAR(50),
    phone VARCHAR(15),
    email VARCHAR(50)
  )";
  if ($conn->query($sql) === TRUE)
  {
    echo "Table created successfully";
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Database and table has been created successfully');
        window.location='./index.php';
        </script>");
  }
  else
  {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Error creating table');
        </script>");
      echo "Error creating database: " . $conn->error;
  }
  $conn->close();
}
?>