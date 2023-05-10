<?php
session_start();
include "../config/db.php";

$id = $_SESSION['userid'];

$sql = "SELECT bids.*, posts.*
          FROM bids
          JOIN posts ON bids.postid = posts.id
          WHERE bids.userid = $id";

$result = mysqli_query($db_conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php" ?>
    <title>Document</title>
</head>

<body>


    <!-- include UserLayout.php -->
    <?php include "UserLayout.php" ?>

    <!--Main layout-->
    <main class="profile-data" style="margin-top: 15vh;">

        <div class="container mt-5">
            <div class="row">
               <h2>My Bidding</h2>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Bid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result as $r) { ?>
                                    <tr>
                                        <td><?php echo $r['title']; ?></td>
                                        <td><?php echo $r['bid']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>

</html>