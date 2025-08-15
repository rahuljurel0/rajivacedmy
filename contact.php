<?php
include("admin/config/connect.php");
include("header.php");
?>

<!-- ================= Breadcrumb Banner Section ================= -->
<div class="breadcrumb-banner common-banner" style="background-image: url('./app/images/college1.jpg');">
    <div class="overlay"></div>
    <div class="container breadcrumb-content">
        <h1>contact us</h1>
        <nav>
            <a href="index.php">Home</a> /
            <span>Contact</span>
        </nav>
    </div>
</div>

<!-- ================= Breadcrumb Banner Section end ================= -->

<!-- ================= Contact Section ================= -->
<section class="contact-section py-5 w-100">
    <div class="container">
        <div class="text-center mb-4">
            <h2>Get in Touch</h2>
            <p>We’re here to answer your questions, guide your journey, and help you achieve your dreams.</p>
        </div>

        <ul class="contact-info flex space-between mb-2">
            <li>
                <i class="fa-solid fa-location-dot"></i> Rajiv Academy, Mathura, India
            </li>

            <li>
                <i class="fa-solid fa-phone"></i> +91 9876543210
            </li>

            <li>
                <i class="fa-solid fa-envelope"></i> info@rajivacademy.com
            </li>
        </ul>

        <div class="row flex space-between">
            <div class="col w-50">
                <img src="./app/images/contact-img.svg">
            </div>

            <div class="col w-50">
                <form action="contact.php" method="POST" class="contact-form">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your full name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your email address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="map-section py-5 w-100">
    <div class="container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14228.253515448667!2d77.6681!3d27.4924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3973f38a7d6a3b3f%3A0x99a60a6b8f16f282!2sRajiv%20Academy%2C%20Mathura!5e0!3m2!1sen!2sin!4v1691636821947!5m2!1sen!2sin"
            width="100%" height="400" style="border:0; border-radius:8px;" allowfullscreen loading="lazy">
        </iframe>
    </div>
</section>


<!-- ================= Contact Section end ================= -->

<?php include("footer.php"); ?>