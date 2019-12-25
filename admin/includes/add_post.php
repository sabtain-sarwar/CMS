
<?php
if(isset($_POST['create_post'])){
    $post_title       = $_POST['title'];
    $post_author      = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status      = $_POST['post_status'];

    $post_image       = $_FILES['image']['name'];
    $post_image_temp  = $_FILES['image']['tmp_name'];

    $post_tags        = $_POST['post_tags'];
    $post_content     = $_POST['post_content'];
    $post_date        = date('d-m-y');
    $post_comment_count = 4 ;

    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO posts( post_title , post_author , post_category_id , post_status , post_image  , post_date , post_tags , post_content , post_comment_count)" ;
    $query .= " VALUES('$post_title' , '$post_author' , $post_category_id , '$post_status' , '{$post_image}' , now() , '$post_tags' , '$post_content' , '$post_comment_count')";
    $result = mysqli_query( $connection , $query);
    confirm($result);
}
?>


<!-- entype is incharge of sending different form data -->
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter Title">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category_id" id="" class="form-control" style="width:130px">
            <?php
            $query = "SELECT * FROM category";
            $result = mysqli_query($connection , $query);
            confirm($result);
            while ($row1 = mysqli_fetch_assoc($result)) {
                $cat_id     = $row1['cat_id'];
                $cat_title  = $row1['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author" placeholder="Enter Author Name">
    </div>

    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <!--<div class="form-group">
        <select name="post_status" id="" class="form-control" style="width:130px">
            <option value='draft'>Post Status</option>
            <option value='published'>Publish</option>;
            <option value='draft'>Draft</option>;
        </select>
    </div>-->


    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" placeholder="Enter Post Tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" col="30" row="10">
  </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post" >
    </div>
</form>