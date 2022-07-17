<?php
session_start();
unset($_SESSION["finalbill"]);
unset($_SESSION["username"]);
require_once "configure.php";
$sql = "SELECT * FROM `addtocart`";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    $sql = "DELETE FROM `addtocart`";   
    $result = mysqli_query($link, $sql);
}
mysqli_close($link);
session_unset();
session_destroy();
header("Location: index.php");
?>