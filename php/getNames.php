<?php
include "vars.php";

	// Create connection
	$conn = new mysqli( $servername, $username, $password, $dbname );

	// Check connection
	if ( $conn->connect_error ) {
		die( "Connection failed: " . $conn->connect_error );
	}

	$sql = "SELECT fname FROM Student";
	$result = $conn->query( $sql );

	$names = array();
	while ( $row = $result->fetch_assoc() ) {
		$names[] = $row[ "fname" ];
	}

	echo json_encode($names);

?>
