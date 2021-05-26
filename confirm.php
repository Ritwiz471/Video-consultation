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
  $option_value = $option[0];
  $option_type = $option[1];
  $third=$option[2];
  $fourth=$option[3];

  echo 'Doctor id:'.$option_value.'<br>';
  echo 'Doctor name:'.$option_type.'<br>';
  echo 'Date:'.$third.'<br>';
  echo 'Time:'.$fourth.'<br>';

  ?>