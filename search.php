<?php include "includes/db.php"; ?>
<?php include "includes/header.php";  ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                // we use string on the search variable in the query bcz the data that is coming in is string
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($result);
                if ($count == 0) {
                    echo "<h1>No Results</h1>";
                } else {

                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $row['post_title']; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $row['post_author']; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $row['post_date']; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $row['post_image']; ?>" alt="">
                    <hr>
                    <p><?php echo $row['post_content']; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                    <?php
                    }
                }
            } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>
    </div> <!-- /.row -->

    <hr>

<?php include "includes/footer.php"; ?>