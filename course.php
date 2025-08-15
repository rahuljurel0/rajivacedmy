<?php
include("admin/config/connect.php");
include("header.php")
?>

<!-- breadcrumb banner section start -->
<div class="breadcrumb-banner common-banner " style="background-image: url('./app/images/college1.jpg');">
    <div class="container breadcrumb-content">
        <h1>About Us</h1>
        <nav>
            <a href="index.php">Home</a> /
            <span>Course Academy</span>
        </nav>
    </div>
</div>
<!-- breadcrumb banner section end -->

<!-- course section start here -->
<div class="course-section py-5 w-100">
    <div class="container">
        <div class="comman-heading mb-3">
            <h2>Our Courses</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea id
                ullam a eius harum omnis consectetur, in vitae fuga blanditiis.
            </p>
        </div>
        <div class="course-slider">
            <?php
            $query = "SELECT * FROM course";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <div class="course-wrapper">
                        <div class="col">
                            <div class="img-course">
                                <img src="./admin/images/<?= $row['course_image'] ?>" alt="Course Image">
                            </div>
                            <div class="course-detail p-2">
                                <h5><a href="index.php?id=<?= $row['id'] ?>"><?= $row['course_name'] ?></a></h5>
                                <p><?= $row['description'] ?></p>
                                <div class="btn w-100 mt-2">Enroll Now</div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No courses found.</p>";
            }
            ?>
        </div>

    </div>
</div>
<!-- course section end here -->





<?php include("footer.php") ?>