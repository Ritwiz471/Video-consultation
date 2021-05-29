<?php
session_start();// confirms the appointment for the patient and displays doctor details 
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
  echo '<link rel = "stylesheet" href = "confirm.css" >';
  echo "<body><div>";
  //echo '<h1>Your appointment details are:</h1>';
  echo '<p style="text-align:center; font-weight:bold"> Your appointment details </p>';

  $option = explode(",", $_POST['id']);
  //saving all info about doctor in variables
  $doctid = $option[0];
  $doctname = $option[1];
  $doctdate=$option[2];
  $doctTime=$option[3];

  // printing all the doctor information
  echo '<p>Doctor id:'.$doctid.'<br>';
  echo 'Doctor name:'.$doctname.'<br>';
  echo 'Date:'.$doctdate.'<br>';
  echo 'Time:'.$doctTime.'<br>';
  echo 'Specialisation:'.$_SESSION["psp"].'<br></p>';
  echo "</div></body>";

  //saving patient info in variables
  $na=$_SESSION["name"];
  $em=$_SESSION["email"];
  $ad=$_SESSION["aadhar"];
  $ag=$_SESSION["age"];
  $blg=$_SESSION["bg"];
  $spls=$_SESSION["psp"];


 $sql = "INSERT INTO bookedAppointments (name,email,aadhar,age,bloodGroup,doctorName,spl,date,time)
  VALUES ('$na','$em','$ad','$ag','$blg','$doctname','$spls','$doctdate','$doctTime')";
  
  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql = "DELETE FROM addAppointment WHERE date = '$doctdate' AND name='$doctname' AND Time='$doctTime' ";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();     
  ?>