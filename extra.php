
<?php
session_start(); /*shows the table of all available appointments of the required category
to the patient to book appointment. */
?>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testdata";
  /*if (isset($_SESSION))
{
	echo 'Session exists<br />';
}
else
{
	echo 'NO Session exists<br />';
}*/

  $_SESSION["name"]=$_POST["pname"];
  $_SESSION["email"]=$_POST["email"];
  $_SESSION["aadhar"]=$_POST["pid"];
  $_SESSION["age"]=$_POST["age"];
  $_SESSION["bg"]=$_POST["bg"];
  $_SESSION["psp"]=$_POST["spl"];
 

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

/*if($_session name exists in booked appointments table){
  if the name of the patient is already present in the bookedAppointments table 
  then display :
  if 
  Display appointment details
  Display link to join meet
}
else{
  DO ALL THIS BELOW:
  */

  $patname = $_SESSION["name"];
  
  $sql = "SELECT * FROM bookedAppointments WHERE name = '$patname' ";
  $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
      //$sql = "SELECT * FROM bookedAppointments WHERE name = '$patname' ";
      //$result = $conn->query($sql);

      echo "<p>Your booked appointment is:</p>";

      //if ($result->num_rows > 0) {

        // html table
        echo "<table><tr><th>Doctor name</th><th>Date</th><th>Time</th></tr>";
        //if the patient name already exists in the table , then print the doctor name, date and time of appointment
        //do not proceed to confirm.php or the display of available appointments

        //output data of each row
        $row = $result->fetch_assoc();
        echo "<tr><td>".$row["doctorName"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td></tr>";
        /*while($row = $result->fetch_assoc()) {
        //echo "<br>";
          echo "<tr><td>".$row["doctorName"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td></tr>";
        }*/
        echo "</table>";
      //} 
      /*else {
        echo "No results";
      }*/

    } 
    else {
      $s = $_SESSION["psp"];
      $sql = "SELECT * FROM addAppointment WHERE spl = '$s' ";
      //selects and displays available slots of specific category only
      $result = $conn->query($sql);

      //displays in table format
      echo "<form method = 'POST' action = 'confirm.php'>";
	    echo "<table width = '50%' border = '1'>";
	    echo "<tr>";
		  echo "<td></td>";
		  echo "<td>DOCTOR NAME</td>";
		  echo "<td>DATE</td>";
		  echo "<td>TIME</td>";
	    echo "</tr>";
      while($row = $result->fetch_assoc()) {
        
		    echo "<tr>";
			  echo "<td><input type = 'radio' name = 'id' value = '".$row["id"].",".$row["name"].",".$row["date"].",".$row["Time"]."'></td>";
        echo "<tr><td>".$row["name"]."</td><td>".$row["date"]."</td><td>".$row["Time"]."</td></tr>";

		    echo "</tr>";
	    }
	    echo "<tr><td colspan = '5' align = 'center'><input type = 'submit' name = 'go' value = 'GO'></td></tr>";
	    echo "</table>";
	    echo "</form>";
    }
    $conn->close(); 
 ?>
<?/*php  $sql = "SELECT * FROM addAppointment WHERE spl = '$s' ";
  //selects and displays available slots of specific category only
  $result = $conn->query($sql);

  //displays in table format
  echo "<form method = 'POST' action = 'confirm.php'>";
	echo "<table width = '50%' border = '1'>";
	echo "<tr>";
		echo "<td></td>";
		echo "<td>DOCTOR NAME</td>";
		echo "<td>DATE</td>";
		echo "<td>TIME</td>";
	echo "</tr>";
    while($row = $result->fetch_assoc()) {
        
		echo "<tr>";
			echo "<td><input type = 'radio' name = 'id' value = '".$row["id"].",".$row["name"].",".$row["date"].",".$row["Time"]."'></td>";
            echo "<tr><td>".$row["name"]."</td><td>".$row["date"]."</td><td>".$row["Time"]."</td></tr>";

		echo "</tr>";
	}
	echo "<tr><td colspan = '5' align = 'center'><input type = 'submit' name = 'go' value = 'GO'></td></tr>";
	echo "</table>";
	echo "</form>";
  $conn->close();
?>*/