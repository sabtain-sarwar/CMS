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

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM posts";
                                $result = mysqli_query($connection , $query);
                                if (!$result) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                        echo "<td>{$row['post_id']}</td>";
                                        echo "<td>{$row['post_author']}</td>";
                                        echo "<td>{$row['post_title']}</td>";
                                        echo "<td>{$row['post_category_id']}</td>";
                                        echo "<td>{$row['post_status']}</td>";
                                        echo "<td><img src='../images/{$row['post_image']}' width='100' alt='Image'></td>";
                                        echo "<td>{$row['post_tags']}</td>";
                                        echo "<td>{$row['post_comment_count']}</td>";
                                        echo "<td>{$row['post_date']}</td>";
                                    echo "</tr>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<?php include "includes/admin_footer.php"; ?>