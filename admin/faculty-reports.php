<?php
include("authentication.php");
include("./config/connect.php");
include("./include/header.php");
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Faculty Attendance List</h4>
                    <a href="faculty-attendance.php" class="btn btn-sm btn-danger">Add Attendance</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Faculty Name</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $query = "SELECT * FROM faculty_attendance ORDER BY date";
                                $query_run = mysqli_query($con, $query);

                                if ($query_run && mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['department'] ?></td>
                                            <td><?= $row['designation'] ?></td>
                                            <td><?= $row['date'] ?></td>
                                            <td>
                                                <span class="badge <?= ($row['status'] == 'Present') ? 'bg-success' : 'bg-danger' ?>">
                                                    <?= $row['status'] ?>
                                                </span>
                                            </td>
                                            <td><?= $row['remark'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7" class="text-center text-muted">No attendance records found.</td></tr>';
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

<?php
include("./include/footer.php");
include("./include/script.php");
?>
