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
                    <h4>Faculty Schedule
                        <a href="faculty-schedule.php" class="btn btn-primary float-end">Add Schedule</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Faculty Name</th>
                                    <th>Department</th>
                                    <th>Subject</th>
                                    <th>Day</th>
                                    <th>Period</th>
                                    <th>Room No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from schedule";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['department'] ?></td>
                                            <td><?= $row['subject'] ?></td>
                                            <td><?= $row['days'] ?></td>
                                            <td><?= $row['period'] ?></td>
                                            <td><?= $row['room_no'] ?></td>
                                            <td>
                                                <a href="edit-schedule.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="schedule_id" value="<?= $row['id'] ?>">
                                                    <button type="submit" name="delete_schedule" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">No Record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
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