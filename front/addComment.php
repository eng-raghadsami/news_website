<?php
session_start();
include '../SQL/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article_id = intval($_POST['article_id']);
    $comment_text = trim($_POST['comment_text']);
    $user_id = $_SESSION['user_id'];

    if (empty($comment_text)) {
        die("Comment cannot be empty.");
    }

    $stmt = $conn->prepare("INSERT INTO comments (article_id, user_id, comment_text, timestamp) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $article_id, $user_id, $comment_text);

    if ($stmt->execute()) {
        header("Location: details.php?id=" . $article_id);
        exit;
    } else {
        die("Error adding comment: " . $conn->error);
    }
} else {
    header("Location: index.php");
    exit;
}
