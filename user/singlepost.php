<?php
session_start();
include "../config/db.php";

$userid = $_SESSION['userid'];

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = '$id'";

$result = mysqli_query($db_conn, $sql);

$bidsql = "SELECT MAX(bid) AS max_bid, userid, COUNT(*) AS bid_count FROM bids WHERE postid = $id";

$max = mysqli_query($db_conn,$bidsql);
$maxbid = "";
$muser = "";
$count = "";
foreach($max as $m){$maxbid = $m['max_bid']; $muser = $m['userid'];$count = $m['bid_count'];}

$musql = "SELECT name FROM users WHERE id = $muser";
$maxuser = mysqli_query($db_conn,$musql);
$musername = "";
foreach($maxuser as $mu){$musername = $mu['name'];}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>

    <!-- include UserLayout.php -->
    <?php include "UserLayout.php" ?>

    <!--Main layout-->
    <main class="profile-data" style="margin-top: 15vh;">

        <div class="container mt-5">

            <?php foreach ($result as $r) { ?>
                <div class="row">
                    <div class="col">
                        <!-- Bootstrap Carousel -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- Slides -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../uploads/<?php echo $r['pimg'] ?>" class="d-block w-100" alt="Slide 1">
                                </div>

                            </div>
                            <!-- Controls -->
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <div class="profile">
                                <!-- Profile Image -->
                                <div class="mt-4">
                                    <img src="./img/profile.png" alt="Profile Image" class="rounded-circle">
                                </div>
                                <!-- Buttons -->
                                <div class="mt-4">
                                    <button class="btn btn-primary">View Other Listings</button>
                                    <button class="btn btn-secondary">Chat with John</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <h2><?php echo $r['title'] ?></h2>
                        <p><?php echo $r['des'] ?></p>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-6">
                                <div class="box1">
                                    <h3>Property Details </h3>
                                    <p>Address : <?php echo $r['address'] ?></p>
                                    <p>Lease type : <?php echo $r['lease'] ?></p>
                                    <p>Start Date: <?php echo $r['start'] ?></p>
                                    <p>Nearest Town: <?php echo $r['town'] ?></p>
                                    <p>Map URL : <?php echo $r['map'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="box2">
                                    <h3>Bidding Details</h3>
                                    <div class="mt-4">
                                        <p>Current Bid : <?php echo $maxbid ?></p>
                                        <p>Bid Count : <?php echo $count ?></p>
                                        <p>Higher Bidder : <?php echo $musername ?></p>
                                        <p>Bidding Ends</p>
                                        
                                        <!-- <button class="btn btn-primary mr-2">View Bid History</button> -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Place BID
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>

        </div>

    </main>



    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Place BID</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Enter Your bid more than <?php echo $maxbid+1 ?></h4>
                    <form action="placebid.php" method="post">
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                        <input type="hidden" name="postid" value="<?php echo $id; ?>">
                        <div class="mb-3 mt-3">
                            <label for="bid" class="form-label">Enter your BID:</label>
                            <input type="number" min="<?php echo $maxbid+1 ?>" class="form-control" id="bid" placeholder="Enter your bid" name="bid">
                        </div>
                        <button class="btn btn-primary" type="submit">Place</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>