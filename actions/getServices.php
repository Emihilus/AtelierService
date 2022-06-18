<?php

require_once '../config/config.php';
require_once '../config/auth.php';

$resultArray = [];

$result = $db->query("SELECT * FROM services");
while($row = $result->fetch_assoc()) {
    $resultArray[] = $row;
}
echo json_encode($resultArray);