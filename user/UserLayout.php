<?php

session_start();

$name = $_SESSION['name'];

?>
<!-- Header -->
   <!--Main Navigation-->
   <header>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse ">
         <div class="position-sticky item">
         <div class="list-group list-group-flush mt-4">
                    <p class="text-light px-4 my-3 py-2 ripple active"> <a href="index.php">Edit Profile</a> </p>
                    <p class="text-light px-4 my-3"><a href="createpost.php">Create Post</a></p>
                    <p class="text-light px-4 my-3 "><a href="mybidding.php">My bidding</a></p>
                </div>
         </div>
      </nav>
      <!-- Sidebar -->

      <!-- Navbar -->
      <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
         <!-- Container wrapper -->
         <div class="container-fluid">


            <!-- Brand -->
            <a class="navbar-brand" href="#">
               <img src="../img/logo.png" class="logo" alt="MDB Logo" loading="lazy" />
            </a>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row ">

               <!-- Name -->
               <a class="nav-link text-light" href="#">
                  <h5><?php echo $name ?>'s Account</h5>
               </a>

               <!-- Icon -->
               <a class="navbar-brand " href="#">
                  <img src="user.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
               </a>
            </ul>
         </div>

         <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->
   </header>
   <!--Main Navigation-->