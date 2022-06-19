<?php

require_once '../config/config.php';
session_start();

if (isset($_POST['email']) and $_POST['email'] != ""
    and isset($_POST['password']) and $_POST['password'] != ""
    and isset($_POST['firstname']) and $_POST['firstname'] != ""
    and isset($_POST['surname']) and $_POST['surname'] != ""
    and isset($_POST['phone']) and $_POST['phone'] != "") {

    $pwd = _hash($_POST['password']);

    $stmt = $db->prepare("INSERT INTO users (email, password, firstname, surname, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssi', $_POST['email'], $pwd, $_POST['firstname'], $_POST['surname'], $_POST['phone']);

    try {
        if ($stmt->execute() and mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['user_id'] = mysqli_stmt_insert_id($stmt);
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
