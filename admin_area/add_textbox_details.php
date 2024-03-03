<?php

session_start();

include "../includes/connect_db.php";

if (!isset($_SESSION['username'])) {

    echo "<script>window.open('../login.php', '_self')</script>";
} else {
    $username = $_SESSION['username'];
    echo $username;

    $user_data = mysqli_query($conn, "SELECT * FROM `user` WHERE username='$username'");
    $fetch_user_data = mysqli_fetch_assoc($user_data);
    $user_id = $fetch_user_data['user_id'];

    echo "<br>User ID: " . $user_id;
}

if (isset($_POST['add_description'])) {
    $description = $_POST['about_me'];

    //update query
    $update_about = mysqli_query($conn, "INSERT INTO `more_about_me` (user_id, about_me) 
                                                VALUE ($user_id, '$description')");

    if ($update_about) {
        echo "<script>alert('About Author Successfully Added.')</script>";
        echo "<script>window.open('index.php#about', '_self')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add soft skill</title>

    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .form-container {
            background-color: #DED1B7;
            padding: 2rem;
            border: 1px solid #262018;
            border-radius: 1rem;
        }
    </style>

</head>

<body style="background-color: grey;">

    <div data-aos="fade-right" class="container form-container w-50" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">

        <h1 class="fs-5 mt-3">Get to know me more</h1>
        <p style="text-align: justify;">
            Tell us more about you.
        </p>
        <hr>
        <form class="d-flex flex-column" method="post">
            <div class="w-100">
                <label class="form-label" for="about_me">Write here:</label>
                <textarea class="form-control" type="text" id="about_me" name="about_me" placeholder="e.g.(Hobbies, work experiences, ideal job etc)." style="background-color: #DED1B7; border: 1px solid #262018; height: 230px;" required></textarea>
            </div>
            <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7;" name="add_description">Add this description</button>
        </form>

    </div>


    <!--AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>