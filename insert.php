<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$docid=$_POST["did"];
echo $docid;

$docname=$_POST["dname"];
echo $docname;

$ddate=$_POST["day"];
echo $ddate;

$dtime=$_POST["dtime"];
echo $dtime;


$sql = "INSERT INTO addAppointment (id,name,date,Time)
VALUES ($docid,'$docname','$ddate','$dtime')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>