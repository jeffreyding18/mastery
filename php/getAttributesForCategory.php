<?php
include "vars.php";
include 'ChromePhp.php';


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        ChromePhp::warn("error: " . mysqli_connect_error());
        exit();
    }

    $category=$_POST['category'];
    ChromePhp::warn("category: " . $category);

    if ($stmt = $conn->prepare("SELECT id, attributeDesc, active FROM categoryaspect WHERE categoryID=?")) {
        ChromePhp::log("starting");
        $stmt->bind_param("i", $category);

        $stmt->execute();

        $stmt->bind_result($id, $attributeDesc, $active);

        $attributes = array();
        $ids = array();
        $actives = array();
        ChromePhp::log("iterating");
        while ($stmt->fetch()) {
            $attributes[] = $attributeDesc;
            $ids[] = $id;
            $actives[] = $active;
        }


        $stmt->close();

        $returnArray = array();
        $returnArray[] = $ids;
        $returnArray[] = $attributes;
        $returnArray[] = $actives;

        echo json_encode($returnArray);
        $conn->close();
    }
