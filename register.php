<?php

include 'config/db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $id_proof = $_FILES['id-proof'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate form data
    $errors = array();

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    if (empty($phone)) {
        $errors[] = 'Phone is required';
    }

    if (empty($dob)) {
        $errors[] = 'Date of Birth is required';
    }

    if (empty($gender)) {
        $errors[] = 'Gender is required';
    }

    if (empty($address)) {
        $errors[] = 'Address is required';
    }

    // Validate image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'webp');
    $file_extension = pathinfo($id_proof['name'], PATHINFO_EXTENSION);
    if (empty($id_proof['name']) || !in_array($file_extension, $allowed_extensions)) {
        $errors[] = 'Invalid image. Please choose a valid image file (jpg, jpeg, or png) with a maximum size of 2MB.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required';
    } elseif (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match';
    }

    // Generate a secure hash of the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Display errors
    if (!empty($errors)) {
        echo '<div class="alert alert-danger" style="position:absolute;width:40rem; margin-top:-1rem; margin-left:2rem;">';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }

    // If there are no errors, insert data into database
    if (empty($errors)) {

        if (!$db_conn) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        // Move the uploaded document to the upload path
        $uploadPath = 'uploads/'; // set your upload path here
        $filename = uniqid() . '_' . $id_proof['name'];
        $destination = $uploadPath . $filename;
        if (!move_uploaded_file($document['tmp_name'], $destination)) {
            $errors[] = 'Failed to upload the document. Please try again.';
        }

        // Prepare insert query
        $query = "INSERT INTO users (name, email, phone, dob, gender, address,id_proof, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($db_conn, $query);

        if (!$stmt) {
            die('Database error: ' . mysqli_error($db_conn));
        }

        mysqli_stmt_bind_param($stmt, 'ssdsssss', $name, $email, $phone, $dob, $gender, $address, $filename, $password);


        // Execute insert query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to success page
            header('Location: success.php');
            exit;
        } else {
            die('Database error: ' . mysqli_error($db_conn));
        }
    }
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
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Land Bidding</title>
</head>

<body>
    <!-- Form -->
   
    <div class="container-fluid signup">
        
        <div class="row">
            
            <div class="col-md-6 side-one">
                <div class="form">
                    
                
                    <form action="register.php" method="POST" enctype="multipart/form-data">
                    
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" >
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" >
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" >
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="id-proof" class="form-label">ID Proof</label>
                            <input type="file" class="form-control" id="id-proof" name="id-proof">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8"
                                >
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                                minlength="8" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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