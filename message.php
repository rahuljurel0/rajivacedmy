<?php
if (isset($_SESSION['message'])) {
    echo "<div class='alert-warning'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}
?>
