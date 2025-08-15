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
                    <h4>Add Event
                        <a href="view-event.php" class="btn btn-danger float-end">View Events</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="event_title" name="event_title" required>
                        </div>

                        <div class="mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="event_description" class="form-label">Event Description</label>
                            <textarea class="form-control" id="event_description" name="event_description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Event Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <button type="submit" name="add_event" class="btn btn-primary">Add Event</button>
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
