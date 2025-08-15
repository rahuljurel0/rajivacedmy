<?php
include("authentication.php");
include("./include/header.php");
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Student
                        <a href="add-student.php" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Reg no</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Degree</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM students";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>
                                        <tr>
                                            <td><?= $student['id'] ?></td>
                                            <td><?= $student['fname'] ?></td>
                                            <td><?= $student['lname'] ?></td>
                                            <td><?= $student['Reg_No'] ?></td>
                                            <td><?= $student['email'] ?></td>
                                            <td><?= $student['phone'] ?></td>
                                            <td><?= $student['degree'] ?></td>
                                            <td>
                                                <span class="badge <?= $student['status'] ? 'bg-success' : 'bg-secondary' ?>">
                                                    <?= $student['status'] ? 'Active' : 'Inactive' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="edit-student.php?id=<?= $student['id'] ?>" class="btn btn-sm btn-primary me-2">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                                                    <button type="submit" name="delete_student" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No Students Found</td>
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

<?php
include("./include/footer.php");
include("./include/script.php");
?>