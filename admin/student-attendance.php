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
                    <h4>Add Student Attendance
                        <a href="student-reports.php" class="btn btn-danger float-end">Attandance Reports</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="Reg_no" class="form-label">Reg No</label>
                                <select name="Reg_no" class="form-select" required>
                                    <option value="">Select Reg No</option>
                                    <?php
                                    $query = "SELECT Reg_no FROM students";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                            echo '<option value="' . $row['Reg_no'] . '">' . $row['Reg_no'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No students found</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <select name="course_name" class="form-select" required>
                                    <option value="">Select Course</option>
                                    <?php
                                    $query = "SELECT course_name FROM course";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                            echo '<option value="' . $row['course_name'] . '">' . $row['course_name'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No courses found</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea name="remark" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button type="submit" name="student_attendance" class="btn btn-primary mt-4">Save Attendance</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");
include("./include/script.php");
?>