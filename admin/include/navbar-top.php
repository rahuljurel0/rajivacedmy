<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">

    <a class="navbar-brand ps-3" href="index.php">College Admin</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <?php if (isset($_SESSION['auth_user'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= htmlspecialchars($_SESSION['auth_user']['user_name']) ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="department" method="POST">
                            <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                        </form>

                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</nav>