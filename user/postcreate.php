<?php
session_start();
include "../config/db.php";

$target_dir = "../uploads/";
$imgname = "";
$userid = $_SESSION['userid'];

if (isset($_POST['title'])) {

    $target_file = $target_dir . basename($_FILES["pimg"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file)) {
        $imgname = basename($_FILES["pimg"]["name"]);
    } else {

    }

    $title = $_POST['title'];
    $des = $_POST['des'];
    $pimg = $imgname;
    $address = $_POST['address'];
    $lease = $_POST['lease'];
    $start = $_POST['start'];
    $town = $_POST['town'];
    $map = $_POST['map'];

    $sql = "INSERT INTO posts (title,des,pimg,address,lease,start,town,map,userid) VALUES ('$title','$des','$target_file','$address','$lease','$start','$town','$map','$userid')";

    if (mysqli_query($db_conn, $sql)) {
        header('location:createpost.php');
    } else {
        header('location:createpost.php.php');
    }
}

?>