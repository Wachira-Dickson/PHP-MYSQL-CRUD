<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <header class="mb-4">
            <h1>Edit Book</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back to Book List</a>
            </div>
        </header>
        <?php
        include("connect.php");
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $book = $result->fetch_assoc();
            } else {
                echo "<p>No book found with the given ID.</p>";
                exit;
            }

            $stmt->close();
        } else {
            echo "<p>No book ID provided.</p>";
            exit;
        }
        ?>
        <form action="process.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" value="<?php echo $row["title"]; ?>" placeholder="Book Title:" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="author" value="<?php echo $row["author"]; ?>" placeholder="Book Author:" required>
            </div>
            <div class="mb-3">
                <select name="type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="fiction" <?php if($row['type']=="Fiction") {echo "selected";}?>>Fiction</option>
                    <option value="non-fiction" <?php if($row['type']=="Non-Fiction") {echo "selected";}?>>Non-Fiction</option>
                    <option value="science" <?php if($row['type']=="Science") {echo "selected";}?>>Science</option>
                    <option value="history" <?php if($row['type']=="History") {echo "selected";}?>>History</option>
                    <option value="fantasy" <?php if($row['type']=="Fantasy") {echo "selected";}?>>Fantasy</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="isbn" value="<?php echo $row["isbn"]; ?>" placeholder="ISBN:" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="description" value="<?php echo $row["description"]; ?>" placeholder="Book Description:" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="edit" value="Edit Book">
            </div>
            
        </form>
        <?php
        {}
        ?>
    </div>
</body>
</html>