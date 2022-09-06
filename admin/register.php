<?php
include 'config.php';


$msg = $user_msg = $email_msg = $psw_msg = $edit_row = "";
$edit = false;
$sql_true = false;

$edit_user_name =$edit_email = "";

function input_validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $edit = true;
    $id = $_GET['id'];
}

if (!$edit) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['name'])) {
            $user_msg = "Please enter User Name";
        } else {
            $sql_true = true;
            $user_name = input_validation($_POST['name']);
        }
        if (empty($_POST['email'])) {
            $email_msg = "Please enter Email";
        } else {
            $sql_true = true;
            $email = input_validation($_POST['email']);
        }
        if (empty($_POST['psw'])) {
            $psw_msg = "Please enter Password";
        } else {
            $sql_true = true;
            $password = md5(input_validation($_POST['psw']));
        }
        if ($sql_true && $user_msg == null && $email_msg == null && $psw_msg == null) {
            $sql = "INSERT INTO `user` (`user_name`, `email`, `password`, `account_type`, `created_at`) VALUES ('$user_name', '$email', '$password', 'SUB_ADMIN', now())";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if ($result) {
                header('location: sub-admin.php');
            } else {
                $msg = 'unable to insert data';
            }
        }


    }
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $update_user_name = $_POST['name'];
        $update_email = $_POST['email'];
        if (!empty($_POST['psw'])) {
            $sql_true = true;
            $update_password = md5($_POST['psw']);
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
}

?>
<?php
include 'form_validation.php';
include 'header.php';


if ($edit) {
    $get_sql = "SELECT * FROM `user` WHERE `id` = $id";
    $res = mysqli_query($conn, $get_sql) or die(mysqli_error());
    if (mysqli_num_rows($res) > 0) {
        $edit_row = mysqli_fetch_assoc($res);
        $edit_user_name = $edit_row['user_name'];
        $edit_email = $edit_row['email'];
    }
}
?>


    <form method="post" action="" style="border:1px solid #ccc">
        <div class="container">
            <h1>ADD SUB-ADMIN</h1>
            <div class="col-md-4 col-md-offset-4">
                <br>
                <span class="text-danger"><?php echo $msg; ?></span>
                <label for="name"><b>Name</b></label>


                <input type="text" id="sign_in" placeholder="EnterName here" name="name"
                       value="<?php echo $edit_user_name ? $edit_user_name : '' ?>">
                <span class="text-danger"><?php echo $user_msg; ?></span>
                <br>

                <label for="email"><b>Email</b></label>
                <input type="email" id="email" placeholder="Enter Email" name="email"
                       value="<?php echo $edit_email ? $edit_email : '' ?>">
                <span class="text-danger"><?php echo $email_msg; ?></span>
                <br>
                <label for="psw"><b>Password</b></label>
                <input type="password" id="password" placeholder="Enter Password" name="psw">
                <span class="text-danger"><?php echo $psw_msg; ?></span>
                <div class="clearfix">
                    <button type="button" class="cancelbtn" onclick="">Cancel</button>
                    <?php
                    if ($edit) {
                        ?>
                        <button type="submit" class="signupbtn" name="update">UPDATE</button>
                        <?php
                    } else {
                        ?>
                        <button type="submit" class="signupbtn" name="submit">ADD</button>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>

    </form>


<?php
include 'footer.php';