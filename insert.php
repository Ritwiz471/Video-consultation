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
//echo $docid;

$docname=$_POST["dname"];
//echo $docname;

$ddate=$_POST["day"];
//echo $ddate;

$dtime=$_POST["dtime"];
//echo $dtime;


$sql = "INSERT INTO addAppointment (id,name,date,Time)
VALUES ($docid,'$docname','$ddate','$dtime')";

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
