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
                    <h4>View Blog
                        <a href="add-blog.php" class="btn btn-danger float-end">Add Blog</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Short Description</th>
                                <th>Content</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $blog_query = "SELECT * FROM blog";
                            $blog_query_run = mysqli_query($con, $blog_query);

                            if (mysqli_num_rows($blog_query_run) > 0) {
                                foreach ($blog_query_run as $blog) {
                                    ?>
                                    <tr>
                                        <td><?= $blog['id']; ?></td>
                                        <td><?= $blog['title']; ?></td>
                                        <td><img src="images/<?= $blog['image']; ?>" alt="<?= $blog['title']; ?>" width="100"></td>
                                        <td><?= $blog['short_description']; ?></td>
                                        <td><?= $blog['content']; ?></td>
                                        <td><?= $blog['created_at']; ?></td>
                                        <td>
                                            <a href="edit-blog.php?id=<?= $blog['id']; ?>" class="btn btn-warning">Edit</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <input type="hidden" name="blog_id" value="<?= $blog['id']; ?>">
                                                <button type="submit" name="delete_blog" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">No blogs found</td>
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

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>
