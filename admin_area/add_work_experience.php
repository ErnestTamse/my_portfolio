<?php

session_start();

include "../includes/connect_db.php";

if(!isset($_SESSION['username'])){

    echo "<script>window.open('../login.php', '_self')</script>";

}else{
    $username = $_SESSION['username'];
    echo $username;

    $user_data = mysqli_query($conn, "SELECT * FROM `user` WHERE username='$username'");
    $fetch_user_data = mysqli_fetch_assoc($user_data);
    $user_id = $fetch_user_data['user_id'];

    echo "<br>User ID: " . $user_id;
}

if(isset($_POST['add_work_experience'])){
    $company = $_POST['company'];
    $position = $_POST['position'];
    $company_address = $_POST['company_address'];
    $started_form = $_POST['started_from'];
    $up_to = $_POST['up_to'];
    $employment_period = $started_form . " - " . $up_to;

    $insert_data = mysqli_query($conn, "INSERT INTO 
        `work_experience` (user_id, company_name, position, company_address, employment_period) 
        VALUE ($user_id, '$company', '$position', '$company_address', '$employment_period')");

        if($insert_data) {
            echo "<script>alert('Work Experiece Successfully Added.')</script>";
            echo "<script>window.open('index.php#work_experience', '_self')</script>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            .container2 {
                display: flex;
                flex-direction: column;
            }
        }
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container container-custom form-container w-50" 
        style="margin-bottom: 3rem;">
        
        <h1 class="fs-5 mt-3">Add work experience</h1>
        <hr>
        <form class="d-flex flex-column" method="post">
            <label class="form-label" for="company">Company:</label>
            <input class="form-control" type="text" id="company" name="company" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="position">Position:</label>
            <input class="form-control" type="text" id="position" name="position" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="company_address">Company address:</label>
            <input class="form-control" type="text" id="company_address" name="company_address" 
            
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3">Employment period:</label>
            <div class="container2 d-flex gap-1">
                <div class="w-100">
                    <label class="form-label">Started from:</label>
                    <input class="form-control" type="text" name="started_from" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" placeholder="month, year" required>
                </div>
                <div class="w-100">
                    <label class="form-label">Up to:</label>
                    <input class="form-control" type="text" name="up_to" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" placeholder='Write "present" if currently employed' required>
                </div>
            </div>

            <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7;" 
                    name="add_work_experience">Add work experience</button>
        </form>

    </div>


<!--AOS-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>