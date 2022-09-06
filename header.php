<?php
include 'config.php';
$sub_msg = $cmt_msg = $user_email = "";
if (isset($_POST['Subscribe'])) {
    $user_email = $_POST['email'];
    $validate_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);
    if ($validate_email) {
        $sql = "INSERT INTO `subscribe_list`(`email`) VALUES ('$user_email')";
        if (mysqli_query($conn, $sql)) {
            $sub_msg = " <div class='alert success' style='color:green'>Thank you for Subscribing us</div>";
        } else {
            $sub_msg = "<div class='alert error' style='color:red'>Failed While sending Your Email</div>";
        }
    } else {
        $sub_msg = "<div class='alert error' style='color:red'>.$user_email .is not valid email!</div>";

    }
}
if (isset($_POST['comment'])) {
    if (isset($_POST['comment_msg']) && $_POST['comment_msg'] != '') {
        $comment = $_POST['comment_msg'];
        $id = $_POST['article_id'];
        $sql = "INSERT INTO `comment`(`article_id`,`comment`) VALUES ($id,'$comment')";
        if (mysqli_query($conn, $sql)) {
            $cmt_msg = " <div class='alert success' style='color:green'>Your Comment is submitted.</div>";
        } else {
            $cmt_msg = "<div class='alert error' style='color:red'>Failed While commenting</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NewsBlog</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #dbdbdb;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #69acb3;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

</head>
<body>

<nav class="navbar-inverse navbar-fixed-top" style="font-weight: bold">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="margin-top: -30px"><img src="assets/img/logo.png" alt="Logo"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Political<span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <ul class="nav navbar-default">
                        <li><a href="filter.php?id=1&sub=2"><span class="glyphicon glyphicon-flag"></span>National</a>
                        </li>
                        <li><a href="filter.php?id=1&sub=1"><span class="glyphicon glyphicon-tag"></span>State</a></li>
                    </ul>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Business<span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <ul class="nav navbar-default">
                        <li><a href="filter.php?id=2&sub=3"><span class="glyphicon glyphicon-tags"></span>Inter
                                National</a></li>
                        <li><a href="filter.php?id=2&sub=2"><span class="glyphicon glyphicon-flag"></span>National</a>
                        </li>

                    </ul>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sports<span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <ul class="nav navbar-default">
                        <li><a href="filter.php?id=3&sub=3"><span class="glyphicon glyphicon-tags"></span>Inter
                                National</a></li>
                        <li><a href="filter.php?id=3&sub=2"><span class="glyphicon glyphicon-flag"></span>National</a>
                        </li>

                    </ul>
                </ul>
            </li>

            <li  data-toggle="modal" data-target="#myModal" style="color:#4677b3"><a href="#">About us</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">10.00Am-5.00PM</button>


                    <h4 class="modal-title">About Us</h4>

                    <h5>Mail Us We Will Respond Soon... </h5>


                </div>
                <div class="modal-body">

                    <a href="#">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                  lokeshpeddireddy999@gmail.com                    <br>
                    <br>

                </span>
                    </a>
                    <p>
                        <strong>Our Address </strong><br>
                        MVP Main Road, Backside Of Medicover<br>
                        Pin-530017 Vizag.</p>


                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
<br><br><br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12"><h1 style="color: red">LIVE 24X7</h1>

            <iframe width="1140" height="500" src="https://www.youtube.com/embed/WB-y7_ymPJ4"></iframe>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="block wow fadeInUp" data-wow-duration="900ms" data-wow-delay="900ms">

                <h3>TRENDING NEWS</h3><br><br>

                <div class="owl-carousel owl-theme">

                    <div class="item">
                        <iframe width="240" height="300" src="https://www.youtube.com/embed/lZiJEk-9hds"></iframe>
                    </div>
                    <div class="item">
                        <iframe width="240" height="300" src="https://www.youtube.com/embed/II_m28Bm-iM"></iframe>
                    </div>
                    <div class="item">
                        <iframe width="240" height="300" src="https://www.youtube.com/embed/fP9JZ9xDnhc"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>