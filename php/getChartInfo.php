<?php
include "vars.php";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $name=$_POST['name'];

    /*
    $sql = "SELECT fname, lname, grade, DOB, overallDesc FROM student WHERE fname=\"" + $q + "\";";
    $result = $conn->query( $sql );



    */
    /*

    $sql = "SELECT studentquality.attriID FROM studentquality WHERE stuID = (SELECT id FROM student WHERE fname=\"" . $q . "\";";
    */

    //Get raw values of # of attributes in each category
    if (empty($name)) {
        $name = "John";
    }

    if ($stmt = $conn->prepare("SELECT catID FROM studentquality WHERE stuID = (SELECT id FROM student WHERE fname=?)")) {
        $stmt->bind_param("s", $name);

        $stmt->execute();

        $stmt->bind_result($catID);

        $attribute = array();
        while ($stmt->fetch()) {
            $attribute[] = $catID;
        }

        if ($stmt = $conn->prepare("SELECT size FROM category")) {
            $stmt->execute();
            $stmt->bind_result($size);

            $attributeNums = array();
            while ($stmt->fetch()) {
                $attributeNums[] = $size;
            }
        }


        //Get counts of each category and appends to num_occur
        $num_occur = array();
        for ($c = 0; $c < count($attributeNums); $c++) {
            $current_num=0;
            foreach ($attribute as $n) {
                if ($n == ($c+1)) {
                    $current_num++;
                }
            }
            $num_occur[] = $current_num; //append to num_occur
        }

        $int_attributeNums = array_map("intval", $attributeNums);
        $num_percent = array();
        for ($b = 0; $b < count($num_occur); $b++) {
            $num_percent[] = ($num_occur[$b] / $int_attributeNums[$b]); //Find percentage out of the max number in the category
        }


        echo json_encode($num_percent);

        $conn->close();
    }
