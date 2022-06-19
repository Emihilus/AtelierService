<?php
session_start();
if (!isset ($_SESSION['user_id'])) {
//    $_SESSION['user_id'] = 7;
   echo json_encode([
       'status' => -2
   ]);
   die();
}