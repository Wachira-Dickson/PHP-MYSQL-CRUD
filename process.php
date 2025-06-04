<?php
include("connect.php");

if(isset($_POST["create"])) {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $type = $_POST["type"];
    $isbn = $_POST["isbn"];
    $description = $_POST["description"];

    $stmt = $conn->prepare("INSERT INTO books (title, author, type, isbn, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $author, $type, $isbn, $description);

    if($stmt->execute()) {
        echo "Record Inserted";
    } else {
        die("Something went wrong: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
