<?php
include "vars.php";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
for ($i = 0; $i < 8; $i++) {
    if ($stmt = $conn->prepare("select categoryID, attributeDesc FROM categoryaspect")) {
        $stmt->execute();

        $stmt->bind_result($categoryID, $attributeDesc);

        while ($stmt->fetch()) {
            if ($categoryID == ($i+1)) {
                $toReturn[] = $attributeDesc;
            }
        }
        $returnArray[] = $toReturn;
        unset($toReturn);


        $sql = "SELECT category from category";
        $result = $conn->query($sql);
        $attributeDescriptionList = array();
        while ($row = $result->fetch_assoc()) {
            $attributeDescriptionList[] = $row["category"];
        }
    }
    unset($arr);
}
    echo json_encode($returnArray);

?>
