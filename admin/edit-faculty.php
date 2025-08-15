<?php
include("authentication.php");
include("./config/connect.php");
include("./include/header.php");
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Faculty
                        <a href="view-faculty.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM faculty WHERE id='$id' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $data = mysqli_fetch_assoc($query_run);
                    ?>

                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="faculty_id" value="<?= $data['id'] ?>">
                                <input type="hidden" name="old_photo" value="<?= $data['photo'] ?>">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="form-label">Full Name:</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" id="name" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" name="email" value="<?= $data['email'] ?>" id="email" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Password:</label>
                                        <input type="password" name="password" value="<?= $data['password'] ?>" id="password" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="department" class="form-label">Department:</label>
                                        <input type="text" name="department" value="<?= $data['department'] ?>" id="department" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="designation" class="form-label">Designation:</label>
                                        <select name="designation" id="designation" class="form-select" required>
                                            <option value="">-- Select Designation --</option>
                                            <option value="Professor" <?= $data['designation'] == 'Professor' ? 'selected' : '' ?>>Professor</option>
                                            <option value="Associate Professor" <?= $data['designation'] == 'Associate Professor' ? 'selected' : '' ?>>Associate Professor</option>
                                            <option value="Assistant Professor" <?= $data['designation'] == 'Assistant Professor' ? 'selected' : '' ?>>Assistant Professor</option>
                                            <option value="Lecturer" <?= $data['designation'] == 'Lecturer' ? 'selected' : '' ?>>Lecturer</option>
                                            <option value="Guest Faculty" <?= $data['designation'] == 'Guest Faculty' ? 'selected' : '' ?>>Guest Faculty</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender:</label>
                                        <select name="gender" id="gender" class="form-select" required>
                                            <option value="">-- Select Gender --</option>
                                            <option value="male" <?= $data['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                                            <option value="female" <?= $data['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                                            <option value="other" <?= $data['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <input type="text" name="phone" value="<?= $data['phone'] ?>" id="phone" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="form-label">Photo:</label>
                                        <input type="file" name="photo" id="photo" class="form-control">
                                        <?php if (!empty($data['photo'])): ?>
                                            <img src="images/<?= $data['photo'] ?>" width="100" class="mt-2" alt="Faculty Photo">
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label><br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" id="status" <?= $data['status'] == '1' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_faculty" class="btn btn-primary">Update Faculty</button>
                                    </div>

                                </div>
                            </form>

                    <?php
                        } else {
                            echo "<h5>No Faculty Found</h5>";
                        }
                    } else {
                        echo "<h5>Invalid Request</h5>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");
include("./include/script.php");
?>
