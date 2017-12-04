<?php
include "vars.php";

    // Create connection
    $conn= new mysqli($servername, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $name=$_POST['name'];

    //Get raw values of # of attributes in each category
    if (empty($name)) {
			$name="John";
    }
    for ($i = 0; $i < 8; $i++) {
        if ($stmt = $conn->prepare("SELECT catID, attriID, assessment FROM studentquality WHERE stuID = (SELECT id FROM student WHERE fname=?)")) {
            $stmt->bind_param("s", $name);

            $stmt->execute();

            $stmt->bind_result($catID, $attriID, $assessment);


                $toReturn = array();
                while ($stmt->fetch()) {
                    if ($catID == ($i+1)) {
                        $toReturn[] = $attriID;
                        $toReturn[] = $assessment;
                        $toReturn[] = "holder";
                    }
                }
                $returnArray[] = $toReturn;
                unset($toReturn);
            }
        }

                $sql = "SELECT attributeDesc from categoryaspect";
                $result = $conn->query($sql);
                $attributeDescriptionList = array();
                while ($row = $result->fetch_assoc()) {
                    $attributeDescriptionList[] = $row["attributeDesc"];
                }

                foreach ($returnArray as & $arr) {
                    for ($i = 0; $i < count($arr); $i += 3) {
                        $arr[$i + 2] = $attributeDescriptionList[$arr[$i] - 1];
                    }
                }
                unset($arr);

                echo json_encode($returnArray);

                $conn->close();
