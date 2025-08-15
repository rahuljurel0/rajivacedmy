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
                    <h4>Add Faculty
                        <a href="view-faculty.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Full Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Department:</label>
                                <input type="text" name="department" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Designation:</label>
                                <select name="designation" class="form-select" required>
                                    <option value="">-- Select --</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Associate Professor">Associate Professor</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Guest Faculty">Guest Faculty</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Gender:</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">-- Select --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone:</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Photo:</label>
                                <input type="file" name="photo" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label><br>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" checked>
                                    <label class="form-check-label">Active</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_faculty" class="btn btn-primary">Add Faculty</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php");?>
