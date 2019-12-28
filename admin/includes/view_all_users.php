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
            echo "<td><a href='users.php?delete={$row['user_id']}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$user_id}";
    $delete_user_query = mysqli_query($connection , $query);
    confirmQuery($delete_user_query);
    header("Location: users.php");
}

?>