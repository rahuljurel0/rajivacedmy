<?php
include("admin/config/connect.php");
include("header.php");

$query = "SELECT * FROM events";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
    $events = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
} else {
    $events = [];
}
?>

<!-- breadcrumb banner section start -->
<div class="breadcrumb-banner common-banner" style="background-image: url('./app/images/college1.jpg');">
    <div class="overlay"></div>
    <div class="container breadcrumb-content">
        <h1>Events</h1>
        <nav>
            <a href="index.php">Home</a> /
            <span>Events</span>
        </nav>
    </div>
</div>
<!-- breadcrumb banner section end -->

<!-- event-section start here -->
<section class="event-section w-100 py-5">
    <div class="container">
        <h2 class="mb-2">Latest Events</h2>
        <div class="row grid-3 gap-20">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="event-box">
                        <div class="event-img">
                            <img src="./admin/images/<?= $event['image']; ?>" ?>">
                            <span class="event-date"><?= date("d M Y", strtotime($event['event_date'])); ?></span>
                        </div>
                        <div class="event-content">
                            <h5><?= $event['event_title']; ?></h5>
                            <p class="my-1"><?= substr(strip_tags($event['event_description']), 0, 100) . '...'; ?></p>
                            <div class="btn">
                                <a href="event-detail.php?id=<?= $event['id']; ?>" >Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- event-section end here -->

<?php include("footer.php"); ?>