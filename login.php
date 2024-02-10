<?php

session_start();

//check if user is logged-in
if(isset($_SESSION['username'])){
    echo "<script>window.open('./admin_area/index.php', '_self')</script>";
}

include "./includes/connect_db.php";

//if form is submited
if(isset($_POST['login_user'])){

    //get form inputs
    $username_form = $_POST['username_form']; 
    $password_form = $_POST['password_form']; 

    //get the user that match the inputed username from form
    $user_data = mysqli_query($conn, "SELECT * FROM `user` WHERE username='$username_form'");

    //loop through all users data to scan for username and password that could be matched
    while ($fetch_data = mysqli_fetch_assoc($user_data)){
        $username = $fetch_data['username'];
        $password = $fetch_data['password'];
    }
    
    //counts the row that exist w/ the user data
    $user_count = mysqli_num_rows($user_data);

    //authenticate username and password
    if($username_form != $username || $password_form != $password){
        
        echo "<script>alert('Invalid Username or Password.')</script>";
    
    }else if($username_form == $username && $password_form == $password){

        //if username and password correct proceed to check if there is a user
        //if so set our session to that user inputed username($user_form).
        if($user_count > 0){

            //sets session equal to our inputed username from form
            $_SESSION['username'] = $username_form;

            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('./admin_area/index.php', '_self')</script>";

        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--FONT AWESOME CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

        /*small screen*/

        @media (max-width: 576px) {
            body {
                padding-left: 1.2rem;
                padding-right: 1.2rem;
            }
        }

    </style>

    <!--color palette
        
        orange - #F34414
        black - #262018
        background - #DED1B7
        
    -->

</head>

<body style="background-color: #DED1B7;">


    <div class="container my-3 py-3 mb-5 mt-5" 
        style="max-width: 440px; border-radius: 1rem; border: 1px solid #262018; 
        background-color: #262018;">

        <div class="text-center">
            <img src="./assets/user-logo.png" alt="" 
            style="height: 100px; border-radius: 50px; width: auto; margin-bottom: 20px; 
            margin-top: 5px; border: 3px solid #F34414;">
        </div>

        <h3 class="text-center mb-4" style="color: #F34414;">User Login</h3>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-12">

                <form method="post" class="">

                    <!--USERNAME-->
                    <div class="form-outline mb-3">
                        <i class="fa-solid fa-user" style="margin-right: 10px; color: #DED1B7;"></i>
                        <label for="user_username" class="form-label" style="color: #DED1B7;">Username</label>   
                        <input type="text" class="form-control rounded-0 bg-light" id="user_username" placeholder="username" 
                        autocomplete="off" required="required" name="username_form" style="color: #262018;" require>                
                    </div>

                    <!--PASSWORD-->
                    <div class="form-outline mb-3">
                        <i class="fa-solid fa-key" style="margin-right: 10px; color: #DED1B7;"></i>
                        <label for="password" class="form-label" style="color: #DED1B7;">Password</label>
                        <input type="password" class="form-control rounded-0 bg-light" id="user_password" placeholder="Type in your password" 
                        autocomplete="off" required="required" name="password_form" style="color: #262018;" require>
                    </div>
                    
                    <div class="mt-4">
                        <input type="submit" class="btn login-hover px-5 rounded-0 border-0" style="background: #F34414; color: #DED1B7;"
                        value="Login" name="login_user" >
                        
                        <div class="d-flex mt-2">
                            <p style="color: #DED1B7; margin-bottom: 0;">Don't have an Accoun?</p>
                            <a href="#" class="text-primary">Register here</a>
                        </div>

                        <div class="d-flex">
                            <p style="color: #DED1B7;">Forgot password?</p>
                            <a href="#" class="text-primary">Click here</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>