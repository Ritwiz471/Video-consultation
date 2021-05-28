
<?php
session_start(); /*shows the table of all available appointments of the required category
to the patient to book appointment. */
?>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testdata";
  if (isset($_SESSION))
{
	echo 'Session exists<br />';
}
else
{
	echo 'NO Session exists<br />';
}

  $_SESSION["name"]=$_POST["pname"];
  $_SESSION["email"]=$_POST["email"];
  $_SESSION["aadhar"]=$_POST["pid"];
  $_SESSION["age"]=$_POST["age"];
  $_SESSION["bg"]=$_POST["bg"];
  $_SESSION["psp"]=$_POST["spl"];
  $s = $_SESSION["psp"];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
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
  $conn->close();
?>