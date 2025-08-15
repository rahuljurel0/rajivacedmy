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
                    <h4>Edit Course
                        <a href="view-course.php" class="btn btn-danger float-end">View Courses</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $course_id = $_GET['id'];

                        $query = "SELECT * FROM course WHERE id = '$course_id' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run)) {
                            $row = mysqli_fetch_assoc($query_run);
                    ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="course_id" value="<?= $row['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="course_code" class="form-label">Course Code</label>
                                        <input type="number" name="course_code" value="<?= $row['course_code'] ?>" id="course_code" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="course_name" class="form-label">Course Name</label>
                                        <select name="course_name" id="course_name" class="form-control" required>
                                            <option value="">-- Select Course --</option>
                                            <?php
                                            $courses = [
                                                "Introduction to Programming", "Data Structures", "Algorithms", "Object Oriented Programming",
                                                "Operating Systems", "Database Management Systems", "Computer Networks", "Web Development",
                                                "Mobile Application Development", "Cloud Computing", "Cybersecurity", "Artificial Intelligence",
                                                "Machine Learning", "Big Data Analytics", "Software Engineering", "Compiler Design",
                                                "Theory of Computation", "Computer Architecture", "Distributed Systems", "Human-Computer Interaction",
                                                "Information Security", "Natural Language Processing", "Deep Learning"
                                            ];
                                            foreach ($courses as $course) {
                                                $selected = ($row['course_name'] == $course) ? 'selected' : '';
                                                echo "<option value=\"$course\" $selected>$course</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" name="department" value="<?= $row['department'] ?>" id="department" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="course_type" class="form-label">Course Type</label>
                                        <select name="course_type" class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option value="Theory" <?= $row['course_type'] == 'Theory' ? 'selected' : '' ?>>Theory</option>
                                            <option value="Lab" <?= $row['course_type'] == 'Lab' ? 'selected' : '' ?>>Lab</option>
                                            <option value="Project" <?= $row['course_type'] == 'Project' ? 'selected' : '' ?>>Project</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter course description..."><?= $row['description'] ?></textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="semester" class="form-label">Semester</label>
                                        <input type="text" name="semester" value="<?= $row['semester'] ?>" id="semester" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="credit_hours" class="form-label">Credit Hours</label>
                                        <input type="number" name="credit_hours" step="0.5" value="<?= $row['credit_hours'] ?>" id="credit_hours" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="image" class="form-label">Course Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <?php if (!empty($row['course_image'])): ?>
                                            <img src="images/<?= $row['course_image'] ?>" width="100" class="mt-2" alt="Course Image">
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label><br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" id="status" <?= $row['status'] == '1' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="Update_course" class="btn btn-primary">Update Course</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "<h5>No Course Found!</h5>";
                        }
                    } else {
                        echo "<h5>No ID Provided!</h5>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");
include("./include/script.php");
?>
