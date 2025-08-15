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
                    <h4>Edit Student
                        <a href="view-student.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $student_id = $_GET['id'];

                        $edit_student = "SELECT * FROM students WHERE id = '$student_id'";
                        $edit_student_run = mysqli_query($con, $edit_student);

                        if (mysqli_num_rows($edit_student_run) > 0) {
                            $studentEdit = mysqli_fetch_assoc($edit_student_run);
                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?= $studentEdit['id'] ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fname" class="form-label">First Name:</label>
                                        <input type="text" name="fname" value="<?= $studentEdit['fname'] ?>" id="fname" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lname" class="form-label">Last Name:</label>
                                        <input type="text" name="lname" value="<?= $studentEdit['lname'] ?>" id="lname" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Reg_No" class="form-label">Reg No:</label>
                                        <input type="text" name="Reg_No" value="<?= $studentEdit['Reg_No'] ?>" id="Reg_No" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" name="email" value="<?= $studentEdit['email'] ?>" id="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <input type="text" name="phone" value="<?= $studentEdit['phone'] ?>" id="phone" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Degree" class="form-label">Degree:</label>
                                        <select name="Degree" id="Degree" class="form-select" required>
                                            <option value="">-- Select Degree --</option>
                                            <?php
                                            $Degrees = ['BCA', 'MCA', 'BBA', 'MBA', 'B.ECOM', 'BSC', 'BA', 'LLB'];
                                            foreach ($Degrees as $Degree) {
                                                $selected = ($Degree == $studentEdit['Degree']) ? 'selected' : '';
                                                echo "<option value=\"$Degree\" $selected>$Degree</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label><br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" id="status" <?= $studentEdit['status'] ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "<h4 class='text-danger'>No Record Found</h4>";
                        }
                    } else {
                        echo "<h4 class='text-danger'>Invalid Request</h4>";
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