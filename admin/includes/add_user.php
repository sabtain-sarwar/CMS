
<?php
if(isset($_POST['create_user'])){
    $firstname      = $_POST['user_firstname'];
    $lastname       = $_POST['user_lastname'];
    $username       = $_POST['username'];
    $user_role      = $_POST['user_role'];
    $user_email     = $_POST['user_email'];
    $user_password  = $_POST['user_password'];

    $query = "INSERT INTO users(user_firstname , user_lastname , username , user_role , user_email , user_password)";
    $query .= " VALUES('{$firstname}' , '{$lastname}' , '{$username}' , '{$user_role}' , '{$user_email}' , '{$user_password}')";
    $createUserQuery = mysqli_query( $connection , $query);
    confirmQuery($createUserQuery);
    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
}
?>


<!-- entype is incharge of sending different form data -->
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control" id="firstname" placeholder="Enter Firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control" id="lastname" placeholder="Enter Lastname">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="user_role" id="role" class="form-control" style="width:140px">
            <option value='subscriber'>Select Options</option>
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
        </select>
    </div>

    <!--<div class="form-group">
        <select name="post_status" id="" class="form-control" style="width:130px">
            <option value='draft'>Post Status</option>
            <option value='published'>Publish</option>;
            <option value='draft'>Draft</option>;
        </select>
    </div>-->


    <!--<div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>-->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email" id="email"  placeholder="Enter Email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password" id="password"  placeholder="Enter Password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User" >
    </div>
</form>