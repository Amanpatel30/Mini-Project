<?php
$conn = mysqli_connect("localhost","root","","studentdb");
if (!$conn) 
{
	die("Connection Unsuccessfull" . mysqli_connect_error());
}
$query="ALTER TABLE Stud DROP SID";
$query1="ALTER TABLE Stud ADD  SID INT(11) NOT NULL AUTO_INCREMENT FIRST ,ADD PRIMARY KEY (SID)";
$run=mysqli_query($conn, $query);
$run1=mysqli_query($conn, $query1);
?>
