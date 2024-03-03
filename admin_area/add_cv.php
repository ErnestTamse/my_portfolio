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

if(isset($_POST['add_my_cv'])){
    
    //selected image
    $my_cv = $_FILES['my_cv']['name'];
    $my_cv_tmp = $_FILES['my_cv']['tmp_name'];
       
    //getting the no. of error in uploading the file     
    $fileError = $_FILES['my_cv']['error'];     
    //Getting the file ext     
    $fileExt = explode('.', $my_cv);     
    $fileActualExt = strtolower(end($fileExt));     
    //Array of Allowed file type     
    $allowedExt = array("docx","pdf","png");     
    //Checking, Is file extentation is in allowed extentation array     
    if(in_array($fileActualExt, $allowedExt)){         
        
        //Checking, Is there any file error         
        if($fileError == 0){                          
            move_uploaded_file($my_cv_tmp, "./user_files/$my_cv");

            $insert_data = mysqli_query($conn, "INSERT INTO `user_cv` (user_id, my_cv) 
                                                VALUE ($user_id, '$my_cv')");
            
            if($insert_data) {
                echo "<script>alert('CV Successfully Added.')</script>";
                echo "<script>window.open('index.php#profile', '_self')</script>";
                }             
        }
    }else{             
        //Message, If there is some error             
        echo "<script>alert('The type of file you provided is not supported')</script>";         
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

        @media (max-width: 576px) {
            .container-custom {
                width: 90% !important;
            }
        }
    </style>

</head>

<body style="background-color: grey;">

    <div data-aos="fade-right" class="container container-custom form-container w-50" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">

        <h1 class="fs-5 mt-3">Plese select your CV file</h1>
        <hr>
        <form class="d-flex flex-column" method="post" enctype="multipart/form-data">
            <div class="w-100">
                <label class="form-label mt-3" for="my_cv">Click here to select file:</label>
                <input class="form-control" type="file" id="my_cv" name="my_cv" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>
            </div>
            <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7;" name="add_my_cv">Add CV</button>
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