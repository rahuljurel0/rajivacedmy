<?php
include("admin/config/connect.php");
include("header.php") ?>


<!-- ================= Breadcrumb Banner Section ================= -->
<div class="breadcrumb-banner common-banner" style="background-image: url('./app/images/college1.jpg');">
    <div class="overlay"></div>
    <div class="container breadcrumb-content">
        <h1>contact us</h1>
        <nav>
            <a href="index.php">Home</a> /
            <span>sign up</span>
        </nav>
    </div>
</div>

<!-- ================= Breadcrumb Banner Section end ================= -->

<div class="register-page">
    <div class="container">
         <?php include("message.php"); ?>
        <form action="registercode.php" method="POST">
            <h2 class="mb-2"><i class="fa-solid fa-circle-user mr-2"></i>User Register</h2>
            <div class="mb-2">
                <label for="fname">First name:</label>
                <input type="text" name="fname" id="fname" placeholder="enter your fname" required>
            </div>
            <div class="mb-2">
                <label for="lname">Last name:</label>
                <input type="text" name="lname" id="lname" placeholder="enter your lname" required>
            </div>
            <div class="mb-2">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="enter your email" required>
            </div>
            <div class="mb-2">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="enter your password" required>
            </div>
            <div class="mb-2">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn w-100">Register now</button>
            </div>
            <div class="account-btn mt-1">Already have an account <a href="login.php">login</a></div>
        </form>
    </div>
</div>
<?php include("footer.php"); ?>

