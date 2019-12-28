<?php  session_start(); ?>

<?php
    // We are cancelling sessions by assigning a boolean value of null
    $_SESSION['username']   = null;
    $_SESSION['firstname']  = null;
    $_SESSION['lastname']   = null;
    $_SESSION['user_role']  = null;

    header("Location: ../index.php");
?>