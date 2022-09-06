<?php
include 'config.php';
include "header.php";
include "auth.php";
?>

    <div class="container">
        <a href="create_article.php">
            <button type="button" class="btn btn-info add-new right"><i class="fa fa-plus "></i> Add New</button>
        </a><br><br>
        <div class="row ">

            <?php
            $sql = "SELECT * FROM `article` order by`created_at` desc ";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-lg-4 md-2 sm-1 wow animate__fadeInDown" data-wow-duration="1s">
                        <div class="card mb-5">
                            <img src="../upload/<?php echo $row['img_path']; ?>" class="img-rounded" alt="blog-img"
                                 style="box-shadow:10px 10px 10px #5bc0de" width="340px" height="220px">
                            <div class="card-body">
                                <h6><i class="fa-clock"></i><?php
                                    echo date("Y-m-d h:ia", strtotime($row['created_at'])); ?></h6>
                                <h3><?php echo $row['title']; ?></h3>
                                <p><?php echo $row['description']; ?></p>
                                <span><a href="create_article.php?id=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a></span>
                                <span><a href="delete.php?id=<?php echo $row['id']; ?>&type=article"
                                         class="btn btn-danger">Delete</a> </span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div><!-- .col-md-12 close -->
    </div><!-- .row close -->
    <!--containerclose-->
<?php
include 'footer.php';
