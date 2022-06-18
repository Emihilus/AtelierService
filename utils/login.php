<?php
require_once '../config/config.php';
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {

    $user = $_POST['login'];
    $pwd = _hash($_POST['password']);

    $stmt = $db->prepare("SELECT * FROM users where email = ? and password = ?");
    $stmt->bind_param('ss', $user, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row['id'];
        }
        echo json_encode([
            'status' => 1
        ]);

    } else {
        echo json_encode([
            'status' => 0
        ]);
    }
    $db->close();
} else {
    echo json_encode([
        'status' => -1
    ]);
}