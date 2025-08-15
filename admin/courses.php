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
                    <h4>Add Course
                        <a href="view-course.php" class="btn btn-danger float-end">View Courses</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="course_code" class="form-label">Course Code</label>
                                <input type="number" name="course_code" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <select name="course_name" class="form-control" required>
                                    <option value="">-- Select Course --</option>
                                    <option value="Introduction to Programming">Introduction to Programming</option>
                                    <option value="Data Structures">Data Structures</option>
                                    <option value="Algorithms">Algorithms</option>
                                    <option value="Object Oriented Programming">Object Oriented Programming</option>
                                    <option value="Operating Systems">Operating Systems</option>
                                    <option value="Database Management Systems">Database Management Systems</option>
                                    <option value="Computer Networks">Computer Networks</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Mobile Application Development">Mobile Application Development</option>
                                    <option value="Cloud Computing">Cloud Computing</option>
                                    <option value="Cybersecurity">Cybersecurity</option>
                                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                                    <option value="Machine Learning">Machine Learning</option>
                                    <option value="Big Data Analytics">Big Data Analytics</option>
                                    <option value="Software Engineering">Software Engineering</option>
                                    <option value="Compiler Design">Compiler Design</option>
                                    <option value="Theory of Computation">Theory of Computation</option>
                                    <option value="Computer Architecture">Computer Architecture</option>
                                    <option value="Distributed Systems">Distributed Systems</option>
                                    <option value="Human-Computer Interaction">Human-Computer Interaction</option>
                                    <option value="Information Security">Information Security</option>
                                    <option value="Natural Language Processing">Natural Language Processing</option>
                                    <option value="Deep Learning">Deep Learning</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="course_type" class="form-label">Course Type</label>
                                <select name="course_type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="Theory">Theory</option>
                                    <option value="Lab">Lab</option>
                                    <option value="Project">Project</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Enter course description..."></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="text" name="semester" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="credit_hours" class="form-label">Credit Hours</label>
                                <input type="number" name="credit_hours" step="0.5" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Course Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label><br>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_course" class="btn btn-primary">Save Course</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");
include("./include/script.php");
?>
