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
                    <h4>Schedule Faculty
                        <a href="view-schedule.php" class="btn btn-danger float-end">View Schedule</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Period:</label>
                                <select name="period" class="form-select" required>
                                    <option value="" disabled selected>-- Select Period --</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                </select>
                            </div>

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
                                <label>Department:</label>
                                <select name="faculty_department" class="form-control" required>
                                    <option value="" disabled selected>-- Select Department --</option>
                                    <option value="U.G">U.G</option>
                                    <option value="P.G">P.G</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Subject:</label>
                                <select name="subject" class="form-select" required>
                                    <option value="" disabled selected>-- Select Subject --</option>
                                    <option value="PHP">PHP</option>
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="Java">Java</option>
                                    <option value="React">React</option>
                                    <option value="Figma">Figma</option>
                                    <option value="Laravel">Laravel</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Day:</label>
                                <select name="days" class="form-select" required>
                                    <option value="" disabled selected>-- Select Day --</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Room Number:</label>
                                <input type="text" name="room_no" class="form-control" placeholder="Enter Room Number" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="Add-Schedule" class="btn btn-primary">Add Schedule</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>