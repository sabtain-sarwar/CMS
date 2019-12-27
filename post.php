<?php include "includes/db.php"; ?>
<?php include "includes/header.php";  ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php
                if(isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                }
                $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
                $result = mysqli_query($connection , $query);
                confirmQuery($result);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <!-- Title -->
                <h1><?php echo $row['post_title']; ?></h1>
                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $row['post_author']; ?></a>
                </p>
                <hr>
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $row['post_date']; ?></p>
                <hr>
                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $row['post_image']; ?>" alt="">
                <hr>
                <!-- Post Content -->
                <p class="lead"><?php echo $row['post_content']; ?></p>
                <?php } ?>
                <hr>

                <!-- Blog Comments -->

                <?php
                    if (isset($_POST['create_comment'])) {
                        $comment_author      = $_POST['comment_author'];
                        $comment_email       = $_POST['comment_email'];
                        $comment_content     = $_POST['comment_content'];
                        $comment_post_id     = $_GET['p_id'];


                        $query = "INSERT INTO comments( comment_post_id , comment_author , comment_email , comment_content , comment_status , comment_date )" ;
                        $query .= " VALUES( $comment_post_id , '{$comment_author}' , '{$comment_email}' , '{$comment_content}' , 'unapproved' , now() )";
                        $result = mysqli_query( $connection , $query);
                        confirmQuery($result);
                    }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Comment -->
                <?php

                    $query = "SELECT * FROM comments WHERE comment_status = 'Approved' AND comment_post_id = {$post_id} ORDER BY comment_id DESC";
                    $result = mysqli_query($connection , $query);
                    confirmQuery($result);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $row['comment_author']; ?>
                            <small><?php echo $row['comment_date']; ?></small>
                        </h4>
                        <?php echo $row['comment_content']; ?>
                    </div>
                    <hr>
                </div>
                <?php } ?>
                <!-- Comment -->
                <?php // include "includes/nested_comment.php"; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div><!-- /.row -->

        <hr>
        <!-- Footer -->
        <?php include "includes/footer.php"; ?>