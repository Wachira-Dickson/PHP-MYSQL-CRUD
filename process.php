<?php
session_start();
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $type = $_POST["type"];
    $isbn = $_POST["isbn"];
    $description = $_POST["description"];

    if (isset($_POST["create"])) {
        $stmt = $conn->prepare("INSERT INTO books (title, author, type, isbn, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $author, $type, $isbn, $description);

        if ($stmt->execute()) {
            $_SESSION["create"] = "✅ Book created successfully.";
            header("Location: index.php");
            exit();
        } else {
            die("❌ Create error: " . $stmt->error);
        }

        $stmt->close();
    }

    elseif (isset($_POST["edit"])) {
        $id = $_POST["id"];

        $stmt = $conn->prepare("UPDATE books SET title=?, author=?, type=?, isbn=?, description=? WHERE id=?");
        $stmt->bind_param("sssssi", $title, $author, $type, $isbn, $description, $id);

        if ($stmt->execute()) {
            $_SESSION["update"] = "✅ Book updated successfully.";
            header("Location: index.php");
            exit();
        } else {
            die("❌ Edit error: " . $stmt->error);
        }

        $stmt->close();
    }

    $conn->close();
} else {
    echo "❌ Invalid access.";
}
?>
