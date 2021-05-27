<?php
session_start();
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

  
  echo '<h1>Your appointment details are:</h1>';

  $option = explode(",", $_POST['id']);
  $doctid = $option[0];
  $doctname = $option[1];
  $doctdate=$option[2];
  $doctTime=$option[3];

  echo 'Doctor id:'.$doctid.'<br>';
  echo 'Doctor name:'.$doctname.'<br>';
  echo 'Date:'.$doctdate.'<br>';
  echo 'Time:'.$doctTime.'<br>';

  $na=$_SESSION["name"];
  $em=$_SESSION["email"];
  $ad=$_SESSION["aadhar"];
  $ag=$_SESSION["age"];
  $blg=$_SESSION["bg"];


 $sql = "INSERT INTO bookedAppointments (name,email,aadhar,age,bloodGroup,doctorName,date,time)
  VALUES ('$na','$em','$ad','$ag','$blg','$doctname','$doctdate','$doctTime')";
  
  if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql = "DELETE FROM addAppointment WHERE date = '$doctdate' AND name='$doctname' AND Time='$doctTime'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

  ?>