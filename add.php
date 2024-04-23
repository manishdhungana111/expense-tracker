<?php
require "./connect.php";
$data1 = $_POST['title'];
$data2 = $_POST['amount'];
$data3 = $_POST['description'];
//$data4 = date('Y-m-d', strtotime($_POST['expenses_date']));
$data4 = $_POST['expenses_date'];

$sql="Insert into expenses (title,amount,description,expenses_date) values ('$data1','$data2','$data3', '$data4')";
mysqli_query($conn,$sql);
header("Location: index.php");
?>