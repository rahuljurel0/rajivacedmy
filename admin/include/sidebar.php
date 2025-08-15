<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Student Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStudents" aria-expanded="false" aria-controls="collapseStudents">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Students
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseStudents" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-student.php">Add Student</a>
                        <a class="nav-link" href="view-student.php">View Students</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Faculty Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaculty" aria-expanded="false" aria-controls="collapseFaculty">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Faculty
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFaculty" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-faculty.php">Add Faculty</a>
                        <a class="nav-link" href="view-faculty.php">View Faculty</a>
                        <a class="nav-link" href="faculty-schedule.php">Faculty Schedule</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Blog Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBlog" aria-expanded="false" aria-controls="collapseBlog">
                    <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                    Blog
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseBlog" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-blog.php">Add Blog</a>
                        <a class="nav-link" href="view-blog.php">View Blog</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Event Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvent" aria-expanded="false" aria-controls="collapseEvent">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Events
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEvent" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-event.php">Add Event</a>
                        <a class="nav-link" href="view-event.php">View Event</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Academic Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAcademic" aria-expanded="false" aria-controls="collapseAcademic">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Academics
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAcademic" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="courses.php">Courses</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Attendance</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAttendance" aria-expanded="false" aria-controls="collapseAttendance">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                    Attendance
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAttendance" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="student-attendance.php">Student Attendance</a>
                        <a class="nav-link" href="student-reports.php">Student Reports</a>
                        <a class="nav-link" href="faculty-attendance.php">Faculty Attendance</a>
                        <a class="nav-link" href="faculty-reports.php">Faculty Reports</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Examination</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseExam" aria-expanded="false" aria-controls="collapseExam">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Examinations
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseExam" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-examination.php">Exam Schedule</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Financial</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFinance" aria-expanded="false" aria-controls="collapseFinance">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                    Finance
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFinance" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="fee-structure.php">Fee Structure</a>
                        <a class="nav-link" href="fee-payment.php">Fee Payment</a>
                        <a class="nav-link" href="payment-reports.php">Payment Reports</a>
                        <a class="nav-link" href="expenses.php">Expenses</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Library</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLibrary" aria-expanded="false" aria-controls="collapseLibrary">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Library
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLibrary" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-books.php">Books</a>
                        <a class="nav-link" href="library-reports.php">Library Reports</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">System</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSettings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="user-management.php">User Management</a>
                        <a class="nav-link" href="system-settings.php">System Settings</a>
                        <a class="nav-link" href="backup-restore.php">Backup/Restore</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php if (isset($_SESSION['auth_user'])): ?>
                <?= $_SESSION['auth_user']['user_name'] ?>
            <?php endif; ?>
        </div>
    </nav>
</div>