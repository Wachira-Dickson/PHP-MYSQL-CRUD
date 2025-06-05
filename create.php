<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <header class="mb-4">
            <h1>Add New Book</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back to Book List</a>
            </div>
        </header>
        <form action="process.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Book Title:" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="author" placeholder="Book Author:" required>
            </div>
            <div class="mb-3">
                <select name="type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="science">Science</option>
                    <option value="history">History</option>
                    <option value="fantasy">Fantasy</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="isbn" placeholder="ISBN:" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="description" placeholder="Book Description:" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Add Book</button>
        </form>
    </div>
</body>
</html>