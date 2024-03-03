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

    //query data
    $get_user = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id=$user_id");

    //fetch data
    while ($fetch_user = mysqli_fetch_assoc($get_user)){
        $user_fullname = $fetch_user['full_name'] ?? "Empty field";
        $surname = $fetch_user['surname'] ?? "Empty field";
        $given_name = $fetch_user['given_name'] ?? "Empty field";
        $middle_initial = $fetch_user['middle_name'] ?? "Empty field";
        $gmail = $fetch_user['gmail'] ?? "Empty field";
        $fb_link = $fetch_user['fb_link'] ?? "Empty field";
        $mobile_number = $fetch_user['mobile_number'] ?? "Empty field";
        $address = $fetch_user['user_address'] ?? "Empty field";
    }

    if(isset($_POST['save_changes'])){
        $surname_form = $_POST['surname_form'];
        $given_name_form = $_POST['given_name_form'];
        $middle_name_form = $_POST['middle_name_form'];
        $gmail_form = $_POST['gmail_form'];
        $fb_link_form = $_POST['fb_link_form'];
        $contact_number_form = $_POST['contact_number_form'];
        $address_form = $_POST['address_form'];
        
        $fullname = $given_name_form . " " . $middle_name_form . "." . $surname_form;
        
        //update query
        $update_skill = mysqli_query($conn, "UPDATE user SET 
                full_name = '$fullname', surname = '$surname_form',
                given_name = '$given_name_form', middle_name = '$middle_name_form',
                gmail = '$gmail_form', fb_link = '$fb_link_form',
                mobile_number = '$contact_number_form', user_address = '$address_form' 
                WHERE user_id=$user_id");

            if($update_skill) {
                echo "<script>alert('Personal Information Successfully Updated.')</script>";
                echo "<script>window.open('index.php#profile', '_self')</script>";
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage personal info</title>

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
                flex-direction: column !important;
            }
            .container3 {
                width: 100% !important;
            }
        }
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container container-custom form-container w-100" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        
        <h1 class="fs-5 mt-3">Manage your information</h1>
        <hr>
        <form class="d-flex flex-column" method="post">
            
            <!--fullname-->
            <div class="container2 d-flex gap-1">
                <div class="w-100">
                    <label class="form-label" for="surname_form">Surname:</label>
                    <input class="form-control" type="text" id="surname_form" value="<?php echo $surname; ?>" name="surname_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div class="w-100">
                    <label class="form-label" for="given_name_form">Given name:</label>
                    <input class="form-control" type="text" id="given_name_form" value="<?php echo $given_name; ?>" name="given_name_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div class="container3 w-50">
                    <label class="form-label" for="middle_name_form">Middle initial:</label>
                    <input class="form-control" type="text" id="middle_name_form" value="<?php echo $middle_initial; ?>" name="middle_name_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
            </div>

            <!--contact-->
            <div class="container2 d-flex gap-1 mt-3">
                <div class="w-100">
                    <label class="form-label" for="gmail_form">Gmail:</label>
                    <input class="form-control" type="text" id="gmail_form" value="<?php echo $gmail; ?>" name="gmail_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div class="w-100">
                    <label class="form-label" for="fb_link_form">Facebook link:</label>
                    <input class="form-control" type="text" id="fb_link_form" value="<?php echo $fb_link; ?>" name="fb_link_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>

                <div class="w-100">
                    <label class="form-label" for="contact_number_form">Contact number:</label>
                    <input class="form-control" type="text" id="contact_number_form" value="<?php echo $mobile_number; ?>" name="contact_number_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
            </div>

            <!--address-->
            <div>
                <div class="w-100 mt-3">
                    <label class="form-label" for="address_form">Complete address:</label>
                    <input class="form-control" type="text" id="address_form" value="<?php echo $address; ?>" name="address_form" 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
            </div>

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