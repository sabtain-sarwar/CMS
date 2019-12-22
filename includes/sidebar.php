<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div> <!-- /.input-group -->
        </form>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <?php
            $query = "SELECT * FROM category";
            $result = mysqli_query($connection , $query);
            if (!$result) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<li><a href='#'> {$row['cat_title']} </a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>  <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "includes/widget.php"; ?>
</div>