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
                    <h4 class="mb-0">Course List</h4>
                    <a href="courses.php" class="btn btn-sm btn-danger">Add Courses</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Image</th>
                                    <th>Department</th>
                                    <th>Semester</th>
                                    <th>Credit Hours</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $query = "SELECT * FROM course";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['course_code'] ?></td>
                                            <td><?= $row['course_name'] ?></td>
                                            <td>
                                                <img src="images/<?= $row['course_image'] ?>" width="100" height="100" class="rounded shadow-sm" alt="Course Image">
                                            </td>
                                            <td><?= $row['department'] ?></td>
                                            <td><?= $row['semester'] ?></td>
                                            <td><?= $row['credit_hours'] ?></td>
                                            <td><?= $row['course_type'] ?></td>
                                            <td style="max-width: 200px; overflow: auto;"><?= $row['description'] ?></td>
                                            <td>
                                                <span class="badge <?= $row['status'] ? 'bg-success' : 'bg-secondary' ?>">
                                                    <?= $row['status'] ? 'Active' : 'Inactive' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="edit-course.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="course_id" value="<?= $row['id'] ?>">
                                                    <button type="submit" name="delete_course" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="12" class="text-center text-muted">No course data found.</td></tr>';
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