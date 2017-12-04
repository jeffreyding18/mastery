<?php

include "vars.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sizes = array();
if ($stmt = $conn->prepare("select size from category")) {
    $stmt->execute();

    $stmt->bind_result($size);

    while ($stmt->fetch()) {
        $sizes[] = $size;
    }
}


$nameId = $_POST["name"];
$checks=$_POST["checkedArray"];
$text = $_POST["text"];

if (strlen($text) > 0 && strpos($text, "Please enter student commentary here") == false) {
    if ($stmt = $conn->prepare("UPDATE student SET overallDesc = ? WHERE id=?")) {
        $stmt->bind_param("si", $text, $nameId);
        $stmt->execute();
    }
}

if (sizeof($checks) > 0) {
    if ($stmt = $conn->prepare("DELETE FROM studentquality WHERE stuID = ?")) {
        $stmt->bind_param("i", $nameId);
        $stmt->execute();
    }
}
$index = 0;
$inc = 0;
$prev = 0;
foreach ($checks as &$value) {
    if ($value > ($sizes[$inc] + $prev)) {
        $prev += $sizes[$inc];
        $inc++;
    }
    if ($stmt = $conn->prepare("INSERT INTO studentquality (stuID, attriID, assessment, catID) VALUES (?, ?, null, ?)")) {
        $inctemp = $inc+1;
        $stmt->bind_param("iii", $nameId, $value, $inctemp);
        $stmt->execute();
    }
}



$conn->close();
