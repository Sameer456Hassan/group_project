<?php

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "sameer_project";


// $sname = "localhost";
// $unmae = "thewpked_thewpked";
// $password = "sF84zBrbB1NY";

// $db_name = "thewpked_jjhcoetzee15";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}
