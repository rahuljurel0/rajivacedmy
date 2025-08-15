<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>College || Management</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&family=Libertinus+Math&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Slick CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./app/css/reset.css">
    <link rel="stylesheet" href="./app/css/style.css">
    <link rel="stylesheet" href="./app/css/responsive.css">
</head>

<body>

    <header>
        <div class="container flex space-between align-center">
            <!-- Logo -->
            <div class="logo">
                <a href="index.php">
                    <img src="./app/images/logo.png" alt="Logo">
                </a>
            </div>

            <!-- Desktop Menu -->
            <nav>
                <ul class="flex">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>

                    <li class="dropdown-list relative">
                        <a href="#">Courses <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <?php
                            $query = "SELECT * FROM course";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    echo '<li><a href="course.php?id=' . $row['id'] . '">' . htmlspecialchars($row['course_name']) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </li>

                    <li><a href="event.php">Events</a></li>

                    <li class="dropdown-list relative">
                        <a href="#">Blog <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog.php?id=1">Blog</a></li>
                            <li><a href="blog.php?id=1">Blog Detail</a></li>
                        </ul>
                    </li>

                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>

            <div class="user-detail">
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="profile.php" class="btn"><?= htmlspecialchars($_SESSION['user']['name']) ?></a>
                    <a href="logout.php" class="btn">Logout</a>
                <?php else: ?>
                    <a href="register.php" class="btn">Sign Up</a>
                    <a href="login.php" class="btn">Login</a>
                <?php endif; ?>
            </div>

            <div class="toggle-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <ul>
                <div class="logo">
                    <a href="index.php">
                        <img src="./app/images/logo.png" alt="Logo">
                    </a>
                </div>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>

                <li class="dropdown">
                    <a href="#">Courses <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="submenu">
                        <?php
                        $query = "SELECT * FROM course";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                echo '<li><a href="course.php?id=' . $row['id'] . '">' . htmlspecialchars($row['course_name']) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </li>

                <li><a href="event.php">Events</a></li>

                <li class="dropdown">
                    <a href="#">Blog <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="submenu">
                        <li><a href="blog.php?id=1">Blog</a></li>
                        <li><a href="blog.php?id=1">Blog Detail</a></li>
                    </ul>
                </li>

                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>


    </header>