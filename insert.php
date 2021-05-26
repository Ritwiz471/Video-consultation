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
$docname=$_POST["dname"];
$ddate=$_POST["day"];
$dtime=$_POST["dtime"];

$sql = "INSERT INTO addAppointment (id,name,date,Time)
VALUES ('$docid','$docname','$ddate','$dtime')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

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

// sql to delete a record
$todayDate = date('Y-m-d H:i:s');
$sql = "DELETE FROM addAppointment WHERE date < '$todayDate'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

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
  $sql = "SELECT date, Time FROM addAppointment WHERE id = '$docid' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // html table
    echo "<table><tr><th>Date</th><th>Time</th></tr>";

    //output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<br>";
      echo "<tr><td>".$row["date"]."</td><td>".$row["Time"]."</td></tr>";
    }
  } 
  else {
    echo "No results";
  }
  $conn->close();
?>
