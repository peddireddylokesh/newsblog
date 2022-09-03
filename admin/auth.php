<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['account_type']) && $_SESSION['account_type'] != 'ADMIN'){
    header("Location: index.php");
}