<?php

include "../config/db.php";

if (isset($_POST['bid'])) {
    $userid = $_POST['userid'];
    $postid = $_POST['postid'];
    $bid = $_POST['bid'];

    $sql = "INSERT INTO bids (userid, postid, bid) VALUES ('$userid','$postid','$bid')";

    if (mysqli_query($db_conn, $sql)) {
       header('location:viewpost.php');
    } else {
        header('location:viewpost.php');
    }
}
