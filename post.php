<?php

include "./config/db.php";

if (isset($_GET['id'])) {
   $post_id = $_GET['id'];

   $sql = "SELECT * FROM posts WHERE id='$post_id'";

   $result = mysqli_query($db_conn, $sql);

}

?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
   <title>Land Bidding</title>
</head>

<body>
   <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-light fixed-top post-nav">
      <div class="container-fluid px-4">
         <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Home<i class="fas fa-home"></i> </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Lands<i class="fas fa-map-pin"></i> </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">About Us<i class="fas fa-user"></i> </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Services<i class="fas fa-user"></i> </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us<i class="fas fa-reply"></i> </a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <div class="container post-content">
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
                     <img src="./img/postimg.png" class="d-block w-100" alt="Slide 1">
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
         <?php
         while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="details">
               <h2><?php echo $row['title'] ?></h2>
               <p><?php echo $row['des'] ?></p>
            </div>
            <div class="col">
               <div class="row">
                  <div class="col-6">
                     <div class="box1">
                        <h3>Property Details</h3>
                        <p>Address :<?php echo $row['address'] ?></p>
                        <p>Lease type :<?php echo $row['lease'] ?></p>
                        <p>Start Date: <?php echo $row['start'] ?></p>
                        <p>Nearest Town: <?php echo $row['town'] ?></p>
                        <p>Map URL: <?php echo $row['map'] ?></p>
                     </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-6">
                     <div class="box2">
                        <h3>Bidding Details</h3>
                        <div class="mt-4">
                           <p>Current Bid</p>
                           <p>Bid Count</p>
                           <p>Higher Bidder</p>
                           <p>Bidding Ends</p>
                           <p>Map URL</p>
                           <button class="btn btn-primary mr-2">View Bid History</button>
                           <button class="btn btn-secondary">Place Bids</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
         }
         ?>
      </div>
   </div>
   <!-- Footer -->
   <footer class="text-white">
      <div class="container">
         <div class="social-icons">
            <div class="row">
               <div class="col-lg-3">
                  <a href="#">
                     <img src="./img/Facebook.png" height="50" width="50" alt="Facebook">
                  </a>
               </div>
               <div class="col-lg-3" style="margin-top: 5px; margin-bottom: 5px;">
                  <a href="#">
                     <img src="./img/Twitter.png" height="50" width="50" alt="Twitter">
                  </a>
               </div>
               <div class="col-lg-3" style="margin-top: 5px; margin-bottom: 5px;">
                  <a href="#">
                     <img src="./img/Tik Tok.png" height="50" width="50" alt="TikTok">
                  </a>
               </div>
               <div class="col-lg-3">
                  <a href="#">
                     <img src="./img/Instagram.png" height="50" width="50" alt="Instagram">
                  </a>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-lg-12">
               <p class="text-center">&copy; 2023 Land Bidding. All rights reserved.</p>
            </div>
         </div>
      </div>
   </footer>
   <!-- Optional JavaScript; choose one of the two! -->
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
         -->
</body>

</html>