<?php
session_start();
include("./config/connect.php");

// ADD //

if (isset($_POST['add_student'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Degree = $_POST['degree'];
    $Reg_No = $_POST['Reg_No'];
    $status = isset($_POST['status']) ? 1 : 0;

    $student_query = "INSERT INTO students (fname, lname, email, phone, degree, Reg_No, status)
                      VALUES ('$fname', '$lname', '$email', '$phone', '$Degree', '$Reg_No', '$status')";

    $student_query_run = mysqli_query($con, $student_query);

    if ($student_query_run) {
        $_SESSION['message'] = "Student added successfully";
        header("Location: view-student.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong: ";
        header("Location: add-student.php");
        exit(0);
    }
}

// UPDATE //

if (isset($_POST['update_student'])) {
    $student_id = $_POST['student_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Degree = $_POST['degree'];
    $Reg_No = $_POST['Reg_No'];
    $status = isset($_POST['status']) ? 1 : 0;

    $update_query = "UPDATE students SET 
                    fname = '$fname', 
                    lname = '$lname', 
                    email = '$email', 
                    phone = '$phone', 
                    degree = '$degree', 
                    Reg_No = '$Reg_No',
                    status = $status 
                    WHERE id = $student_id";

    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        $_SESSION['message'] = "Student updated successfully";
        header("Location: view-student.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong: ";
        header("Location: add-student.php");
        exit(0);
    }
}

// DELETE  //

if (isset($_POST['delete_student'])) {
    $student_id = $_POST['student_id'];

    $student_delete = "DELETE FROM students WHERE id = '$student_id'";
    $student_delete_run = mysqli_query($con, $student_delete);

    if ($student_delete_run) {
        $_SESSION['message'] = "Student deleted successfully";
        header("Location: view-student.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong: ";
        header("Location: add-student.php");
        exit(0);
    }
}



// ===================== Teacher data ==============================//

// INSERT //

if (isset($_POST['add_faculty'])) {
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $department  = $_POST['department'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $phone       = $_POST['phone'];
    $status      = isset($_POST['status']) ? 1 : 0;

    $photo_name = $_FILES['photo']['name'];
    $photo_tmp  = $_FILES['photo']['tmp_name'];
    $photo_path = "images/" . $photo_name;

    if (move_uploaded_file($photo_tmp, $photo_path)) {
        $faculty_query = "INSERT INTO faculty 
        (name, email, password, department, designation, gender, phone, photo, status) 
        VALUES 
        ('$name', '$email', '$password', '$department', '$designation', '$gender', '$phone', '$photo_name', '$status')";

        $faculty_query_run = mysqli_query($con, $faculty_query);

        if ($faculty_query_run) {
            $_SESSION['message'] = "Faculty added successfully";
            header("Location: view-faculty.php");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong!";
            header("Location: add-faculty.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Image upload failed!";
        header("Location: add-faculty.php");
        exit();
    }
}
// UPDATE //

if (isset($_POST['update_faculty'])) {

    $faculty_id  = $_POST['faculty_id'];
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $department  = $_POST['department'];
    $designation = $_POST['designation'];
    $gender      = $_POST['gender'];
    $phone       = $_POST['phone'];
    $status      = isset($_POST['status']) ? 1 : 0;

    $old_photo   = $_POST['old_photo'];
    $photo_name  = $_FILES['photo']['name'];
    $photo_tmp   = $_FILES['photo']['tmp_name'];
    $photo_path  = '';

    if (!empty($photo_name)) {
        $extension = pathinfo($photo_name, PATHINFO_EXTENSION);
        $new_photo = time() . '.' . $extension;
        $photo_path = "images/" . $new_photo;


        move_uploaded_file($photo_tmp, $photo_path);


        if (file_exists("images/" . $old_photo)) {
            unlink("images/" . $old_photo);
        }
    } else {
        $new_photo = $old_photo;
    }

    $faculty_update = "UPDATE faculty SET 
        name = '$name',
        email = '$email',
        password = '$password',
        department = '$department',
        designation = '$designation',
        gender = '$gender',
        phone = '$phone',
        photo = '$new_photo',
        status = '$status'
        WHERE id = '$faculty_id'";

    $faculty_update_run = mysqli_query($con, $faculty_update);

    if ($faculty_update_run) {
        $_SESSION['message'] = "Faculty updated successfully";
        header("Location: view-faculty.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong!";
        header("Location: edit-faculty.php?id=$faculty_id");
        exit();
    }
}


// DELETE //

if (isset($_POST['delete_faculty'])) {
    $faculty_id = $_POST['faculty_id'];

    $faculty_delete = "DELETE FROM faculty WHERE id = '$faculty_id'";
    $faculty_delete_run = mysqli_query($con, $faculty_delete);

    if ($faculty_delete_run) {
        $_SESSION['message'] = "faculty deleted successfully";
        header("Location: view-student.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong: ";
        header("Location: add-student.php");
        exit(0);
    }
}

// ============================== schedule ======================================= //


// INSERT //

if (isset($_POST['Add-Schedule'])) {
    $faculty_id = $_POST['faculty_id'];
    $department = $_POST['faculty_department'];
    $subject = $_POST['subject'];
    $days = $_POST['days'];
    $period = $_POST['period'];
    $room_no = $_POST['room_no'];

    $faculty_query = "SELECT name FROM faculty WHERE id = '$faculty_id'";
    $faculty_result = mysqli_query($con, $faculty_query);
    $faculty_row = mysqli_fetch_assoc($faculty_result);

    if ($faculty_row) {
        $faculty_name = $faculty_row['name'];

        $query = "INSERT INTO schedule (name, department, subject, days, period, room_no) 
                  VALUES ('$faculty_name', '$department', '$subject', '$days', '$period', '$room_no')";

        $run = mysqli_query($con, $query);

        if ($run) {
            $_SESSION['message'] = "Schedule added successfully";
            header("Location: view-schedule.php");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong!";
            header("Location: faculty-schedule.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Faculty not found!";
        header("Location: faculty-schedule.php");
        exit();
    }
}


// UPDATE //

if (isset($_POST['Update-Schedule'])) {
    $schedule_id = $_POST['schedule_id'];
    $faculty_id = $_POST['faculty_id'];
    $subject = $_POST['subject'];
    $days = $_POST['days'];
    $period = $_POST['period'];
    $room_no = $_POST['room_no'];

    $faculty_query = "SELECT name, department FROM faculty WHERE id = '$faculty_id'";
    $faculty_result = mysqli_query($con, $faculty_query);
    $faculty_data = mysqli_fetch_assoc($faculty_result);

    if ($faculty_data) {
        $name = $faculty_data['name'];
        $department = $faculty_data['department'];

        $query = "UPDATE schedule SET 
            name = '$name',
            subject = '$subject',
            days = '$days',
            period = '$period',
            room_no = '$room_no',
            department = '$department'
            WHERE id = '$schedule_id'";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Schedule updated successfully.";
            header("Location: view-schedule.php");
            exit();
        } else {
            $_SESSION['message'] = "Error updating schedule.";
            header("Location: view-schedule.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Faculty not found.";
        header("Location: view-schedule.php");
        exit();
    }
}


// delete //

if (isset($_POST['delete_schedule'])) {
    $schedule_id = $_POST['schedule_id'];

    $schedule_delete = "DELETE FROM schedule WHERE id = '$schedule_id'";
    $schedule_delete_run = mysqli_query($con, $schedule_delete);

    if ($schedule_delete_run) {
        $_SESSION['message'] = "Schedule deleted successfully";
        header("Location: view-schedule.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong!";
        header("Location: view-schedule.php");
        exit();
    }
}


// ====== course =======//


if (isset($_POST['add_course'])) {
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $credit_hours = $_POST['credit_hours'];
    $course_type = $_POST['course_type'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;

    $course_image = $_FILES['image']['name'];
    $course_image_temp = $_FILES['image']['tmp_name'];
    $course_image_path = "./images/" . $course_image;

    if (move_uploaded_file($course_image_temp, $course_image_path)) {

        $query = "INSERT INTO course (
            course_code, course_name, course_image, department,
            semester, credit_hours, course_type, description, status
        ) VALUES (
            '$course_code', '$course_name', '$course_image', '$department',
            '$semester', '$credit_hours', '$course_type', '$description', '$status'
        )";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Course added successfully.";
            header("Location: view-course.php");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong: " . mysqli_error($con); 
            header("Location: courses.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Image upload failed.";
        header("Location: courses.php");
        exit();
    }
}


//===========update course=============//

if (isset($_POST['Update_course'])) {
    $course_id = $_POST['course_id'];
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $credit_hours = $_POST['credit_hours'];
    $course_type = $_POST['course_type'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;

    $old_image = $_POST['old_image'];
    $course_image = $_FILES['image']['name'];
    $course_image_temp = $_FILES['image']['tmp_name'];
    $new_image = $old_image;

    if (!empty($course_image)) {
        $extension = pathinfo($course_image, PATHINFO_EXTENSION);
        $new_image = time() . '.' . $extension;
        $upload_path = "images/" . $new_image;

        move_uploaded_file($course_image_temp, $upload_path);
    }

    $query = "UPDATE course SET 
        course_code = '$course_code',
        course_name = '$course_name',
        department = '$department',
        semester = '$semester',
        credit_hours = '$credit_hours',
        course_type = '$course_type',
        description = '$description',
        status = '$status',
        course_image = '$new_image'
        WHERE id = '$course_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Course updated successfully!";
        header("Location: view-course.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Course update failed.";
        header("Location: view-course.php");
        exit(0);
    }
}

// delete//

if (isset($_POST['delete_course'])) {
    $course_id = $_POST['course_id'];

    $query_delete = "DELETE FROM course WHERE id = '$course_id'";
    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {
        $_SESSION['message'] = "Course deleted successfully";
        header("Location: view-course.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong!";
    }
}
// ======================= attandence =========================== //


if (isset($_POST['student_attendance'])) {
    $Reg_no = $_POST['Reg_no'];
    $course_name = $_POST['course_name'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $student_query = "SELECT * FROM students WHERE Reg_no = '$Reg_no' LIMIT 1";
    $student_query_run = mysqli_query($con, $student_query);

    $course_query = "SELECT * FROM course WHERE course_name = '$course_name' LIMIT 1";
    $course_query_run = mysqli_query($con, $course_query);

    if ((mysqli_num_rows($student_query_run) > 0) && (mysqli_num_rows($course_query_run) > 0)) {
        $attendance_query = "INSERT INTO attendence (Reg_no, course_name, date, status, remark)
                         VALUES ('$Reg_no', '$course_name', '$date', '$status', '$remark')";
        $attendance_result = mysqli_query($con, $attendance_query);

        if ($attendance_result) {
            $_SESSION['message'] = "Student Attendance recorded successfully!";
            header("Location: student-reports.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed to record attendance: ";
            header("Location: student-attendance.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Invalid Student ID or Course Name!";
        header("Location: student-attendance.php");
        exit();
    }
}

// ------------------------------- faculty attendance---------------------------------------------

if (isset($_POST['faculty_attendance'])) {
    $faculty_id = $_POST['faculty_id'];
    $designation = $_POST['designation_select'];
    $department = $_POST['faculty_department'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $faculty_query = "SELECT name FROM faculty WHERE id = '$faculty_id' LIMIT 1";
    $faculty_result = mysqli_query($con, $faculty_query);

    if ($faculty_result && mysqli_num_rows($faculty_result) > 0) {
        $faculty_data = mysqli_fetch_assoc($faculty_result);
        $name = $faculty_data['name'];

        $attendance_query = "INSERT INTO faculty_attendance (name, department, date, status, designation, remark)
                             VALUES ('$name', '$department', '$date', '$status', '$designation', '$remark')";
        $attendance_result = mysqli_query($con, $attendance_query);

        if ($attendance_result) {
            $_SESSION['message'] = "Faculty Attendance recorded successfully!";
            header("Location: faculty-reports.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed to record attendance: " . mysqli_error($con);
            header("Location: faculty-attendance.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Invalid Faculty selected!";
        header("Location: faculty-attendance.php");
        exit();
    }
}

//----------------------- EXAMINATION ------------------------------//
if (isset($_POST['add_exam'])) {
    $faculty_id     = $_POST['faculty_id'];
    $exam_name      = $_POST['exam_name'];
    $course         = $_POST['course'];
    $semester       = $_POST['semester'];
    $department     = $_POST['department'];
    $exam_date      = $_POST['exam_date'];
    $start_time     = $_POST['start_time'];
    $end_time       = $_POST['end_time'];
    $room           = $_POST['room'];
    $invigilator_id = $_POST['invigilator_id'];
    $status         = $_POST['status'];

    $course_query = "SELECT * FROM course WHERE course_name = '$course' AND semester = '$semester' AND department = '$department' LIMIT 1";
    $faculty_query = "SELECT name FROM faculty WHERE id = '$invigilator_id' LIMIT 1";

    $query = "INSERT INTO examination (exam_name, course, semester, department, exam_date,
        start_time, end_time, room, invigilator_id, status)
        VALUES ('$exam_name', '$course', '$semester', '$department', '$exam_date', '$start_time',
        '$end_time', '$room', '$invigilator_id', '$status')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Exam scheduled successfully.";
        header("Location: view-exams.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed to schedule exam: " . mysqli_error($con);
        header("Location: add-exam.php");
        exit();
    }
}



// add_book //

if (isset($_POST['add_book'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $edition = $_POST['edition'];
    $status = $_POST['status'];

    $book_image = $_FILES['book_image']['name'];
    $book_tmp  = $_FILES['book_image']['tmp_name'];
    $book_path = "images/" . $book_image;

    if (move_uploaded_file($book_tmp, $book_path)) {
        $query = "INSERT INTO library (title, author, description, publisher, category, edition, status, image)
                  VALUES ('$title', '$author', '$description', '$publisher', '$category', '$edition', '$status', '$book_image')";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Book added successfully";
            header("Location: view-books.php");
            exit();
        } else {
            echo "Query Error: " . mysqli_error($con);
            exit();
        }
    }
}

// ===================== update =============//
if (isset($_POST['update_book'])) {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];
    $edition = $_POST['edition'];
    $status = $_POST['status'];

    $old_image = $_POST['old_image'];
    $book_image = $_FILES['book_image']['name'];
    $book_tmp  = $_FILES['book_image']['tmp_name'];
    $new_image = $old_image;

    if (!empty($book_image)) {
        $extension = pathinfo($book_image, PATHINFO_EXTENSION);
        $new_image = time() . '.' . $extension;
        $upload_path = "images/" . $new_image;
        move_uploaded_file($book_tmp, $upload_path);
    }

    $query = "UPDATE library SET 
        title='$title',
        author='$author',
        category='$category',
        publisher='$publisher',
        description='$description',
        edition='$edition',
        status='$status',
        image='$new_image'
        WHERE id='$book_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Book updated successfully";
        header("location: view-books.php");
        exit(0);
    } else {
        echo "Book update failed<br>";
        echo "MySQL Error: " . mysqli_error($con);
        exit;
    }
}


// add blog 

if(isset($_POST['add_blog'])) {
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $short_description = $_POST['short_description'];
    $content = $_POST['content'];
    $created_at = $_POST['created_at'];

    if(move_uploaded_file($image_tmp, "./images/".$image)) {
        $query = "INSERT INTO blog (title, image, short_description, content, created_at) 
                  VALUES ('$title', '$image', '$short_description', '$content', '$created_at')";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['message'] = "Blog added successfully";
            header("Location: view-blog.php");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong: " . mysqli_error($con);
            header("Location: add-blog.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Image upload failed";
        header("Location: add-blog.php");
        exit();
    }
}


// update blog


if(isset($_POST['update_blog'])) {
    $blog_id = $_POST['blog_id'];
    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $content = $_POST['content'];
    $created_at = $_POST['created_at'];

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $new_image = $old_image;

    if (!empty($image)) {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $new_image = time() . '.' . $extension;
        move_uploaded_file($image_tmp, "./images/" . $new_image);
        if (file_exists("./images/" . $old_image)) {
            unlink("./images/" . $old_image);
        }
    }

    $query = "UPDATE blog SET 
              title='$title', 
              image='$new_image', 
              short_description='$short_description', 
              content='$content', 
              created_at='$created_at' 
              WHERE id='$blog_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Blog updated successfully";
        header("Location: view-blog.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong: " . mysqli_error($con);
        header("Location: edit-blog.php?id=$blog_id");
        exit();
    }
}

// delete blog

if(isset($_POST['delete_blog'])) {
    $blog_id = $_POST['blog_id'];

    $query = "DELETE FROM blog WHERE id='$blog_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Blog deleted successfully";
        header("Location: view-blog.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong: " . mysqli_error($con);
        header("Location: view-blog.php");
        exit();
    }
}



// add event

if(isset($_POST['add_event'])) {
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "./images/" . $image;

    if (move_uploaded_file($image_tmp, $image_path)) {
        $query = "INSERT INTO events (event_title, event_date, event_description, image) 
                  VALUES ('$event_title', '$event_date', '$event_description', '$image')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Event added successfully";
            header("Location: view-event.php");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong: " . mysqli_error($con);
            header("Location: add-event.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Image upload failed";
        header("Location: add-event.php");
        exit();
    }
}

