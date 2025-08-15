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
                    <h4 class="mb-0">Student Attendance List</h4>
                    <a href="student-attendance.php" class="btn btn-sm btn-danger">Add Attendance</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Reg No</th>
                                    <th>Course Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $query = "SELECT * FROM attendence";
                                $query_run = mysqli_query($con, $query);

                                if ($query_run && mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['Reg_no'] ?></td>
                                            <td><?= $row['course_name'] ?></td>
                                            <td><?= $row['date'] ?></td>
                                            <td>
                                                <span class="badge <?= ($row['status'] == 'Present') ? 'bg-success' : 'bg-secondary' ?>">
                                                    <?= $row['status'] ?>
                                                </span>
                                            </td>
                                            <td><?= $row['remark'] ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7" class="text-center text-muted">No attendance data found.</td></tr>' . mysqli_error($con);
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