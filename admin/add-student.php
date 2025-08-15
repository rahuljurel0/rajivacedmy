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
                    <h4>Add Student
                        <a href="view-student.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First Name:</label>
                                <input type="text" name="fname" id="fname" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last Name:</label>
                                <input type="text" name="lname" id="lname" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Reg_No" class="form-label">Reg No:</label>
                                <input type="text" name="Reg_No" id="Reg_No" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Degree" class="form-label">Degree:</label>
                                <select name="Degree" id="Degree" class="form-select" required>
                                    <option value="">--- select Degree ---</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MCA">MCA</option>
                                    <option value="BBA">BBA</option>
                                    <option value="MBA">MBA</option>
                                    <option value="B.ECOM">B.ECOM</option>
                                    <option value="BSC">BSC</option>
                                    <option value="BA">BA</option>
                                    <option value="LLB">L.L.B</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label><br>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_student" class="btn btn-primary">Save Student</button>
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