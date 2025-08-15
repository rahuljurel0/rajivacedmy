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
                    <h4>Schedule Update
                        <a href="view-schedule.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $faculty_id = $_GET['id'];

                        $query = "SELECT * FROM schedule WHERE id = '$faculty_id' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_assoc($query_run);
                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="schedule_id" value="<?= $row['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Period:</label>
                                        <select name="period" class="form-select" required>
                                            <option value="" disabled>-- Select Period --</option>
                                            <?php
                                            $periods = ['I', 'II', 'III', 'IV', 'V', 'VI'];
                                            foreach ($periods as $period) {
                                                $selected = ($row['period'] == $period) ? 'selected' : '';
                                                echo "<option value='$period' $selected>$period</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Faculty Name:</label>
                                        <select name="faculty_id" class="form-control" required>
                                            <option value="" disabled>-- Select Faculty --</option>
                                            <?php
                                            $faculty_query = "SELECT * FROM faculty";
                                            $faculty_run = mysqli_query($con, $faculty_query);

                                            if (mysqli_num_rows($faculty_run) > 0) {
                                                while ($facultyEdit = mysqli_fetch_assoc($faculty_run)) {
                                                    $selected = ($facultyEdit['id'] == $row['faculty_id']) ? 'selected' : '';
                                                    echo "<option value='{$facultyEdit['id']}' $selected>{$facultyEdit['name']}</option>";
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
                                            <option value="" disabled>-- Select Department --</option>
                                            <?php
                                            $departments = ['U.G', 'P.G'];
                                            foreach ($departments as $dept) {
                                                $selected = ($row['faculty_department'] == $dept) ? 'selected' : '';
                                                echo "<option value='$dept' $selected>$dept</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Subject:</label>
                                        <select name="subject" class="form-select" required>
                                            <option value="" disabled>-- Select Subject --</option>
                                            <?php
                                            $subjects = ['PHP', 'HTML', 'CSS', 'Java', 'React', 'Figma', 'Laravel'];
                                            foreach ($subjects as $subject) {
                                                $selected = ($row['subject'] == $subject) ? 'selected' : '';
                                                echo "<option value='$subject' $selected>$subject</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Day:</label>
                                        <select name="days" class="form-select" required>
                                            <option value="" disabled>-- Select Day --</option>
                                            <?php
                                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                            foreach ($days as $day) {
                                                $selected = ($row['days'] == $day) ? 'selected' : '';
                                                echo "<option value='$day' $selected>$day</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Room Number:</label>
                                        <input type="text" name="room_no" class="form-control"
                                            placeholder="Enter Room Number"
                                            value="<?= $row['room_no'] ?>" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="Update-Schedule" class="btn btn-primary">Update Schedule</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo '<h4>No Record Found</h4>';
                        }
                    } else {
                        echo '<h4>Invalid Request</h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>