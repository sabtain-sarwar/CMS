<?php include "includes/admin_header.php"; ?>

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
                        <small>Subheading</small>
                    </h1>

                    <div class="col-xs-6">
                        <?php   // Create and insert the categories
                            if(isset($_POST['submit'])) {
                                $cat_title =  $_POST['cat_title'];
                                if ($cat_title == "" || empty($cat_title)) {
                                    echo "This field should not be empty";
                                } else {
                                    $query = "INSERT INTO category(cat_title) VALUES ('$cat_title')";
                                    $result = mysqli_query($connection , $query);
                                    if (!$result) {
                                        die("QUERY FAILED" . mysqli_error($connection));
                                    } else {
                                        echo "Successfully inserted";
                                    }
                                }
                            }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" id="cat-title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <?php   // Delete the specified category
                            if(isset($_GET['delete'])) {
                                $id = $_GET['delete'];
                                $query = "DELETE FROM category WHERE cat_id = {$id}";
                                $result = mysqli_query($connection , $query);
                                if (!$result) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                                header("Location: categories.php");
                            }
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php   // Fetch all Categories
                                    $query = "SELECT * FROM category";
                                    $result = mysqli_query($connection , $query);
                                    if (!$result) {
                                      die("QUERY FAILED" . mysqli_error($connection));
                                    }
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['cat_id'];?></td>
                                    <td><?php echo $row['cat_title'];?></td>
                                    <td><a href="categories.php?delete=<?php echo $row['cat_id'];?>">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<?php include "includes/admin_footer.php"; ?>
