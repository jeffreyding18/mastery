<?php
include "vars.php";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );

// Check connection
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

$checks=$_POST["checks"];
$texts=$_POST["texts"];
$ids = $_POST["ids"];
$counter = 0;
foreach ($checks as &$value) {

  if($value == true) {
    $active = 1;
  } else {
    $active = 0;
  }
  if($stmt = $conn->prepare("UPDATE categoryaspect SET attributeDesc = ?, active =? WHERE id = ?")) {
    $stmt->bind_param("sii", $texts[$counter], $checks[$counter], $ids[$counter]);
    $stmt->execute();
  }

  $counter++;
}


$conn->close();
?>
