<?php
include '../SQL/db_connect.php';

if (!isset($_GET['id'])) {
    die("❌ Article ID is missing.");
}

$article_id = intval($_GET['id']);

// جلب المقال من قاعدة البيانات
$sql = "SELECT * FROM articles WHERE article_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("❌ Article not found.");
}

$article = $result->fetch_assoc();

// جلب التصنيفات
$catResult = $conn->query("SELECT * FROM categories");
