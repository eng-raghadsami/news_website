<?php include '../layouts/header.php';
include '../../SQL/db_connect.php'; ?>

<div style="margin-left: 10px; padding: 10px;  font-size: 14px;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2px;">
        <h2 style="margin: 0;">📰 Politics Articles</h2>
        <a href='../Politics/new.php' class='add-btn' style="padding: 6px 12px;">➕ Add New</a>
    </div>
    <br>
    <br><br>
    <table border="1" cellpadding="6" cellspacing="0" style="width: 100%; background-color: #5453522f; border-collapse: collapse; margin-top: 2px;">

        <thead style="background-color: #836540;">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Published Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT article_id,image_url, title, published_date FROM articles WHERE category_id = (
                        SELECT category_id FROM categories WHERE category_name = 'Politics' LIMIT 1
                    ) ORDER BY published_date DESC";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$count}</td>";
                    echo "<td><img src='../../uploads/{$row['image_url']}' alt='Article Image' style='width: 100px; height: auto;'></td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['published_date']}</td>";
                    echo "<td>
        <a href='edit.php?id={$row['article_id']}' 
           style='padding: 5px 10px; background-color: #3498db; color: white; border-radius: 5px; text-decoration: none; margin-right: 5px;'>
           ✏️ Edit
        </a>
<a href='../delete_article.php?id={$row['article_id']}'
           style='padding: 5px 10px; background-color: #e74c3c; color: white; border-radius: 5px; text-decoration: none;' 
           onclick=\"return confirm('Are you sure you want to delete this article?');\">
           🗑️ Delete
        </a>
      </td>";
                    $count++;
                }
            } else {
                echo "<tr><td colspan='5'>No articles found in Politics category.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<?php include '../layouts/footer.php'; ?>