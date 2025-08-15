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
                    <h4>View Faculty
                        <a href="add-examination.php" class="btn btn-primary float-end">Add Exam</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Exam Name</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>Exam Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room</th>
                                    <th>invigilator_id</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM examination";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['exam_name'] ?></td>
                                            <td><?= $row['course'] ?></td>
                                            <td><?= $row['semester'] ?></td>
                                            <td><?= $row['department'] ?></td>
                                            <td><?= $row['exam_date'] ?></td>
                                            <td><?= $row['start_time'] ?></td>
                                            <td><?= $row['end_time'] ?></td>
                                            <td><?= $row['room'] ?></td>
                                            <td><?= $row['invigilator_id'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>
                                <tr>

                                </tr>


                            </tbody>

                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>