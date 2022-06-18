<?php

require_once '../config/config.php';
require_once '../config/auth.php';

$resultArray = [];

$result = $db->query("SELECT e.* FROM events e left join users u on e.user = u.id where u.id = " . $_SESSION['user_id']);
while ($row = $result->fetch_assoc()) {
    $resultArray[] = $row;
}
echo json_encode($resultArray);