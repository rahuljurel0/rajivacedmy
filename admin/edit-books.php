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
                    <h4>Edit Book
                        <a href="view-books.php" class="btn btn-danger float-end">View Books</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {

                        $book_id = $_GET['id'];

                        $query = "SELECT * FROM library WHERE id = '$book_id' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run)) {
                            $row = mysqli_fetch_assoc($query_run);
                    ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="book_id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="old_image" value="<?= $row['image']; ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" value="<?= $row['title'] ?>" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Author</label>
                                        <input type="text" name="author" value="<?= $row['author'] ?>" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="category">Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            <?php
                                            $categories = ["Programming", "Science", "Mathematics", "History", "Technology", "Fiction", "Biography", "Children", "Education", "Literature"];
                                            foreach ($categories as $category) {
                                                $selected = ($row['category'] == $category) ? 'selected' : '';
                                                echo "<option value='" . $category . "' $selected>$category</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="publisher">Publisher</label>
                                        <select name="publisher" class="form-control" required>
                                            <option value="">-- Select Publisher --</option>
                                            <option value="Penguin" <?= ($row['publisher'] == 'Penguin') ? 'selected' : '' ?>>Penguin</option>
                                            <option value="HarperCollins" <?= ($row['publisher'] == 'HarperCollins') ? 'selected' : '' ?>>HarperCollins</option>
                                            <option value="McGraw-Hill" <?= ($row['publisher'] == 'McGraw-Hill') ? 'selected' : '' ?>>McGraw-Hill</option>
                                            <option value="Pearson" <?= ($row['publisher'] == 'Pearson') ? 'selected' : '' ?>>Pearson</option>
                                            <option value="Oxford University Press" <?= ($row['publisher'] == 'Oxford University Press') ? 'selected' : '' ?>>Oxford University Press</option>
                                            <option value="Wiley" <?= ($row['publisher'] == 'Wiley') ? 'selected' : '' ?>>Wiley</option>
                                            <option value="MIT Press" <?= ($row['publisher'] == 'MIT Press') ? 'selected' : '' ?>>MIT Press</option>
                                            <option value="Plata Publishing" <?= ($row['publisher'] == 'Plata Publishing') ? 'selected' : '' ?>>Plata Publishing</option>
                                            <option value="Prentice Hall" <?= ($row['publisher'] == 'Prentice Hall') ? 'selected' : '' ?>>Prentice Hall</option>
                                        </select>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="description">Book Description</label>
                                        <textarea name="description" class="form-control" rows="4" required><?= $row['description'] ?></textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Book Image:</label>
                                        <input type="file" name="book_image" class="form-control" accept="image/*">
                                        <?php if (!empty($row['image'])): ?>
                                            <img src="images/<?= $row['image'] ?>" width="100" class="mt-2" alt="Book Image">
                                        <?php endif; ?>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label>Edition</label>
                                        <input type="text" name="edition" class="form-control" value="<?= $row['edition'] ?>">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="status">Availability Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">-- Select Status --</option>
                                            <option value="Available" <?= $row['status'] == 'Available' ? 'selected' : '' ?>>Available</option>
                                            <option value="Unavailable" <?= $row['status'] == 'Unavailable' ? 'selected' : '' ?>>Unavailable</option>
                                        </select>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_book" class="btn btn-primary">Update Book</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "<h5>No Book Found</h5>";
                        }
                    } else {
                        echo "<h5>Invalid Request</h5>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>