<?php include '../layouts/header.php';
include '../../SQL/db_connect.php';
$category_name = 'Technology'; ?>
<div style="margin-left: 10px; padding: 10px;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2px;">
        <h2 style="margin: 0;">💻 Technology</h2>
        <a href='../Technology/index.php' class='add-btn' style="padding: 6px 12px;">Show All</a>
    </div>
    <br>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data" class="article-form">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*">

        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="6" required></textarea>

        <input type="submit" value="Create">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = '../../uploads/' . $imageName;

        if (!is_dir('../../uploads')) {
            mkdir('../../uploads', 0777, true);
        }

        if (move_uploaded_file($imageTmp, $imagePath)) {
            $stmt_cat = $conn->prepare("SELECT category_id FROM categories WHERE category_name = ? LIMIT 1");
            $stmt_cat->bind_param("s", $category_name);
            $stmt_cat->execute();
            $result_cat = $stmt_cat->get_result();

            if ($result_cat->num_rows > 0) {
                $row = $result_cat->fetch_assoc();
                $category_id = $row['category_id'];

                $stmt = $conn->prepare("INSERT INTO articles (title, content, image_url, category_id) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("sssi", $title, $content, $imageName, $category_id);

                if ($stmt->execute()) {
                    echo "<p style='color: green;'>✅ Article added successfully!</p>";
                } else {
                    echo "<p style='color: red;'>❌ Failed to insert article: " . $stmt->error . "</p>";
                }
            } else {
                echo "<p style='color: red;'>❌ Category '$category_name' not found.</p>";
            }
        } else {
            echo "<p style='color: red;'>❌ Failed to upload image.</p>";
        }
    }
    ?>
</div>
<?php include '../layouts/footer.php'; ?>