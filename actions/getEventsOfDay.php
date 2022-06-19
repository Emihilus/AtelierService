<?php

require_once '../config/config.php';
require_once '../config/auth.php';
//echo json_encode($_POST);

if (isset($_POST['date'])) {

    $stmt = $db->prepare("SELECT e.slot FROM events e where date_id = ? and e.status > -1");
    $stmt->bind_param('s', $_POST['date']);
    $stmt->execute();
    $result = $stmt->get_result();

//    echo ($result->num_rows);
    $resultArray = [];

    while ($row = $result->fetch_assoc()) {
        $resultArray[] = $row;
    }

    echo json_encode($resultArray);
} else {
    echo json_encode([
        'status' => -1
    ]);
}