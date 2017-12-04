<?php
include "vars.php";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if ($stmt = $conn->prepare("SELECT fname, lname, grade, DOB, overallDesc FROM student WHERE id=1")) {
        $stmt->execute();

        $stmt->bind_result($fname, $lname, $grade, $DOB, $overallDesc);

        $basic_info = array();

        while ($stmt->fetch()) {
            $basic_info[] = $fname;
            $basic_info[] = $lname;
            $basic_info[] = $grade;
            $basic_info[] = $DOB;
            $basic_info[] = $overallDesc;
        }
        echo json_encode($basic_info);
    }
