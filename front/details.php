<?php
include 'layouts/header.php';
include '../SQL/db_connect.php';

if (!isset($_GET['id'])) {
    echo "<p style='color:red;'>❌ No article ID provided.</p>";
    include 'layouts/footer.php';
    exit;
}

$article_id = intval($_GET['id']);

$sql = "SELECT title, content, image_url, published_date FROM articles WHERE article_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<p style='color:red;'>❌ Article not found.</p>";
    include 'layouts/footer.php';
    exit;
}

$article = $result->fetch_assoc();
?>

<div class="full-article">
<h1 class="article-title"><?= htmlspecialchars($article['title']) ?></h1>

   
        <img src="../uploads/<?= $article['image_url'] ?>" alt="Article Image">


    <div class="content">
        <?= nl2br(htmlspecialchars($article['content'])) ?>
    </div>

    <div class="date">
        <?= date("d M, Y", strtotime($article['published_date'])) ?>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>