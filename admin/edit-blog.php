<?php
include("authentication.php");
include("./config/connect.php");
include("./include/header.php");

if (isset($_GET['id'])) {
    $blog_id = (int)$_GET['id'];
    $query = "SELECT * FROM blogs WHERE id = $blog_id";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $blog = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['message'] = "Blog not found.";
        header("Location: view-blog.php");
        exit();
    }
} else {
    header("Location: view-blog.php");
    exit();
}
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Blog
                        <a href="view-blog.php" class="btn btn-danger float-end">View Blogs</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="blog_id" value="<?= $blog['id'] ?>">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" value="<?= htmlspecialchars($blog['title']) ?>" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image: <small>(Leave blank to keep current)</small></label>
                            <input type="file" name="image" id="image" class="form-control">
                            <?php if (!empty($blog['image'])): ?>
                                <img src="./admin/images/<?= htmlspecialchars($blog['image']) ?>" alt="Current Image" style="width:150px; margin-top:10px;">
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description:</label>
                            <textarea name="short_description" id="short_description" class="form-control" rows="3" required><?= htmlspecialchars($blog['short_description']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" class="form-control" rows="6" required><?= htmlspecialchars($blog['content']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">Created Date:</label>
                            <input type="date" name="created_at" id="created_at" value="<?= date('Y-m-d', strtotime($blog['created_at'])) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="update_blog" class="btn btn-primary">Update Blog</button>
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
