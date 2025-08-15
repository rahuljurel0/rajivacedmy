<?php
include("authentication.php");
include("./config/connect.php");
include("./include/header.php");
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Books List</h4>
                    <a href="add-books.php" class="btn btn-sm btn-danger">Add Book</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Publisher</th>
                                    <th>Description</th>
                                    <th>Edition</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $query = "SELECT * FROM library";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td>
                                                <img src="images/<?= $row['image'] ?>" width="100" height="100" class="rounded shadow-sm" alt="Book Image">
                                            </td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['author'] ?></td>
                                            <td><?= $row['category'] ?></td>
                                            <td><?= $row['publisher'] ?></td>
                                            <td style="max-width: 200px; overflow: auto;"><?= $row['description'] ?></td>
                                            <td><?= $row['edition'] ?></td>
                                            <td>
                                                <span class="badge <?= $row['status'] === 'Available' ? 'bg-success' : 'bg-secondary' ?>">
                                                    <?= $row['status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="edit-books.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="book_id" value="<?= $row['id'] ?>">
                                                    <button type="submit" name="delete_book" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="10" class="text-center text-muted">No book data found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");
include("./include/script.php");
?>
