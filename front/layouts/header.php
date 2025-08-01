<!DOCTYPE html>
<html lang="en">
<?php include $_SERVER['DOCUMENT_ROOT'] . "/news_website/SQL/db_connect.php"; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>Document</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&family=Lalezar&family=Lemonada:wght@300..700&display=swap');
  </style>
</head>


<body>
  <div class="all">
    <header>
      <nav class="navbar">
        <div class="logo">
          <img src="images/Logo.png" alt="logo" />
        </div>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="politics.php">Politics</a></li>
          <li><a href="technology.php">Technology</a></li>
          <li><a href="sports.php">Sports</a></li>

          <li><a href="articles.php">Featured articles</a></li>
          <li><a href="login.php">Login</a></li>

          <li><a href="contact.php">Contact Us</a></li>

        </ul>

      </nav>


    </header>

    <div class="page-layout">


      <aside class="sidebar">
        <?php

        $sql = "SELECT article_id, content, published_date FROM articles 
        WHERE category_id = (SELECT category_id FROM categories WHERE category_name = 'Popular' LIMIT 1)
        ORDER BY published_date DESC LIMIT 7";
        $popular_result = $conn->query($sql);
        ?>

        <div class="popular-news">
          <h3>Popular News</h3>

          <ul>
            <?php if ($popular_result && $popular_result->num_rows > 0): ?>
              <?php while ($row = $popular_result->fetch_assoc()): ?>
                <li>
                  <div>
                    <h4><?= mb_substr(strip_tags($row['content']), 0, 90) ?></h4>
                    <span>
                      <div class="date">
                        <?= date("d M, Y", strtotime($row['published_date'])) ?>
                      </div>
                    </span>
                  </div>
                </li>

              <?php endwhile; ?>
            <?php else: ?>
              <li>
                <div>No popular news found.</div>
              </li>
            <?php endif; ?>

          </ul>
        </div>
        <?php

        $sql = "SELECT article_id, title, image_url, published_date FROM articles 
        WHERE category_id = (SELECT category_id FROM categories WHERE category_name = 'Ads' LIMIT 1)
        ORDER BY published_date DESC LIMIT 7";
        $result = $conn->query($sql);
        ?>
        <div class="ads">
          <h3>📢 Ads</h3>
          <div class="announcement">
            <ul>
              <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                  <li>
                    <div>
                      <h4><?= htmlspecialchars($row['title']) ?></h4>
                      <img src="../uploads/<?= $row['image_url'] ?>" alt="Popular Image">

                      <span>
                        <div class="date">
                          <?= date("d M, Y", strtotime($row['published_date'])) ?>
                        </div>
                      </span>
                    </div>
                  </li>


                <?php endwhile; ?>
              <?php else: ?>
                <li>
                  <div>No popular news found.</div>
                </li>
              <?php endif; ?>
            </ul>
          </div>


        </div>
      </aside>