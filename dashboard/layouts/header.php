<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../front/css/styles.css">

</head>

<body>

    <div class="dash_sidebar">
        <h2>NewsNest</h2>
        <ul>
             <li>
                <button class="toggle-btn" onclick="location.href='../admin_dashboard.php'">🏛️ Home</button>
            </li>
            
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">📰 Politics</button>
                <ul class="submenu">
                    <li><a href="../Politics/index.php">Show All</a></li>
                    <li><a href="../Politics/new.php">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">💻 Technology</button>
                <ul class="submenu">
                    <li><a href="../Technology/index.php">Show All</a></li>
                    <li><a href="../Technology/new.php">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">⚽ Sports</button>
                <ul class="submenu">
                    <li><a href="../Sport/index.php">Show All</a></li>
                    <li><a href="../Sport/new.php">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">🌟 Featured Articles</button>
                <ul class="submenu">
                    <li><a href="../Featured/index.php">Show All</a></li>
                    <li><a href="../Featured/new.php">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">📈 Popular News</button>
                <ul class="submenu">
                    <li><a href="../Popular/index.php">Show All</a></li>
                    <li><a href="../Popular/new.php">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn">📢 Ads</button>
                <ul class="submenu">
                    <li><a href="../Ads/index.php">Show All</a></li>
                    <li><a href="../Ads/new.php">Add New</a></li>
                </ul>
            </li>
            <hr class="sidebar-divider my-0">
            <li>
                <button class="toggle-btn" onclick="location.href='../front/index.php'">🚪 Logout</button>
            </li>

        </ul>
    </div>

    <div class="dash_content">