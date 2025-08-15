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
                    <h4>View Events
                        <a href="add-event.php" class="btn btn-danger float-end">Add Event</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $event_query = "SELECT * FROM events ORDER BY created_at DESC";
                            $event_query_run = mysqli_query($con, $event_query);

                            if (mysqli_num_rows($event_query_run) > 0) {
                                while ($event = mysqli_fetch_assoc($event_query_run)) {
                                    ?>
                                    <tr>
                                        <td><?= $event['id']; ?></td>
                                        <td><?= htmlspecialchars($event['event_title']); ?></td>
                                        <td><?= htmlspecialchars($event['event_date']); ?></td>
                                        <td><?= htmlspecialchars($event['event_description']); ?></td>
                                        <td>
                                            <?php if (!empty($event['image'])): ?>
                                                <img src="images/<?= htmlspecialchars($event['image']); ?>" width="100" alt="Event Image">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $event['created_at']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No events found</td>
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

<?php
include("./include/footer.php");
include("./include/script.php");
?>
