<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
const DB_SERVER = 'localhost';
const DB_USERNAME = 'atelier';
const DB_PASSWORD = ']Zq!dNil)iZPjj2o';
const DB_NAME = 'atelier';
const PWD_SALT = 'Nil)23$$il)iZPj';
const DB_ADMIN = 7;

/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function _hash($pwd) {
    return crypt($pwd, PWD_SALT);
}
