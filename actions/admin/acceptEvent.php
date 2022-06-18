<?php

require_once '../../config/config.php';
require_once '../../config/auth.php';

if ($_SESSION['user_id'] != DB_ADMIN) {
    die();
}

if (isset($_POST['event'])) {

    $stmt = $db->prepare("UPDATE events SET status = 1 where id = ?");
    $stmt->bind_param('i', $_POST['event']);

    try {
        if ($stmt->execute() and mysqli_stmt_affected_rows($stmt) > 0) {
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
