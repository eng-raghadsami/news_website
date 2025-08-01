<?php include 'layouts/header.php'; ?>


<?php
$sql = "SELECT article_id, title, content, image_url, published_date FROM articles 
        WHERE category_id = (SELECT category_id FROM categories WHERE category_name = 'Technology' LIMIT 1)
        ORDER BY published_date DESC";
$result = $conn->query($sql);
?>


<div class="technology">
  <h2>Technology</h2>
  <div class="politics-container">
    <div class="box">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="article">
          <div class="img-box">
            <img src="../uploads/<?= $row['image_url'] ?>" alt="Technology Image">
          </div>
          <div class="content">
            <h3 class="article-title1">
              <a href="details.php?id=<?= $row['article_id'] ?>">
                <?= htmlspecialchars($row['title']) ?>
              </a>
            </h3>
            <p style="color: #836540;"><?= mb_substr($row['content'], 0, 180) ?>...</p>
            <div class="meta">
              <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>
              <span><?= substr($row['published_date'], 0, 10) ?></span>
            </div>
          </div>
        </div>
        <hr>
      <?php endwhile; ?>
    </div>
  </div>

</div>







<?php include 'layouts/footer.php'; ?>