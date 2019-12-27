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

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div><!-- /.row -->


        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
