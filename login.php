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
            <span>login</span>
        </nav>
    </div>
</div>

<!-- ================= Breadcrumb Banner Section end ================= -->


<div class="login-page ">
    <div class="container">
        <?php include("message.php"); ?>
        <form action="logincode.php" method="POST">
            <h2 class="mb-2"><i class="fa-solid fa-circle-user mr-2"></i>User Login</h2>
            <div class="mb-2">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="enter your email">
            </div>
            <div class="mb-2">
                <label for="email">Password:</label>
                <input type="password" name="password" id="password" placeholder="enter your password">
            </div>

            <div>
                <button type="submit" name="user-login" class="btn w-100">login now</button>
            </div>
            <div class="mt-1 account-btn">
                Don't have an account? <a href="./register.php">Register</a>
            </div>
        </form>
    </div>
</div>

<?php include("footer.php"); ?>