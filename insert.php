<?php
include("./connect.php");
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sql = "INSERT into details VALUES('".$name."','".$phone."','".$email."')";
if ($conn->query($sql) === TRUE)
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('The record has been inserted successfully');
    window.location='./index.php';
    </script>");
?>