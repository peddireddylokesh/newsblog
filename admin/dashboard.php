<?php
ob_start();
session_start();
include 'config.php';
include 'config_dash.php';
include 'header.php';
include 'auth.php';
$user_name = $_SESSION['user_name'];
?>
    <html lang="en">
    <head>
        <title>Dashboard</title>
    </head>
    <style>

        .card {
            border-radius: 2.5rem;
            text-align: center;
        }
    </style>
<body>

<div class="container">
    <div class="row">
        <h1>Dashboard Details</h1>
        <div class="card">
            <div class="container">
                <h4><b>Categories</b></h4>
                <?php
                while ($row = mysqli_fetch_array($categories)) {
                    ?>
                    <p><?= $row['name'] ?></p>
                    <?php
                }

                ?>


            </div>
        </div>
        <br><br><br>
        <div class="card">
            <div class="container">
                <h4><b>Sub-Categories</b></h4>
                <?php
                while ($row = mysqli_fetch_array($sub_categories)) {
                    ?>
                    <p><?= $row['name'] ?></p>
                    <?php
                }

                ?>


            </div>
        </div>
        <br><br><br>


        <div class="card">
            <div class="container">
                <h4><b>Register subdomains</b></h4>
                <p><?= $sub_admin_count['sub_admin_count'] ?></p>
            </div>
        </div>
        <br><br><br>


        <div class="card">
            <div class="container">
                <h4><b>Approved comments</b></h4>
                <p><?= $approved_comment_cnt['cnt'] ?></p>
            </div>
        </div>
        <br><br><br>


        <div class="card">
            <div class="container">
                <h4><b>un-approved comments</b></h4>
                <p><?= $rejected_comment_cnt['cnt'] ?></p>
            </div>
        </div>
        <br><br><br>


        <div class="card">
            <div class="container">
                <h4><b>Subscribers</b></h4>
                <p><?= $subscribers_cnt['subscribers_cnt'] ?></p>
            </div>
        </div>
        <br><br><br>


    </div>
</div>

<?php
include 'footer.php';