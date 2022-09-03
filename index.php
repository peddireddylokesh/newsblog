<?php
include 'header.php';
?>
<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><strong style="font-size: xx-large">Latest Articles</strong></a>
        </div>


        <form name="sub" class="navbar-form navbar-right " action="" method="post" style="box-shadow: black">
            <div class="field">
                <span><?php echo $sub_msg; ?></span>
                <input type="text" name="email" placeholder="email address" required value="<?php echo $user_email ?>">
                <input type="submit" name="Subscribe" value="subscribe">
            </div>
        </form>
    </div>
</nav>
<br><br>

<div class="container">
    <span><?= $cmt_msg ?></span>
    <div class="row ">
        <?php
        $sql = "SELECT * FROM `article` order by`created_at` desc ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $article_id = $row['id'];
                $sql1 = "SELECT * FROM `comment` WHERE `article_id`=$article_id AND `status`='APPROVED' ORDER BY `created_at` DESC;";
                ?>
                <div class="col-lg-4 md-2 sm-1 wow animate__fadeInDown" data-wow-duration="1s">
                    <div class="card mb-5">
                        <img src="./upload/<?= $row['img_path'] ?>" class="img-rounded" alt="blog-img"
                             style="box-shadow:10px 10px 10px #5bc0de" width="340px" height="220px">
                        <div class="card-body">
                            <h3><?= $row['title'] ?></h3>
                            <p><?= $row['description'] ?></p>
                            <?php
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <span><?= $row1['comment'] ?></span><br>
                                    <?php
                                }
                            }
                            ?>

                            <form class="navbar-form navbar-right" action="" method="post" name="Comment"
                                      id="CmmHere">
                                    <div class="form-group">
                                        <label>
                                            <input type="hidden" name="article_id" value="<?= $row['id'] ?>">
                                            <input type="text" name="comment_msg" class="form-control"
                                                   placeholder="Comment">
                                            <button type="submit" name="comment" class="btn btn-default">Comment here
                                            </button>
                                        </label>
                                    </div>
                                </form>







                        </div>
                    </div><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <?php
            }
        }
        ?>

    </div><!-- .col-md-12 close -->
</div><!-- .row close -->
<!--containerclose-->


<footer class="text-center text-white" style="background-color:black;"><br><br>
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fa fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fa fa-twitter"></i
                ></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fa fa-google"></i
                ></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fa fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fa fa-linkedin"></i
                ></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fa fa-github"></i
                ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <br><br>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="#">NewsBlog.com</a>
    </div>
    <br><br>
    <!-- Copyright -->
</footer>


<script src="assets/js/vendor/jquery3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    new WOW().init();
</script>

<script src="assets/js/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 10000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>