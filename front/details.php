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
<style>
.comment-box {
  background-color: #f5f5f5;
  border-left: 4px solid #836540;
  padding: 15px 20px;
  margin: 15px 0;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  font-family: 'Lalezar', sans-serif;
}
.comment-username {
  font-size: 18px;
  color: #333;
  font-weight: bold;
  margin-bottom: 5px;
}
.comment-timestamp {
  font-size: 12px;
  color: #777;
  margin-bottom: 10px;
}
.comment-text {
  font-size: 16px;
  color: #444;
  white-space: pre-line;
}
.no-comments {
  color: #888;
  font-size: 16px;
  text-align: center;
  margin-top: 20px;
  font-style: italic;
}

</style>

<div class="full-article">
    <h1 class="article-title"><?= htmlspecialchars($article['title']) ?></h1>


    <img src="../uploads/<?= $article['image_url'] ?>" alt="Article Image">


    <div class="content">
        <?= nl2br(htmlspecialchars($article['content'])) ?>
    </div>

    <div class="date">
        <?= date("d M, Y", strtotime($article['published_date'])) ?>
    </div>
    <div class="comment-form" style="max-width:800px; margin:40px auto 20px; font-family:'Lalezar', sans-serif;">
        <h3 style="margin-bottom: 10px; font-size: 24px;">💬 Comments</h3>

        <form action="addComment.php" method="POST">
            <input type="hidden" name="article_id" value="<?= $article_id ?>">

            <label for="comment_text" style="display:block; margin-bottom:8px; font-size:18px;">Your Comment:</label>

            <textarea name="comment_text" id="comment_text" placeholder="Write your comment..." required
                style="width:100%; height:120px; padding:10px; font-size:16px; border:1px solid #ccc; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); resize: vertical; background-color:#33333321;"></textarea>

            <button type="submit"
                style="margin-top:12px; background-color:#3e3e3e; color:white; border:none; padding:10px 20px; font-size:16px; border-radius:6px; cursor:pointer; transition:background 0.3s;">
                Send Comment
            </button>
        </form>
    </div>

    <div class="comments-section" style="max-width:800px; margin:auto;">
        <h3>All Comments</h3>
        <?php
        $comment_sql = "SELECT c.comment_text, c.timestamp, u.username
                    FROM comments c
                    JOIN users u ON c.user_id = u.user_id
                    WHERE c.article_id = ?
                    ORDER BY c.timestamp DESC";
        $comment_stmt = $conn->prepare($comment_sql);
        $comment_stmt->bind_param("i", $article_id);
        $comment_stmt->execute();
        $comment_result = $comment_stmt->get_result();
        if ($comment_result->num_rows > 0) {
            while ($comment = $comment_result->fetch_assoc()) {
                echo "<div class='comment-box'>";
                echo "<div class='comment-username'>" . htmlspecialchars($comment['username']) . "</div>";
                echo "<div class='comment-timestamp'>" . date("F j, Y", strtotime($comment['timestamp'])) . "</div>";
                echo "<div class='comment-text'>" . nl2br(htmlspecialchars($comment['comment_text'])) . "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-comments'>No comments yet.</p>";
        }
        ?>
    </div>


    <?php include 'layouts/footer.php'; ?>