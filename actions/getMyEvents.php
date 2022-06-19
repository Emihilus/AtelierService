<?php

require_once '../config/config.php';
require_once '../config/auth.php';

$resultArray = [];

$append = $_SESSION['user_id'] == DB_ADMIN ? "" : " where u.id = ".$_SESSION['user_id'];
$result = $db->query("SELECT e.*, s.name, s.cost, u.phone, u.firstname, u.surname, u.email FROM events e left join users u on e.user = u.id left join services s on s.id = e.service" . $append);
while ($row = $result->fetch_assoc()) {
    $resultArray[] = $row;
}
echo json_encode($resultArray);