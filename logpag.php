<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login", true, 301);
}
?>