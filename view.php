<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel=stylesheet href=style.css>
</head>
<body>
    <div class="container mt-5">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1>Book Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back to Book List</a>
            </div>
        </header>

        <div class="book-details">
            <!-- Book details will be displayed here -->
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
                echo "<h2>" . htmlspecialchars($book['title']) . "</h2>";
                echo "<p><strong>Author:</strong> " . htmlspecialchars($book['author']) . "</p>";
                echo "<p><strong>Type:</strong> " . htmlspecialchars($book['type']) . "</p>";
                echo "<p><strong>ISBN:</strong> " . htmlspecialchars($book['isbn']) . "</p>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($book['description']) . "</p>";
            } else {
                echo "<p>No book found with the given ID.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No book ID provided.</p>";
        }

        $conn->close();
        ?>
         </div>

    </div>
</body>
</html>