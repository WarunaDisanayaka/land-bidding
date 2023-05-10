<?php
session_start();
include "../config/db.php";

$userid = $_SESSION['userid'];
$target_dir = "../uploads/";
$errors = array();

if (isset($_POST['title'])) {

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


    if (empty($errors)) {

        $target_file = $target_dir . basename($_FILES["pimg"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file)) {
            $imgname = basename($_FILES["pimg"]["name"]);
        } else {
            $errors[] = "Cant upload";
        }

        $sql = "INSERT INTO posts (title,des,pimg,address,lease,start,town,map,userid) VALUES ($title,$des,$pimg,$address,$lease,$start,$town,$map,$userid)";

        if (mysqli_query($db_conn, $sql)) {

        } else {

        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header.php" ?>
    <title>Land Bidding</title>
</head>
<body>

    <!-- include UserLayout.php -->
    <?php include "UserLayout.php" ?>

    <!--Main layout-->
    <main style="margin-top: 15vh;">

        <div class="container-fluid mt-5">
        <?php
        // Form is invalid. Show the errors to the user.
        if (!empty($errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
        }
        ?>
        
            <div class="row mt-3 mb-5">
                <!-- <h2>Create new Post</h2> -->  
            </div>
            <form action="postcreate.php" method="POST" enctype="multipart/form-data">
                <div class="row mt-5 mb-3">
                    <h3 class="text-center">Create post</h3>
                    <div class="col-sm-6 mx-auto mt-5">
                        <div class="col cp-box">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control" aria-label="First name" name="title">
                        </div>
                        <div class="col cp-box">
                            <label for="">Post Description</label>
                            <textarea class="form-control" name="des" placeholder="Leave a comment here"  style="height: 100px"></textarea>
                        </div>
                        <div class="col cp-box">
                            <label for="">Post Image</label>
                            <input type="file" class="form-control" name="pimg">
                        </div>
                    </div>

                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-sm-6 mx-auto cp-box">
                        <div class="col mt-2 mb-2">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="col mt-2 mb-2">
                            <label for="">Lease Type</label>
                            <input type="text" name="lease" class="form-control">
                        </div>
                        <div class="col mt-2 mb-2">
                            <label for="">Start Date</label>
                            <input type="date" name="start" class="form-control">
                        </div>
                        <div class="col mt-2 mb-2">
                            <label for="">Nearest Town</label>
                            <input type="text" name="town" class="form-control">
                        </div>
                        <div class="col mt-2 mb-2">
                            <label for="">Map URL</label>
                            <textarea class="form-control" name="map" style="height: 100px"></textarea>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-sm-6 mt-2 mb-2 mx-auto">
                    <input type="submit" class="btn btn-success cpbtn" name="cpost" value="Submit">
                </div>
            </form>



        </div>

    </main>
    <!--Main layout-->

    <style>
        input.btn.btn-success.cpbtn{
            width:8rem;
            border-radius:2rem;
            margin-left:30rem;
        }
        .cp-box {
            padding: 15px;
            margin: 15px;
            margin-left: 5px;
            width:600px;
            /* background-color: #21CC5B; */
            background: rgba(33, 204, 91, 0.35);
        }
    </style>


    <script>
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>


    



</body>

</html>