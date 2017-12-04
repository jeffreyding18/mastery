<?php
include "vars.php";

	// Create connection
	$conn = new mysqli( $servername, $username, $password, $dbname );

	// Check connection
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

	if($stmt = $conn->prepare("SELECT category from category")) {

		$stmt->execute();

		$stmt->bind_result($category);

		$attributeDescriptionList = array();
		while ( $stmt->fetch() ) {
			$attributeDescriptionList[] = $category;
		}
		echo json_encode($attributeDescriptionList);

	}

?>
