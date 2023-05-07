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
   <!-- Include jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <!-- Include Bootstrap -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
   <!-- Include Bootstrap datepicker plugin -->
   <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
   <title>Land Bidding</title>
</head>

<body>
   <!-- Header -->
   <!--Main Navigation-->
   <header>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse ">
         <div class="position-sticky item">
            <div class="list-group list-group-flush mt-4">
               <p class="text-light px-4 my-3">Edit Profile</p>
               <p class="text-light px-4 my-3">Create Post</p>
               <p class="text-light px-4 my-3 py-2 ripple active">My bidding</p>
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
                  <h5>Ser Criston Cole's Account</h5>
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




   <!--Main layout-->
   <main style="margin-top: 58px;">
      <div class="mg pt-4"></div>

      <h1>My Biddings</h1>


      <div class="container my-4">
         <table class="table mx-auto" border="1">
            <thead>
               <tr>
                  <th>Bid Id</th>
                  <th>Date</th>
                  <th>Land</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>0245</td>
                  <td>18-Jan-2023</td>
                  <td>UNRESERVED AUCTION EVENT-<br>
                     HWY FRONTAGE LOT IN BANKEND
                     SK</td>
                  <td>Review</td>
               </tr>
               <tr>
                  <td>23252</td>
                  <td>18-Feb-2023</td>
                  <td>UNRESERVED AUCTION EVENT-<br>
                     HWY FRONTAGE LOT IN BANKEND
                     SK</td>
                  <td>Done</td>
               </tr>
            </tbody>
         </table>
      </div>

   </main>
   <!--Main layout-->


</body>

</html>