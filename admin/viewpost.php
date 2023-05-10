<?php
    session_start();
    include "../config/db.php";

    $id = $_SESSION['userid'];

    $sql = "SELECT * FROM posts WHERE userid = '$id'";

    $result = mysqli_query($db_conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php" ?>
    <title>View Post</title>
</head>

<body>

    <!-- include UserLayout.php -->
    <?php include "UserLayout.php" ?>

    <!--Main layout-->
    <main class="profile-data" style="margin-top: 15vh;">

        <div class="container mt-5">
        <?php foreach($result as $r) { ?>
            <div class="row post-box">
                <div class="col-lg-3">
                    <img src="../uploads/<?php echo $r['pimg'] ?>" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $r['title'] ?></h2>
                    <p><?php echo $r['des'] ?></p>
                </div>
                <div class="col-lg-3">
                    <div class="">
                        <span class="text-muted"><?php echo $r['start'] ?></span>
                        <p><?php echo $r['town'] ?></p>
                        <a href="singlepost.php?id=<?php echo $r['id'] ?>" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>

    </main>

</body>

</html>