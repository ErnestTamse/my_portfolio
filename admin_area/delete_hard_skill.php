<?php

include "../includes/connect_db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $get_work = mysqli_query($conn, "SELECT * FROM `hard_skills` WHERE id=$id");
    
    if(isset($_POST['delete_data'])){

        $delete_row = mysqli_query($conn, "DELETE FROM hard_skills WHERE id=$id");

            if($delete_row) {
                echo "<script>alert('Skill Successfully Deleted.')</script>";
                echo "<script>window.open('index.php#hard_skills', '_self')</script>";
            }
    }else if(isset($_POST['cancel'])) {

        echo "<script>window.open('index.php#skills', '_self')</script>";
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete hard skill</title>

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
        }
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container container-custom form-container w-50" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        
        <h1 class="fs-5 mt-3">Are you sure you want to delete this skill?</h1>
        <hr>
        <form class="d-flex flex-column" method="post">    
            <div class="d-flex gap-1 justify-content-center">
                <div>
                    <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7; width: 100px;" 
                            name="delete_data">Delete</button>
                </div>
                <div>
                    <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7; width: 100px;" 
                            name="cancel">Cancel</button>
                </div>
            </div>
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