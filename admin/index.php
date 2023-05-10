<?php
include "../config/db.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($db_conn, $sql);


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
                    <p class="text-light px-4 my-3 py-2 ripple active"> <a href="index.php">View Users</a> </p>
                    <p class="text-light px-4 my-3"><a href="postapprovevals.php">Post Approvals</a></p>
                    <p class="text-light px-4 my-3 "><a href="index.php">View bidding history</a></p>
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
                        <h5>Admin Account</h5>
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
    <main class="profile-data" style="margin-top: 15vh;">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2>View all users</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $r) { ?>
                                        <tr>
                                            <td><?php echo $r['name']; ?></td>
                                            <td>
                                                <select>
                                                    <option>Active</option>
                                                </select>
                                        </td>
                                        </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!--Main layout-->
    <script>
        $(function () {
            $('#datepicker').datepicker();
        });
    </script>
</body>

</html>