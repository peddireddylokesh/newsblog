<?php
session_start();
include 'config.php';
include 'header.php';

$msg = "";
$user_msg = null;
$email_msg = null;
$psw_msg = null;
$edit_row = '';
$edit = false;
$sql_true = false;
$edit_title = null;
$edit_desc = null;
$edit_type = null;
$edit_path = null;


if (isset($_GET['id']) && $_GET['id'] != '') {
    $edit = true;
    $id = $_GET['id'];
}

if ($edit) {
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $sub_type = $_POST['sub_type'];

        if (isset($_POST['imgFile'])) {
            $rand_name = rand(1000, 100000);
            $file = $rand_name . "-" . $_FILES['imgFile']['name'];
            $file_loc = $_FILES['imgFile']['tmp_name'];
            $file_size = $_FILES['imgFile']['size'];
            $file_type = $_FILES['imgFile']['type'];
            $folder = "../upload/";

            move_uploaded_file($file_loc, $folder . $file);
        } else {
            $file = $_POST['path'];
        }
        $update_sql = "UPDATE `article` SET `title`='$title',`description`='$description',`img_path`='$file',`type`='$type',`sub_type`='$sub_type' WHERE `id` = $id";
        $res = mysqli_query($conn, $update_sql) or die(mysqli_error());
        if ($res) {
            header('location: article.php');
        } else {
            $msg = 'unable to insert data';
        }
    }


} else {
    if (isset($_POST['create_article'])) {
        if (isset($_POST['title']) && $_POST['title'] != '') {
            $sql_true = true;
            $title = $_POST['title'];
        } else {
            $user_msg = "Please enter title";
        }
        if (isset($_POST['description']) && $_POST['description'] != '') {
            $sql_true = true;
            $description = $_POST['description'];
        } else {
            $email_msg = "Please enter description";
        }
        if (isset($_POST['type']) && $_POST['type'] != '') {
            $sql_true = true;
            $type = $_POST['type'];
        }
        if (isset($_POST['sub_type']) && $_POST['sub_type'] != '') {
            $sql_true = true;
            $sub_type = $_POST['sub_type'];
        }

        $rand_name = rand(1000, 100000);
        $file = $rand_name . "-" . $_FILES['imgFile']['name'];
        $file_loc = $_FILES['imgFile']['tmp_name'];
        $file_size = $_FILES['imgFile']['size'];
        $file_type = $_FILES['imgFile']['type'];
        $folder = "../upload/";

        move_uploaded_file($file_loc, $folder . $file);

        $sql = "INSERT INTO `article`(`title`, `description`, `img_path`, `type`,`sub_type`) VALUES ('$title', '$description', '$file', $type,$sub_type)";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        if ($result) {
            header('location: article.php');
        } else {
            $msg = 'unable to insert data';
        }


    }
}

if ($edit) {
    $get_sql = "SELECT * FROM `article` WHERE `id` = $id";
    $res = mysqli_query($conn, $get_sql) or die(mysqli_error());
    if (mysqli_num_rows($res) > 0) {
        $edit_row = mysqli_fetch_assoc($res);
        $edit_title = $edit_row['title'];
        $edit_desc = $edit_row['description'];
        $edit_type = $edit_row['type'];
        $edit_path = $edit_row['img_path'];
    }
}

?>
    <html lang="en">
    <head>
        <title>Articles</title>

    </head>
<body>
<form method="post" action="" enctype="multipart/form-data" style="border:1px solid #ccc">
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <br><br>
            <h1><?php echo $edit ? "Edit" : "Upload"; ?> Articles</h1>
            <p>Please fill in this form to create an Files.</p>
            <hr>
            <label><b>Enter Article Title Here</b></label>
            <input type="text" placeholder="Enter Text here" name="title" style="width: 300px;"
                   value="<?php echo $edit_title ? $edit_title : ''; ?>" required>

            <label><b>Enter Article Details Here</b></label>
            <input type="text" placeholder="Enter Text here" name="description" style="width: 300px;"
                   value="<?php echo $edit_desc ? $edit_desc : ''; ?>" required>

            <label for="article_type"><b>Select Article Type Here</b></label>
            <input type="hidden" name="path" value="<?php echo $edit_type ? $edit_type : ''; ?>">
            <select id="article_type" name="type">
                <?php
                $get_sql = "SELECT * FROM `categories`";
                $query = mysqli_query($conn, $get_sql);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                } else {
                    echo '<option value="">Select</option>';
                }
                ?>
            </select>
            <label for="article_type"><b>Select Article sub Category Here</b></label>
            <select id="sub_type" name="sub_type">
                <?php
                $get_sql = "SELECT * FROM `Sub_categories`";
                $query = mysqli_query($conn, $get_sql);
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                } else {
                    echo '<option value="">Select</option>';
                }
                ?>
            </select>
            <br>
            <label><b> Upload Image File</b></label><span class="glyphicon glyphicon-open-file"></span><br>

            <input type="file" name="imgFile">
            <input type="hidden" name="path" value="<?php echo $edit_path ? $edit_path : ''; ?>">
            <br>
            <div class="clearfix">
                <button type="button" class="cancelbtn"><a href="article.php">Cancel</a></button>
                <?php
                if ($edit) {
                    ?>
                    <button type="submit" class="signupbtn" name="update">UPDATE</button>
                    <?php
                } else {
                    ?>
                    <button type="submit" class="signupbtn" name="create_article">Upload</button>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</form>

<?php
include 'footer.php';