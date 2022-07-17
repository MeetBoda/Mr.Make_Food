<?php
session_start();
include 'configure.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username'])) {
        $user = $_POST['username'];
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }


    // require_once('connection.php');
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$password' ";
    $result = mysqli_query($link, $sql);
    $check = mysqli_fetch_array($result);
    if (isset($check)) {
        header("Location: index.php");
        $_SESSION['username'] = $_POST['username'];
    } else {
        echo 'Failed to login';
    }
}
