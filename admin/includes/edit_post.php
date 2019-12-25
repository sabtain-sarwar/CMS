<?php

    if (isset($_POST['update_post'])) {
        $post_id = $_GET['edit'];

        $post_title       = $_POST['title'];
        $post_author      = $_POST['author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status      = $_POST['post_status'];

        $post_image       = $_FILES['image']['name'];
        $post_image_temp  = $_FILES['image']['tmp_name'];
        /*print_r($_FILES); output : Array ( [image] => Array ( [name] => 3865967-wallpaper-full-hd_XNgM7er.jpg [type] => image/jpeg
        [tmp_name] => C:\xampp\tmp\phpCB86.tmp [error] => 0 [size] => 171741 ) )*/

        $post_tags        = $_POST['post_tags'];
        $post_content     = $_POST['post_content'];
        $post_date        = date('d-m-y');
        $post_comment_count = 4 ;

        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
            $result = mysqli_query($connection , $query);
            confirm($result);
            $get_post_img = mysqli_fetch_assoc($result);
            $post_image = $get_post_img['post_image'];
        } else {
            move_uploaded_file($post_image_temp , "../images/$post_image");
        }

        $query = "UPDATE posts SET";
        $query .= " post_title = '{$post_title}' , post_author = '{$post_author}' , post_category_id = '{$post_category_id}' , ";
        $query .= " post_status = '{$post_status}' , post_image = '{$post_image}' , post_tags = '{$post_tags}' , ";
        $query .= " post_content = '{$post_content}' , post_date = now() WHERE post_id = {$post_id}";
        $result = mysqli_query($connection , $query);
        confirm($result);
    }

    if(isset($_GET['edit'])) {
        $post_id = $_GET['edit'];
        $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
        $result = mysqli_query($connection, $query);
        confirm($result);
        $row = mysqli_fetch_assoc($result);
        //print_r($row);
    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control" value="<?php  echo $row['post_title'];?>">
    </div>

    <div class="form-group">
        <!-- the is good to have id bcz may be later on we want to style this select element but we can leave it empty and value attr value is the value that's
         going to get put in the name attr of select element -->
        <label for="categories">Categories</label>
        <select name="post_category_id" id="" class="form-control">
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
        <label for="title">Post Author<?php ?></label>
        <input type="text" class="form-control" name="author" value="<?php echo $row['post_author']; ?>">
    </div>

    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $row['post_status']; ?>">
    </div>

    <div class="form-group">
        <img src="../images/<?php echo $row['post_image']; ?>" alt="Image" width="100">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $row['post_tags']; ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $row['post_content']; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post" >
    </div>
</form>

<?php  ?>