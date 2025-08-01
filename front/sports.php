<?php include 'layouts/header.php'; ?>

<?php
$sql = "SELECT article_id, title, image_url, content, published_date FROM articles
        WHERE category_id = (
        SELECT category_id FROM categories WHERE category_name = 'Sport' LIMIT 1 )
        ORDER BY published_date DESC";
$sports_result = $conn->query($sql);
?>
<div class="sports" id="sports">
  <h2>Sports</h2>
  <div class="sports-container">
    <?php if ($sports_result && $sports_result->num_rows > 0): ?>
      <?php while ($row = $sports_result->fetch_assoc()): ?>
        <div class="card">
          <img src="../uploads/<?= htmlspecialchars($row['image_url']) ?>" alt="Sport News">
          <div class="info">
            <h3 class="article-title1">
              <a href="details.php?id=<?= $row['article_id'] ?>">
                <?= htmlspecialchars($row['title']) ?>
              </a>
            </h3>
            <p><?= mb_substr(strip_tags($row['content']), 0, 90) ?>...</p>
            <div class="meta">
              <span><?= substr($row['published_date'], 0, 10) ?></span>
              <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No sports articles found.</p>
    <?php endif; ?>
  </div>

</div>

<?php include 'layouts/footer.php'; ?>