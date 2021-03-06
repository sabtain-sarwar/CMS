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
            echo "<td><a href='users.php?changeToAdmin={$row['user_id']}'>Admin</a></td>";
            echo "<td><a href='users.php?changeToSub={$row['user_id']}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$row['user_id']}'>Edit</a></td>";
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

if (isset($_GET['changeToAdmin'])) {
    $user_id = $_GET['changeToAdmin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id}";
    $change_to_admin_query = mysqli_query($connection , $query);
    confirmQuery($change_to_admin_query);
    header("Location: users.php");
}


if (isset($_GET['changeToSub'])) {
    $user_id = $_GET['changeToSub'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id}";
    $change_to_sub_query = mysqli_query($connection , $query);
    confirmQuery($change_to_sub_query);
    header("Location: users.php");
}
?>