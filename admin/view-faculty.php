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
                        <a href="add-faculty.php" class="btn btn-primary float-end">Add Faculty</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $faculty_query = "SELECT * FROM faculty";
                                $faculty_query_run = mysqli_query($con, $faculty_query);

                                if (mysqli_num_rows($faculty_query_run) > 0) {
                                    while ($facultyinfo = mysqli_fetch_assoc($faculty_query_run)) {
                                ?>
                                        <tr>
                                            <td><?= $facultyinfo['id'] ?></td>
                                            <td><?= $facultyinfo['name'] ?></td>
                                            <td><?= $facultyinfo['email'] ?></td>
                                            <td>
                                                <img src="images/<?= $facultyinfo['photo'] ?>" width="50" height="50" alt="Photo">
                                            </td>
                                            <td><?= $facultyinfo['department'] ?></td>
                                            <td><?= $facultyinfo['designation'] ?></td>
                                            <td><?= $facultyinfo['gender'] ?></td>
                                            <td>
                                                <span class="badge <?= $facultyinfo['status'] ? 'bg-success' : 'bg-secondary' ?>">
                                                    <?= $facultyinfo['status'] ? 'Active' : 'Inactive' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="edit-faculty.php?id=<?= $facultyinfo['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="faculty_id" value="<?= $facultyinfo['id'] ?>">
                                                    <button type="submit" name="delete_faculty" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='9' class='text-center'>No Faculty Found</td></tr>";
                                }
                                ?>

                            </tbody>

                        </table>
                        <h4>
                            <a href="faculty-schedule.php" class="btn btn-primary float-start">Add schedule</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>