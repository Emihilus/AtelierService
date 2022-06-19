<?php

require_once '../config/config.php';
require_once '../config/auth.php';

if (isset($_POST['date_id']) and isset($_POST['slot'])) {

    $stmt = $db->prepare("INSERT INTO events (user, service, date_id, slot, notice) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('iisii', $_SESSION['user_id'], $_POST['service'], $_POST['date_id'], $_POST['slot'], $_POST['notice']);

    try {
        if ($stmt->execute()) {
            echo json_encode([
                'status' => 1
            ]);
        } else {
            echo json_encode([
                'status' => 0
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'status' => 0
        ]);
    }

} else {
    echo json_encode([
        'status' => -1
    ]);
}
