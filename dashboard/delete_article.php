<?php
include '../SQL/db_connect.php';

// تأكد أن id موجود
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    // حذف المقال
    $sql = "DELETE FROM articles WHERE article_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $article_id);

    if ($stmt->execute()) {
        // الرجوع للصفحة السابقة
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "❌ Error deleting article.";
    }
} else {
    echo "❌ Invalid request.";
}
