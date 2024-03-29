<?php

include "./config/db.php";

$sql = "SELECT * FROM posts";

$result = mysqli_query($db_conn, $sql);
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
      <title>Land Bidding</title>
   </head>
   <body>
      <!-- Header -->
      <header>
      </header>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
         <div class="container-fluid px-4">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
      <!-- Post box -->
      <?php
      foreach ($result as $r) {
         ?>
         <div class="container post-box">
            <div class="row">
               <div class="col-lg-3">
                  <img src="./img/post1.png" alt="Image" class="img-fluid  mb-3">
               </div>
               <div class="col-lg-6">
                  <h2><?php echo $r['title'] ?></h2>
                  <p><?php echo $r['des'] ?></p>
               </div>
               <div class="col-lg-3">
                  <div class="text-end mb-3">
                     <span class="text-muted">Bidding pending</span>
                     <p><?php echo $r['start'] ?></p>
                     <a href="post.php?id=<?php echo $r['id'] ?>" class="btn btn-primary">See More</a>

                  </div>
               </div>
            </div>
         </div>
         <?php
      }
      ?>
      <!-- <div class="container post-box">
         <div class="row">
            <div class="col-lg-3">
               <img src="./img/post1.png" alt="Image" class="img-fluid  mb-3">
            </div>
            <div class="col-lg-6">
               <h2>Title</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse auctor, libero in tincidunt auctor, sapien nunc dictum purus, vel tristique tortor justo ut tellus. Sed eleifend quam nec tellus tempor, id ultrices nisl consectetur. Sed nec purus arcu. Nam eu turpis vitae ipsum fermentum suscipit vel vel libero.</p>
            </div>
            <div class="col-lg-3">
               <div class="text-end mb-3">
                  <span class="text-muted">April 24, 2023</span>
                  <p>Some text here</p>
                  <button class="btn btn-primary">See More</button>
               </div>
            </div>
         </div>
      </div> -->
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
         -->
   </body>
</html>