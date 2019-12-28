<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Date</th>
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
        echo "<td><a href='#'>Edit</a></td>";
        echo "<td><a href='#'>Delete</a></td>";
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

?>