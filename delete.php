<?php
if (isset($_GET['id'])) {
    include("connect.php");
    $id = intval($_GET['id']);
    
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "✅ Book deleted successfully.";
    } else {
        die("❌ Delete error: " . $stmt->error);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "❌ No book ID provided.";
}
?>