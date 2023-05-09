<?php $ms = ""; ?>

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
    <main class="profile-data" style="margin-top: 15vh;">

        <div class="container-fluid mt-5">

            <div class="row mt-3 mb-5">
                <!-- <h2>Create new Post</h2> -->
                <?php
                if (isset($ms)) { ?>
                    <div class="alert alert-success">
                        <?php echo $ms ?>
                    </div>
                <?php }
                ?>
            </div>
            <form action="postcreate.php" method="post" enctype="multipart/form-data">
                <div class="row mt-5 mb-3">
                    <h3 class="text-center">Create post</h3>
                    <div class="col-sm-6 mx-auto mt-5">
                        <div class="col cp-box">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control" aria-label="First name" name="title">
                        </div>
                        <div class="col cp-box">
                            <label for="">Post Description</label>
                            <textarea class="form-control" name="des" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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
            background-color: #21CC5B;
        }
    </style>


    <script>
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>


    



</body>

</html>