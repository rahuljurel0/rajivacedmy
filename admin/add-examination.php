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
          <h4>Add Exam Schedule
            <a href="view-exams.php" class="btn btn-danger float-end">View Exams</a>
          </h4>
        </div>
        <div class="card-body">
          <form action="code.php" method="POST">
            <div class="row">

            
              <div class="col-md-6 mb-3">
                <label>Exam Name</label>
                <input type="text" name="exam_name" class="form-control" placeholder="Enter your exam type" required>
              </div>

           
              <div class="col-md-6 mb-3">
                <label>Course</label>
                <select name="course" class="form-select" required>
                  <option value="" disabled selected>-- Select Course --</option>
                  <?php
                  $query = "SELECT DISTINCT course_name FROM course";
                  $query_run = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<option>{$row['course_name']}</option>";
                  }
                  ?>
                </select>
              </div>

            
              <div class="col-md-6 mb-3">
                <label>Semester</label>
                <select name="semester" class="form-select" required>
                  <option value="" disabled selected>-- Select Semester --</option>
                  <?php
                  $query = "SELECT DISTINCT semester FROM course";
                  $query_run = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<option>{$row['semester']}</option>";
                  }
                  ?>
                </select>
              </div>

             

              <div class="col-md-6 mb-3">
                <label>Department</label>
                <select name="department" class="form-select" required>
                  <option value="" disabled selected>-- Select Department --</option>
                  <?php
                  $query = "SELECT DISTINCT department FROM course";
                  $query_run = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<option>{$row['department']}</option>";
                  }
                  ?>
                </select>
              </div>

             
              <div class="col-md-6 mb-3">
                <label>Exam Date</label>
                <input type="date" name="exam_date" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Start Time</label>
                <input type="time" name="start_time" class="form-control" placeholder="Enter Start Time" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>End Time</label>
                <input type="time" name="end_time" class="form-control" placeholder="Enter End Time" required>
              </div>

           
              <div class="col-md-6 mb-3">
                <label>Room</label>
                <input type="text" name="room" class="form-control" placeholder="Enter Room No" required>
              </div>

              
              <div class="col-md-6 mb-3">
                <label>Invigilator</label>
                <select name="invigilator_id" class="form-select" required>
                  <option value="" disabled selected>-- Select Faculty --</option>
                  <?php
                  $query = "SELECT id, name FROM faculty WHERE status = 1";
                  $query_run = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-select" required>
                  <option value="Scheduled">Scheduled</option>
                  <option value="Completed">Completed</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
              </div>

              <!-- Submit -->
              <div class="col-md-12 mb-3">
                <button type="submit" name="add_exam" class="btn btn-primary">Save Exam Schedule</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("./include/footer.php"); include("./include/script.php"); ?>
