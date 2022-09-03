<?php
include 'config.php';
include 'header.php';
$edit = false;
$edit_comment = null;

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    if (isset($_GET['status']) && $_GET['status'] != '') {
        $status = $_GET['status'];
        $update_sql = "UPDATE `comment` SET `status`='$status' WHERE `id` = $id";
        $res = mysqli_query($conn, $update_sql) or die(mysqli_error());
        if ($res) {
            header('location: comment_list.php');
        } else {
            $msg = 'unable to update data';
        }
    }

    if (isset($_GET['type']) && $_GET['type'] != '' && $_GET['type'] == 1) {

        $sql = "DELETE FROM `comment` WHERE `id` = $id ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        if ($result) {
            $msg = 'deleted record';
            header('location: comment_list.php');
        } else {
            $msg = 'unable to delete data';
        }
    }
}
