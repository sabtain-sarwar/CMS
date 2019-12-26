<?php

function confirmQuery($result) {
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

// Create and insert the categories
function insertCategories() {
    global $connection;
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
}


// Fetch all Categories
function findAllCategories() {
    global $connection;
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection , $query);
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['cat_id']}</td>";
        echo "<td>{$row['cat_title']}</td>";
        echo "<td><a href='categories.php?delete={$row['cat_id']}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$row['cat_id']}'>Edit</a></td>";
        echo "</tr>";
    }
}


// Delete the specified category
function deleteCategories() {
    global $connection;
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM category WHERE cat_id = {$id}";
        $result = mysqli_query($connection , $query);
        if (!$result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        header("Location: categories.php");
    }
}