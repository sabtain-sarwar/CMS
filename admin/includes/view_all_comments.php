<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $result = mysqli_query($connection , $query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['comment_id']}</td>";
        echo "<td>{$row['comment_author']}</td>";
        echo "<td>{$row['comment_content']}</td>";
        echo "<td>{$row['comment_email']}</td>";
        echo "<td>{$row['comment_status']}</td>";
        $query = "SELECT * FROM posts where post_id = {$row['comment_post_id']}";
        $result1 = mysqli_query($connection , $query);
        confirmQuery($result1);
        $row1 = mysqli_fetch_assoc($result1);
        echo "<td><a href='../post.php?p_id={$row['comment_post_id']}'>{$row1['post_title']}</a></td>";
        echo "<td>{$row['comment_date']}</td>";
        echo "<td><a href='comments.php?approve={$row['comment_id']}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$row['comment_id']}'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete={$row['comment_id']}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
    if (isset($_GET['delete'])) {
        $comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
        $result = mysqli_query($connection , $query);
        confirmQuery($result);
        header("Location: comments.php");
    }

    if (isset($_GET['approve'])) {
        $comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$comment_id}";
        $result = mysqli_query($connection , $query);
        confirmQuery($result);
        header("Location: comments.php");
    }

    if (isset($_GET['unapprove'])) {
        $comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$comment_id}";
        $result = mysqli_query($connection , $query);
        confirmQuery($result);
        header("Location: comments.php");
    }
?>