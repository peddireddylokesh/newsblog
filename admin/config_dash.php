<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';

$sub_admin_count = 0;
$subscribers_cnt = 0;
$approved_comment_cnt = 0;
$rejected_comment_cnt = 0;
$categories_list = null;


// sql query prepare
$sub_admin_count_sql = "SELECT COUNT(*) AS sub_admin_count FROM user WHERE account_type = 'SUB_ADMIN'";
$subscribers_cnt_sql = "SELECT COUNT(*) AS subscribers_cnt FROM subscribe_list ";
$approved_comment_sql = "SELECT COUNT(*) AS cnt FROM comment WHERE `status` = 'APPROVED'";
$rejected_comment_sql = "SELECT COUNT(*) AS cnt FROM comment WHERE `status` = 'REJECTED'";
$categories_sql = "SELECT * FROM categories ";
$sub_categories_sql = "SELECT * FROM Sub_categories ";


// query execute
$sub_admin = mysqli_query($conn, $sub_admin_count_sql);
$sub_admin_count = mysqli_fetch_assoc($sub_admin);

$subscribers = mysqli_query($conn, $subscribers_cnt_sql);
$subscribers_cnt = mysqli_fetch_assoc($subscribers);

$approved_comment = mysqli_query($conn, $approved_comment_sql);
$approved_comment_cnt = mysqli_fetch_assoc($approved_comment);

$rejected_comment = mysqli_query($conn, $rejected_comment_sql);
$rejected_comment_cnt = mysqli_fetch_assoc($rejected_comment);

$categories = mysqli_query($conn, $categories_sql);

$sub_categories = mysqli_query($conn, $sub_categories_sql);


