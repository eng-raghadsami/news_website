<?php
include '../layouts/header.php';
include '../../SQL/db_connect.php';

// ======= جلب بيانات المقال ==========
if (!isset($_GET['id'])) {
    die("❌ Article ID is missing.");
}

$article_id = intval($_GET['id']);

$sql = "SELECT * FROM articles WHERE article_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("❌ Article not found.");
}

$article = $result->fetch_assoc();

// جلب التصنيفات
$catResult = $conn->query("SELECT * FROM categories");
?>

<div style="margin-left: 10px; padding: 10px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2px;">
        <h2 style="margin: 0;">📰 Edit Politics Articles</h2>
        <a href='../Politics/index.php' class='add-btn' style="padding: 6px 12px;"> Show All</a>
    </div>
    <br><br>

   <form action="" method="POST" enctype="multipart/form-data" class="article-form">


        <label>Title:</label><br>
        <input type="text" name="title" value="<?= $article['title'] ?>" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="6" cols="50"><?= $article['content'] ?></textarea><br><br>

      <input type="hidden" name="category_id" value="<?= $article['category_id'] ?>">


        <label>Current Image:</label><br>
        <img src="../../uploads/<?= $article['image_url'] ?>" width="100"><br><br>

        <label>Change Image (optional):</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit" name="update" class="submit-btn">💾 Save</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];

        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $target = "../../uploads/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        } else {
            $image = $article['image_url'];
        }

        $updateSql = "UPDATE articles SET title=?, content=?, category_id=?, image_url=? WHERE article_id=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ssisi", $title, $content, $category_id, $image, $article_id);

        if ($updateStmt->execute()) {
            echo "<script>alert('✅ Article updated successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "❌ Error updating article.";
        }
    }
    ?>
</div>

<?php include '../layouts/footer.php'; ?>
