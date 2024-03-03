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

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $get_education = mysqli_query($conn, "SELECT * FROM `tertiary_education` WHERE id=$id");
    
    while($fetch_data = mysqli_fetch_assoc($get_education)){
        $id = $fetch_data['id'];
        $course = $fetch_data['course'];
        $school = $fetch_data['school'];
        $street = $fetch_data['street'];
        $barangay = $fetch_data['barangay'];
        $city = $fetch_data['city'];
        $country = $fetch_data['country'];
        $postal_code = $fetch_data['postal_code'];
        $school_address = $fetch_data['school_address'];
        $school_year = $fetch_data['school_year'];
    }

    if(isset($_POST['save_changes'])){
        $form_course = $_POST['course'];
        $form_school = $_POST['school'];
        
        $form_street = $_POST['street'];
        $form_barangay = $_POST['barangay'];
        $form_city = $_POST['city'];
        $form_country = $_POST['country'];
        $form_postal_code = $_POST['postal_code'];

        $form_school_address = $form_street . ", " . $form_barangay . ", " . $form_city . ", " . $form_country . ", " . $form_postal_code;
        
        $form_school_year = $_POST['school_year'];

        $update_tbl = mysqli_query($conn, "UPDATE tertiary_education SET 
            course = '$form_course', 
            school = '$form_school', 
            street = '$form_street', 
            barangay = '$form_barangay', 
            city = '$form_city', 
            country = '$form_country', 
            postal_code = '$form_postal_code', 
            school_address = '$form_school_address',  
            school_year = '$form_school_year' WHERE id=$id");

            if($update_tbl) {
                echo "<script>alert('Tertiary Education Updated Successfully.')</script>";
                echo "<script>window.open('index.php#education', '_self')</script>";
            }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit tertiary education</title>

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

    <div data-aos="fade-right" class="container container-custom form-container" 
        style="margin-bottom: 3rem;">
        
        <h1 class="fs-5 mt-3">Edit tertiary education</h1>
        <hr>
        <form class="d-flex flex-column" method="post">
            
            <div class="container2 gap-1" style="display: flex;">
                <div class="w-100">
                    <label class="form-label" for="course">Course:</label>
                    <input class="form-control" type="text" id="course" value="<?php echo $course; ?>" name="course" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
                <div class="w-100">
                    <label class="form-label" for="school">School:</label>
                    <input class="form-control" type="text" id="school" value="<?php echo $school; ?>" name="school" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
            </div>

            <label class="mt-3 mb-2" style="display: flex;">School address</label>
            <div class="container2 d-flex gap-1">
                <div>
                    <label class="form-label" for="street">Street:</label>
                    <input class="form-control" type="text" id="street" value="<?php echo $street; ?>" name="street" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div>
                    <label class="form-label" for="barangay">Barangay:</label>
                    <input class="form-control" type="text" id="barangay" value="<?php echo $barangay; ?>" name="barangay" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div>
                    <label class="form-label" for="city">City/Province:</label>
                    <input class="form-control" type="text" id="city" value="<?php echo $city; ?>" name="city" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div>
                    <label class="form-label" for="country">Country:</label>
                    <input class="form-control" type="text" id="country" value="<?php echo $country; ?>" name="country" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div>
                    <label class="form-label" for="postal_code">Postal code:</label>
                    <input class="form-control" type="text" id="postal_code" value="<?php echo $postal_code; ?>" name="postal_code" 
                    style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
            </div>

            <label class="form-label mt-3" for="school_year">School year:</label>
            <input class="form-control" type="text" id="school_year" value="<?php echo $school_year; ?>" name="school_year" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7;" 
                    name="save_changes">Save changes</button>
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