<?php

require_once '../config/config.php';
require_once '../config/auth.php';

$resultArray = [];

$result = $db->query("SELECT e.* FROM events e left join users u on u.id = e.user left join services s on s.id = e.service where e.status > -1");
while($row = $result->fetch_assoc()) {
    $resultArray[] = $row;
}
echo json_encode($resultArray);