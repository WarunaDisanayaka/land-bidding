<?php
session_start();
include "../config/db.php";

$target_dir = "../uploads/";
$imgname = "";
$userid = $_SESSION['userid'];

$errors = array();

if (isset($_POST['title'])) {

    $target_file = $target_dir . basename($_FILES["pimg"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file)) {
        $imgname = basename($_FILES["pimg"]["name"]);
    } else {
        header('location:createpost.php.php');
    }

    $title = $_POST['title'];
    $des = $_POST['des'];
    $pimg = $imgname;
    $address = $_POST['address'];
    $lease = $_POST['lease'];
    $start = $_POST['start'];
    $town = $_POST['town'];
    $map = $_POST['map'];

    // Validate post title
    if (empty($title)) {
        $errors[] = "Post title is required";
    } elseif (strlen($title) > 255) {
        $errors[] = "Post title cannot exceed 255 characters";
    }

    // Validate post description
    if (empty($des)) {
        $errors[] = "Post description is required";
    }

    // Validate post image
    if (empty($_FILES['pimg']['name'])) {
        $errors[] = "Post image is required";
    } elseif (!in_array(strtolower(pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'png', 'gif'))) {
        $errors[] = "Invalid file format. Only JPG, JPEG, PNG and GIF files are allowed";
    }

    // Validate address
    if (empty($address)) {
        $errors[] = "Address is required";
    }

    // Validate lease type
    if (empty($lease)) {
        $errors[] = "Lease type is required";
    }

    // Validate start date
    if (empty($start)) {
        $errors[] = "Start date is required";
    }

    // Validate nearest town
    if (empty($town)) {
        $errors[] = "Nearest town is required";
    }

    // Validate map URL
    if (empty($map)) {
        $errors[] = "Map URL is required";
    } elseif (!filter_var($map, FILTER_VALIDATE_URL)) {
        $errors[] = "Invalid map URL";
    }


    $sql = "INSERT INTO posts (title,des,pimg,address,lease,start,town,map,userid) VALUES ('$title','$des','$pimg','$address','$lease','$start','$town','$map','$userid')";

    if (mysqli_query($db_conn, $sql)) {

    } else {

    }
}

?>