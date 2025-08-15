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
                    <h4>Add Faculty Attendance
                        <a href="faculty-reports.php" class="btn btn-danger float-end">Attandance Reports</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Faculty Name:</label>
                                <select name="faculty_id" class="form-control" required>
                                    <option value="" disabled selected>-- Select Faculty --</option>
                                    <?php
                                    $query = "SELECT * FROM faculty";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No Faculty Found</option>';
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Designation:</label>
                                <select name="designation_select" class="form-control" required>
                                    <option value="" disabled selected>-- Select Designation --</option>
                                    <?php
                                    $query = "SELECT DISTINCT designation FROM faculty";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                            echo '<option value="' . $row['designation'] . '">' . $row['designation'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No Designation Found</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Department:</label>
                                <select name="faculty_department" class="form-control" required>
                                    <option value="" disabled selected>-- Select Department --</option>
                                    <option value="U.G">U.G</option>
                                    <option value="P.G">P.G</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Remark</label>
                                <textarea name="remark" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button type="submit" name="faculty_attendance" class="btn btn-primary mt-4">Save Attendance</button>
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