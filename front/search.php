<?php
include 'layouts/header.php';
include '../SQL/db_connect.php';

if (!isset($_GET['q']) || trim($_GET['q']) === '') {
    echo "<p style='color:red; text-align:center; font-size:18px;'>❌ Please enter a search keyword.</p>";
    include 'layouts/footer.php';
    exit;
}

$search_term = "%" . trim($_GET['q']) . "%";

$sql = "SELECT article_id, title, content, published_date, image_url 
        FROM articles 
        WHERE title LIKE ? OR content LIKE ?
        ORDER BY published_date DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();
?>

<div style="max-width:900px; margin:40px auto; padding:20px;">
    <h2 style="margin-bottom:30px; font-size:28px; color:#444;">
        🔍 Search results for: 
        <em style="color:#836540;"><?= htmlspecialchars($_GET['q']) ?></em>
    </h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div style='display:flex; gap:20px; margin-bottom:30px; border-bottom:1px solid #ccc; padding-bottom:15px;'>";
            
            // Show image if available
            if (!empty($row['image_url'])) {
                echo "<div style='flex:0 0 150px;'>
                        <img src='../uploads/" . htmlspecialchars($row['image_url']) . "' alt='Thumbnail' style='width:150px; height:100px; object-fit:cover; border-radius:5px;'>
                      </div>";
            }

            echo "<div style='flex:1;'>";
            echo "<h3 style='margin:0;'><a href='details.php?id={$row['article_id']}' style='color:#333; text-decoration:none;' onmouseover=\"this.style.color='#836540'\" onmouseout=\"this.style.color='#333'\">" . htmlspecialchars($row['title']) . "</a></h3>";
            echo "<p style='color:gray; font-size:14px; margin-top:5px;'>" . date("d M, Y", strtotime($row['published_date'])) . "</p>";
            echo "<p style='margin-top:10px; font-size:16px; color:#555;'>" . mb_substr(strip_tags($row['content']), 0, 150) . "...</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p style='color:#888; font-size:18px;'>No articles found matching your search.</p>";
    }
    ?>
</div>

<?php include 'layouts/footer.php'; ?>
