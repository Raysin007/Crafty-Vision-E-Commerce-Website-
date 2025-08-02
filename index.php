<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: CraftyVision.html");
    exit();
} else {
    header("Location: login.html");
    exit();
}
?>
