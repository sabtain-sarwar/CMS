<?php include "includes/admin_header.php"; ?>

<?php
    if (isset($_SESSION['username'])) {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE user_id = {$id}";
        $select_user_profile_query = mysqli_query($connection , $query);
        confirmQuery($select_user_profile_query);
        while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
            $firstname     = $row['user_firstname'];
            $lastname      = $row['user_lastname'];
            $username      = $row['username'];
            $user_role     = $row['user_role'];
            $user_email    = $row['user_email'];
            $user_password = $row['user_password'];
        }
    }

    if(isset($_POST['update_user'])) {
        $firstname      = $_POST['user_firstname'];
        $lastname       = $_POST['user_lastname'];
        $username       = $_POST['username'];
        $user_role      = $_POST['user_role'];
        $user_email     = $_POST['user_email'];
        $user_password  = $_POST['user_password'];

        $query = "UPDATE users SET user_firstname = '{$firstname}' , user_lastname = '{$lastname}' , username = '{$username}' , ";
        $query .= " user_role = '{$user_role}' , user_email = '{$user_email}' , user_password = '{$user_password}' WHERE user_id = {$id}";
        $update_user_query = mysqli_query($connection , $query);
        confirmQuery($update_user_query);
}
?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="user_firstname" class="form-control" id="firstname" value="<?php echo $firstname; ?>">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="user_lastname" class="form-control" id="lastname" value="<?php echo $lastname; ?>">
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="user_role" id="role" class="form-control" style="width:140px">
                                    <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
                                    <?php
                                    if ($user_role == 'admin') {
                                        echo "<option value='subscriber'>subscriber</option>";
                                    } else {
                                        echo "<option value='admin'>admin</option>";
                                    }
                                    ?>
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
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="user_email" id="email" value="<?php echo $user_email; ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="user_password" id="password" value="<?php echo $user_password; ?>">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile" >
                            </div>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>