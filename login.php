<?php
include 'config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $db_conn->query($sql);

    if ($result->num_rows == 1) {
        // Verify the password
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['userid'] = $row['id'];

            // Redirect to index page after successful login
            if ($row['role'] == 1) {
                header('Location: admin/admin.php');
            }else{
                header('Location: user/dashboard.php');
            }
            
            exit;
        } else {
            // Incorrect password
            $error_message = 'Invalid email or password';
        }
    } else {
        // Email not found
        $error_message = 'Invalid email or password';
    }

    $db_conn->close();
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Land Bidding</title>
</head>
<body>
    <!-- Form -->
    <div class="container-fluid signup">
        <div class="row">
            <div class="col-md-6 side-one">
                <div class="form">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email or phone</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <p class="text" style="color:red;"> 
                                <?php 
                                    if(isset($error_message)){
                                        echo $error_message ;
                                    }
                                    
                                ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8"
                                required>
                            <label for="password" class="form-label">Forgot</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Sign In</button>
                        <div class="register">Don't have an account? Register</div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 side-two">
                <div class="side-img">
                    <img src="./img/sidelog.png" alt="" srcset="">
                </div>
                <div class="image">
                    <img src="./img/branch.png" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>

    <!-- End Form -->

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