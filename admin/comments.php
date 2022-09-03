<?php
session_start();
include 'config.php';
include 'header.php';

$user_name = $_SESSION['user_name'];
$edit = false;
$edit_comment=null;
if (isset($_GET['id']) && $_GET['id'] != '') {
    $edit = true;
    $id = $_GET['id'];
}

if ($edit) {
    if (isset($_POST['edit'])) {

        if (isset($_POST['comment']) && $_POST['comment'] != '') {
            $sql_true = true;
            $update_comment = $_POST['comment'];
        } else {
            $psw_msg = "Please enter Password";
        }
        if ($sql_true && $user_msg == null && $email_msg == null && $psw_msg == null) {
            $update_sql = "UPDATE `user` SET `user_name`='$update_user_name',`email`='$update_email',`password`='$update_password' WHERE `id` = $id";
            $res = mysqli_query($conn, $update_sql) or die(mysqli_error());
            if ($res) {
                header('location: sub-admin.php');
            } else {
                $msg = 'unable to insert data';
            }
        }
    }
    $get_sql = "SELECT * FROM `comment` WHERE `id` = $id";
    $result = mysqli_query($conn, $get_sql) or die(mysqli_error());
    if (mysqli_num_rows($result) > 0) {
        $edit_row = mysqli_fetch_assoc($result);
        $edit_comment = $edit_row['comment'];
    }
}

?>
    <html lang="en">
    <head>
        <title>Articles</title>
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" style="border:1px solid #ccc">
                    <div class="container">
                        <div class="col-md-4 col-md-offset-4">
                            <br><br>
                            <h1>Edit Comments here</h1>
                            <hr>
                            <label><b>Comments</b></label>
                            <input type="text" placeholder="Enter comments here" name="comment"
                                   value="<?php echo $edit_comment ? $edit_comment : '' ?>">

                            <div class="clearfix">
                                <button type="button" class="cancelbtn">Cancel</button>
                                <button type="submit" name="edit" class="signupbtn">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php
include 'footer.php';