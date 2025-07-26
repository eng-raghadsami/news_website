<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../front/css/styles.css">

</head>

<body>

    <div class="dash_sidebar">
        <h2>NewsNest</h2>
        <ul>
            <li>
                <button class="toggle-btn" onclick="location.href='admin_dashboard.php'">🏛️ Home</button>
            </li>

            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">🏛️ Politics</button>
                <ul class="submenu">
                    <li><a href="Politics/index.php">Show All</a></li>
                    <li><a href="add_article.php?category=politics">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">💻 Technology</button>
                <ul class="submenu">
                    <li><a href="Technology/index.php">Show All</a></li>
                    <li><a href="add_article.php?category=technology">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">⚽ Sports</button>
                <ul class="submenu">
                    <li><a href="show_articles.php?category=sports">Show All</a></li>
                    <li><a href="add_article.php?category=sports">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">🌟 Featured Articles</button>
                <ul class="submenu">
                    <li><a href="show_articles.php?category=featured">Show All</a></li>
                    <li><a href="add_article.php?category=featured">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">📈 Popular News</button>
                <ul class="submenu">
                    <li><a href="show_articles.php?category=popular">Show All</a></li>
                    <li><a href="add_article.php?category=popular">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">📢 Ads</button>
                <ul class="submenu">
                    <li><a href="show_ads.php">Show All</a></li>
                    <li><a href="add_ad.php">Add New</a></li>
                </ul>
            </li>
            
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn" onclick="location.href='../front/index.php'">🚪 Logout</button>
            </li>

        </ul>
    </div>

    <div class="dash_content">
        <div class="aboutMe" id="home">
            <h1 class="name">News<span class="nest">Nest</span></h1>

            <img src="../front/images/Home.jpg" alt="News Cover" class="hero-image" />
        </div>

    </div>
    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', () => {
                const submenu = button.nextElementSibling;
                submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
            });
        });
    </script>

</body>

</html>