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
                    <h4>Add Blog
                        <a href="view-blog.php" class="btn btn-danger float-end">View Blogs</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description:</label>
                            <textarea name="short_description" id="short_description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">Created Date:</label>
                            <input type="date" name="created_at" id="created_at" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="add_blog" class="btn btn-primary">Add Blog</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>
