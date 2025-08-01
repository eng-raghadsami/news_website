<?php include 'layouts/header.php'; ?>

<?php
$sql = "SELECT article_id, title, image_url, content, published_date FROM articles
        WHERE category_id = (
          SELECT category_id FROM categories WHERE category_name = 'Featured' LIMIT 1
        )
        ORDER BY published_date DESC";
$result = $conn->query($sql);
?>
<div class="articles" id="featuredarticles">
  <section class="blog" id="featuredarticles">
    <h2>Featured Articles</h2>

    <div class="blog-container">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="box">
            <img src="../uploads/<?= htmlspecialchars($row['image_url']) ?>" alt="Article Image">
            <span><?= substr($row['published_date'], 0, 10) ?></span>
            <h3 class="article-title1">
              <a href="details.php?id=<?= $row['article_id'] ?>">
                <?= htmlspecialchars($row['title']) ?>
              </a>
            </h3>
            <p><?= mb_substr(strip_tags($row['content']), 0, 20) ?>...</p>
            <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>


          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No featured articles found.</p>
      <?php endif; ?>
    </div>


  </section>
</div>


<?php include 'layouts/footer.php'; ?>