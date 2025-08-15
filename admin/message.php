
<?php
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}
