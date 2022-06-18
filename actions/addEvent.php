<?php

require_once '../config/config.php';
require_once '../config/auth.php';

if (isset($_POST['timestart']) and isset($_POST['timeend']) and isset($_POST['service'])) {

    $stmt = $db->prepare("INSERT INTO events (user, service, timestart, timeend, notice) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('iissi', $_SESSION['user_id'], $_POST['service'], $_POST['timestart'], $_POST['timeend'], $_POST['notice']);

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
