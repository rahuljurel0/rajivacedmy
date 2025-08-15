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
                    <h4>Add Books
                        <a href="view-books.php" class="btn btn-danger float-end">View Books</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    <option value="Programming">Programming</option>
                                    <option value="Science">Science</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="History">History</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Biography">Biography</option>
                                    <option value="Children">Children</option>
                                    <option value="Education">Education</option>
                                    <option value="Literature">Literature</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="publisher">Publisher</label>
                                <select name="publisher" class="form-control" required>
                                    <option value="">-- Select Publisher --</option>
                                    <option value="Penguin">Penguin</option>
                                    <option value="HarperCollins">HarperCollins</option>
                                    <option value="McGraw-Hill">McGraw-Hill</option>
                                    <option value="Pearson">Pearson</option>
                                    <option value="Oxford University Press">Oxford University Press</option>
                                    <option value="Wiley">Wiley</option>
                                    <option value="MIT Press">MIT Press</option>
                                    <option value="Plata Publishing">Plata Publishing</option>
                                    <option value="Prentice Hall">Prentice Hall</option>
                                    
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description">Book Description</label>
                                <textarea name="description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Book Image:</label>
                                <input type="file" name="book_image" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Edition</label>
                                <input type="text" name="edition" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status">Availability Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./include/footer.php"); ?>
<?php include("./include/script.php"); ?>
