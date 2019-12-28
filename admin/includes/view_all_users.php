<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection , $query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
            echo "<td>{$row['user_id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['user_firstname']}</td>";
            echo "<td>{$row['user_lastname']}</td>";
            echo "<td>{$row['user_email']}</td>";
            echo "<td>{$row['user_role']}</td>";
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