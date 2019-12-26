<?php
    if (isset($_GET['delete'])) {
        $post_id = $_GET['delete'];
        $query = "DELETE from posts WHERE post_id = {$post_id}";
        $result = mysqli_query($connection , $query);
        confirmQuery($result);
    }
?>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM posts";
    $result = mysqli_query($connection , $query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['post_id']}</td>";
        echo "<td>{$row['post_author']}</td>";
        echo "<td>{$row['post_title']}</td>";

        $query = "SELECT * FROM category WHERE cat_id = {$row['post_category_id']}";
        $cat_query = mysqli_query($connection , $query);
        confirmQuery($cat_query);
        $cat_result = mysqli_fetch_assoc($cat_query);
        echo "<td>{$cat_result['cat_title']}</td>";

        echo "<td>{$row['post_status']}</td>";
        echo "<td><img src='../images/{$row['post_image']}' width='100' alt='Image'></td>";
        echo "<td>{$row['post_tags']}</td>";
        echo "<td>{$row['post_comment_count']}</td>";
        echo "<td>{$row['post_date']}</td>";
        echo "<td><a href='posts.php?delete={$row['post_id']}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=edit_post&edit={$row['post_id']}'>Edit</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>