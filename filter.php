<?php
include "header.php";
?>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><strong style="font-size: xx-large">Latest Articles</strong></a>
            </div>


            <form name="sub" class="navbar-form navbar-right " action="" method="post" style="box-shadow: black">
                <div class="field">
                    <span><?php echo $sub_msg; ?></span>
                    <input type="text" name="email" placeholder="email address" required
                           value="<?php echo $user_email ?>">
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
            $id = 0;
            $sub = 0;
            if (isset($_GET['id']) && isset($_GET['sub'])) {
                $id = $_GET['id'];
                $sub = $_GET['sub'];
            }
            $sql = "SELECT * FROM `article` where `type` = $id and `sub_type` = $sub order by`created_at` desc ";
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
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    <?php
                }
            } else {
                ?>


                <div style="text-align: center; padding: 200px">no article</div>

                <?php
            }
            ?>

        </div><!-- .col-md-12 close -->
    </div><!-- .row close -->
    <!--containerclose-->
<?php
include 'footer.php';