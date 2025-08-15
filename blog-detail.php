<?php
include("admin/config/connect.php");
include("header.php");
?>

<!-- breadcrumb banner section start -->
<div class="breadcrumb-banner common-banner" style="background-image: url('./app/images/college1.jpg');">
    <div class="overlay"></div>
    <div class="container breadcrumb-content">
        <h1>blog detail</h1>
        <nav>
            <a href="index.php">Home</a> /
            <span>blog detail</span>
        </nav>
    </div>
</div>

<!-- breadcrumb banner section end -->

<!-- Blog detail start here -->
<section class="blog-detail-section py-5">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $blog_id = (int)$_GET['id'];  

            $blog_query = "SELECT * FROM blog WHERE id = $blog_id";
            $blog_query_run = mysqli_query($con, $blog_query);

            if ($blog_query_run && mysqli_num_rows($blog_query_run) > 0) {
                $blog = mysqli_fetch_assoc($blog_query_run);
                ?>
                <div class="blog-detail">
                    <div class="blog-img">
                        <img src="./admin/images/<?= $blog['image'] ?>" alt="<?= $blog['title'] ?>">
                    </div>
                    <div class="blog-content">
                        <h2><?= $blog['title'] ?></h2>
                        <h4 class="my-1"><?= $blog['short_description'] ?></h4>
                        <p><?= $blog['content'] ?></p>
                        <p class="mt-2"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> <?= $blog['created_at'] ?></p>
                    </div>
                </div>
                <?php
            } else {
                echo "<p>Blog not found.</p>";
            }
        } else {
            echo "<p>No blog ID specified.</p>";
        }
        ?>
    </div>
</section>
<!-- Blog detail end here -->


<?php include("footer.php"); ?>