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
        confirmQuery($result);
        $row1 = mysqli_fetch_assoc($result1);
        echo "<td><a href='../post.php?p_id={$row['comment_post_id']}'>{$row1['post_title']}</a></td>";
        echo "<td>{$row['comment_date']}</td>";
        echo "<td><a href='#'>Approve</a></td>";
        echo "<td><a href='#'>Unapprove</a></td>";
        echo "<td><a href='posts.php?delete='>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>