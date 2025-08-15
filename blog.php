<?php
include("admin/config/connect.php");
include("header.php");

$query = "SELECT * FROM blog ORDER BY created_at DESC";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
    $blogs = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
} else {
    $blogs = [];
}
?>

<!-- breadcrumb banner section start -->
<div class="breadcrumb-banner common-banner" style="background-image: url('./app/images/college1.jpg');">
    <div class="overlay"></div>
    <div class="container breadcrumb-content">
        <h1>blog </h1>
        <nav>
            <a href="index.php">Home</a> /
            <span>blog</span>
        </nav>
    </div>
</div>

<!-- breadcrumb banner section end -->

<!-- blog-section start here -->
<section class="blog-section w-100 py-5">
    <div class="container">
        <h2 class="mb-2">Latest Blog Posts</h2>
        <div class="row grid-3 gap-20">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="./admin/images/<?= $blog['image'] ?>" alt="#">
                        <span class="blog-date"><?= date("d M Y", strtotime($blog['created_at'])) ?></span>
                    </div>
                    <div class="blog-content">
                        <h5><?= $blog['title'] ?></h5>
                        <p class="my-1"><?= substr(strip_tags($blog['content']), 0, 100) . '...'; ?></p>
                        <a href="blog-detail.php?id=<?= $blog['id']; ?>" class="btn">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- blog-section end here -->


<?php include("footer.php"); ?>