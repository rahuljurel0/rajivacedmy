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
            <span>About Academy</span>
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

<!-- about-section start here -->
<div class="about-section py-5 w-100">
    <div class="container">
        <div class="text-center mb-3">
            <h2>About Rajiv Academy</h2>
            <p>Excellence in Education, Innovation, and Industry Integration</p>
        </div>
        <div class="row flex space-between gap-40">
            <div class="col w-50">
                <div class="image-wrapper">
                    <img src="./app/images/college-about.jpeg" alt="Rajiv Academy Campus" class="about-img" />
                    <div class="image-tagline">
                        <h5>Empowering Innovation. Shaping Futures.</h5>
                    </div>
                </div>
            </div>
            <div class="col w-50">
                <h2 class="mb-3">Why Choose Rajiv Academy?</h2>
                <ul>
                    <li><i class="fa-solid fa-check-circle"></i> <span><strong>Globally Recognized Programs</strong> in Management, IT, Science & Commerce</span></li>
                    <li><i class="fa-solid fa-check-circle"></i> <span><strong>State-of-the-Art Campus</strong> with smart classrooms, labs & innovation centers</span></li>
                    <li><i class="fa-solid fa-check-circle"></i> <span><strong>Industry-Aligned Curriculum</strong> & placement-focused training modules</span></li>
                    <li><i class="fa-solid fa-check-circle"></i> <span><strong>Mentorship-Driven Learning</strong> led by highly qualified faculty & advisors</span></li>
                    <li><i class="fa-solid fa-check-circle"></i> <span><strong>AICTE & AKTU Affiliated</strong>, ensuring credibility and academic excellence</span></li>
                </ul>
                <div class="btn mt-3">Explore More</div>
            </div>
        </div>
    </div>
</div>
<!-- about-section end here -->

<!-- teacher-section start here -->
<div class="teacher-section py-5 w-100">
    <div class="overlay"></div>
    <div class="container">
        <div class="comman-heading text-center mb-3">
            <h2>Meet Our Expert Faculty</h2>
            <p>Shaping Future Leaders at Rajiv Academy</p>
        </div>

        <div class="team-slider">
            <?php
            $query = "SELECT * FROM faculty";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <div class="team-wrapper">
                        <div class="col">
                            <div class="course-detail p-2">
                                <img src="./admin/images/<?= $row['photo'] ?>" alt="Faculty Photo">
                                <h5><?= $row['name'] ?></h5>
                                <div class="teacher-info">
                                    <div><strong>Designation:</strong> <?= $row['designation'] ?></div>
                                    <div><strong>Department:</strong> <?= $row['department'] ?></div>
                                    <div><strong>Email:</strong> <a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></div>
                                    <div><strong>Phone:</strong> <a href="tel:<?= $row['phone'] ?>"><?= $row['phone'] ?></a></div>
                                </div>
                                <div class="social-links">
                                    <a href="mailto:<?= $row['email'] ?>"><i class="fas fa-envelope"></i></a>
                                    <a href="tel:<?= $row['phone'] ?>"><i class="fas fa-phone"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No faculty found.</p>";
            }
            ?>
        </div>
    </div>
</div>
<!-- teacher-section end here -->


<!-- testimoinal section start here -->
<div class="testimonial-section py-5 w-100">
    <div class="container">
        <div class="common-heading text-center mb-3">
            <h3>testimoinal</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum
                atque
                non dignissimos eius, corporis quis.</p>
        </div>
        <div class="testi-wrapper">
            <div>
                <div class="row flex space-between">
                    <div class="col w-50">
                        <p><i class="fa-solid fa-quote-left"></i>Lorem ipsum dolor,
                            sit
                            amet
                            consectetur adipisicing elit. Hic exercitationem debitis
                            similique
                            aperiam obcaecati eos? Voluptatibus, doloremque! Harum
                            illum
                            nisi
                            animi! Doloremque culpa magni consequatur animi unde sunt.
                            Iure,
                            repellat.</p>
                    </div>
                    <div class="col w-50">
                        <p><i class="fa-solid fa-quote-left"></i>Lorem ipsum dolor,
                            sit
                            amet
                            consectetur adipisicing elit. Hic exercitationem debitis
                            similique
                            aperiam obcaecati eos? Voluptatibus, doloremque! Harum
                            illum
                            nisi
                            animi! Doloremque culpa magni consequatur animi unde sunt.
                            Iure,
                            repellat.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="row flex space-between">
                    <div class="col w-50">
                        <p><i class="fa-solid fa-quote-left"></i>Lorem ipsum dolor,
                            sit
                            amet
                            consectetur adipisicing elit. Hic exercitationem debitis
                            similique
                            aperiam obcaecati eos? Voluptatibus, doloremque! Harum
                            illum
                            nisi
                            animi! Doloremque culpa magni consequatur animi unde sunt.
                            Iure,
                            repellat.</p>
                    </div>
                    <div class="col w-50">
                        <p><i class="fa-solid fa-quote-left"></i>Lorem ipsum dolor,
                            sit
                            amet
                            consectetur adipisicing elit. Hic exercitationem debitis
                            similique
                            aperiam obcaecati eos? Voluptatibus, doloremque! Harum
                            illum
                            nisi
                            animi! Doloremque culpa magni consequatur animi unde sunt.
                            Iure,
                            repellat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- testimoinal section end here -->


<?php include("footer.php") ?>