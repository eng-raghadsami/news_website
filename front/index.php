<?php include '../SQL/db_connect.php'; ?>

<!DOCTYPE html>

<html lang="en">

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
      <hr>
      <main class="main-content">
        <form action="search.php" method="GET" style="
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
    margin: 20px auto;
    max-width: 100%;
">
          <input type="text" name="q" placeholder="Search articles..." required style="
      padding: 10px;
      flex: 1;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
  ">
          <button type="submit" style="
      background-color: #836540;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      font-size: 16px;
    
      transition: background-color 0.3s;
  ">
            Search
          </button>
        </form>


        <div class="aboutMe" id="home">
          <h1 class="name">News<span class="nest">Nest</span></h1>

          <img src="images/Home.jpg" alt="News Cover" class="hero-image" />
        </div>





        <?php
        $sql = "SELECT article_id,title, content, image_url, published_date FROM articles 
        WHERE category_id = (SELECT category_id FROM categories WHERE category_name = 'Politics' LIMIT 1)
        ORDER BY published_date DESC LIMIT 3";
        $result = $conn->query($sql);
        ?>

        <div class="politics">
          <h2>Politics</h2>
          <div class="politics-container">
            <div class="box">
              <?php while ($row = $result->fetch_assoc()): ?>
                <div class="article">
                  <div class="img-box">
                    <img src="../uploads/<?= htmlspecialchars($row['image_url']) ?>" alt="Politics Image">
                  </div>
                  <div class="content">
                    <h3 class="article-title1">
                      <a href="details.php?id=<?= $row['article_id'] ?>">
                        <?= htmlspecialchars($row['title']) ?>
                      </a>
                    </h3>


                    <p style="color:#836540;"><?= mb_substr(strip_tags($row['content']), 0, 180) ?>...</p>

                    <div class="meta">
                      <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>
                      <span>
                        <div class="date">
                          <?= date("d M, Y", strtotime($row['published_date'])) ?>
                        </div>
                      </span>
                    </div>
                  </div>
                </div>
                <hr>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="section-header">
            <a href="politics.php">Show All</a>
          </div>
        </div>




        <hr>

        <?php
        $sql = "SELECT article_id,title, content, image_url, published_date FROM articles 
        WHERE category_id = (SELECT category_id FROM categories WHERE category_name = 'Technology' LIMIT 1)
        ORDER BY published_date DESC LIMIT 3";
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


                    <p style="color:#836540;"><?= mb_substr(strip_tags($row['content']), 0, 180) ?>...</p>
                    <div class="meta">
                      <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>
                      <span>
                        <div class="date">
                          <?= date("d M, Y", strtotime($row['published_date'])) ?>
                        </div>
                      </span>
                    </div>
                  </div>
                </div>
                <hr>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="section-header">
            <a href="technology.php">Show All</a>
          </div>
        </div>
        <hr>

        <?php
        $sql = "SELECT article_id, title, image_url, content, published_date FROM articles
        WHERE category_id = (
        SELECT category_id FROM categories WHERE category_name = 'Sport' LIMIT 1 )
        ORDER BY published_date DESC LIMIT 3";
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
                      <span>
                        <div class="date">
                          <?= date("d M, Y", strtotime($row['published_date'])) ?>
                        </div>
                      </span> <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p>No sports articles found.</p>
            <?php endif; ?>
          </div>
          <div class="section-header">
            <a href="sports.php">Show All</a>
          </div>
        </div>



        <hr>
        <?php
        $sql = "SELECT article_id, title, image_url, content, published_date FROM articles
        WHERE category_id = (
          SELECT category_id FROM categories WHERE category_name = 'Featured' LIMIT 1
        )
        ORDER BY published_date DESC LIMIT 3";
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
                    <span>
                      <div class="date">
                        <?= date("d M, Y", strtotime($row['published_date'])) ?>
                      </div>
                    </span>
                    <h3 class="article-title1">
                      <a href="details.php?id=<?= $row['article_id'] ?>">
                        <?= htmlspecialchars($row['title']) ?>
                      </a>
                    </h3>
                    <p><?= mb_substr(strip_tags($row['content']), 0, 20) ?>...</p>
                    <a href="details.php?id=<?= $row['article_id'] ?>" class="politics-btn">Read More</a>
                    </a>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <p>No featured articles found.</p>
              <?php endif; ?>
            </div>

            <div class="section-header">
              <a href="articles.php">Show All</a>
            </div>
          </section>
        </div>









    </div>
    <hr>

    </main>

  </div>
  </div>
<footer class="footer">
  <div class="footer-container">

    <!-- Section 1: Copyright -->
    <div class="footer-section">
      <p>&copy; 2025 <span class="brand">NewsNest</span>. All rights reserved.</p>
    </div>

    <!-- Section 2: Quick Links -->
    <div class="footer-section">
      <h4>Quick Links</h4>
      <ul class="footer-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="politics.php">Politics</a></li>
        <li><a href="technology.php">Technology</a></li>
        <li><a href="sports.php">Sports</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>

    <!-- Section 3: Social Media -->
    <div class="footer-section">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

  </div>
</footer>

</body>

</html>