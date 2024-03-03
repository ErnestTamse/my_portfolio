<?php

session_start();
include "../includes/connect_db.php";

if(!isset($_SESSION['username'])){

    echo "<script>window.open('../login.php', '_self')</script>";

}else{
    $username = $_SESSION['username'];
    //echo $username;

    $user_data = mysqli_query($conn, "SELECT * FROM `user` WHERE username='$username'");
    $fetch_user_data = mysqli_fetch_assoc($user_data);
    
    $user_id = $fetch_user_data['user_id'];
    //echo "<br>User ID: " . $user_id;

    $user_fullname = $fetch_user_data['full_name'];
    $user_given_name = $fetch_user_data['given_name'];
    $user_surname = $fetch_user_data['surname'];

    $user_gmail = $fetch_user_data['gmail'];
    $user_fb_link = $fetch_user_data['fb_link'];
    $user_contact_number = $fetch_user_data['mobile_number'];
}

if(isset($_POST['logout'])){
    session_destroy();
    echo "<script>window.open('../login.php', '_self')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin paget</title>

    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Google fonts-->
    <!--Anton-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!--Antonio-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio&display=swap" rel="stylesheet">

    <!--Allan-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allan:wght@400;700&display=swap" rel="stylesheet">

    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--typed.js-->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <style>

        *{
            margin: 0;
            padding: 0;
        }

        p, h1 {
            margin: 0;
            padding: 0;
        }

        /*SECTIONS*/
        section {
            margin: 0 10rem;
            margin-bottom: 50vh;
            box-sizing: border-box;
            min-height: fit-content;
        }

        /*profile section*/
        
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5rem;
        }
        .profile-container img {
            border-radius: 50%;
            min-width: 100%;
            width: 420px;
            height: 420px;
            object-fit: cover;
            border: solid 2px #262018;
        }
        .profile-sub-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .profile-btn-container {
            margin-top: 2rem;
        }

        .about-image {
            width: 300px;
            height: 300px;
            border-radius: 1rem;
            object-fit: cover;
            border: 1.5px solid #262018;
        }

        .education-container {
            background-color: #262018;
            color: #DED1B7;
            border-bottom: 1px solid #DED1B7;
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
        }

        .th-custom {
            background-color: #262018 !important;
            color: #DED1B7 !important;
        }

        /*color palette
        
        orange - #F34414
        black - #262018
        background - #DED1B7
        
        */

        .btn-edit {
            border: 1px solid #262018;
        }

        .btn-delete {
            background-color: #262018;
        }

        .btn-add {
            border: none; 
            background-color: #262018;
        }

        /*hovers*/

        .btn-edit:hover, 
        .btn-delete:hover, 
        .btn-add:hover {
            background-color: #F34414;
        }

        .btn-download, .btn-custom {
            background-color: #F34414;
            color: white;
        }

        @media (max-width: 576px) {

            .custom-brand {
                font-size: 22px !important;
            }

            .content-warapper{
                max-width: fit-content;
                margin-inline: auto;
                align-items: center !important;
            }
            
            .profile-container {
                margin-top: 10vh;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .profile-container img {
                width: 160px;
                height: 160px;
                margin-bottom: 0;
            }
            
            .profile-container img {
                width: 160px;
                height: 160px;
                margin-bottom: 0;
            }

            .profile-container p {
                font-size: 1rem;
            }

            .profile-container h1 {
                font-size: 2rem;
            }

            .profile-sub-container button {
                font-size: 1rem;
            }

            .profile-btn-container {
                display: flex;
                gap: .2rem;
                margin-top: 1rem;
            }

            .profile-btn-container button {
                width: 130px;
                border-radius: 20px;
            }

            .profile_text {
                font-size: 18px !important;
            }

            .about-container {
                display: flex;
                flex-direction: column;
            }
            .about-image {
                width: 200px;
                height: 200px;
                object-fit: contain;
                border-radius: 1rem;
            }

            .educational-container {
                grid-template-columns: 1fr !important;
                gap: 1rem;
            }
        }

        .btn-download,
        .btn-custom {
            background: #f12711;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #f5af19, #f12711);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #f5af19, #f12711); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
            border: none;
            -webkit-box-shadow: 2px 2.5px 10px -2.5px #91856c;
            -moz-box-shadow: 2px 2.5px 10px -2.5px #91856c;
            box-shadow: 2px 2.5px 10px -2.5px #91856c;
        }

    </style>

</head>
<body style="background-color: #DED1B7;">

    <!--Modals-->

    <!-- Logout Modal-->
    <div class="modal fade" id="confirmLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #DED1B7; border:1px solid #262018;">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to logout?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form method="post">
                    <input class="btn" type="submit" value="Logout" name="logout" 
                            style="background-color: #262018; color:#DED1B7;">
                </form>                
            </div>
        </div>
        </div>
    </div>
    
    <!--Modals end-->

    <!--NAVBAR-->

    <nav class="navbar navbar-expand-lg nav-bar-custom" id="profile">
        <div class="container">
            <a class="navbar-brand custom-brand" style="font-size: 2.25rem; font-family: antonio;">Portfolio Admin page</a>
            <button class="navbar-toggler border-0 toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 1.5rem;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#profile">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <!--data-bs-toggle="modal" data-bs-target="#confirmLogout" triggers our modal-->
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#confirmLogout" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="content-warapper" style="padding-bottom: 10vh;">

    <div id="profile" class="container">

        <div class="profile-container">
            
            <?php

            $get_profile_pic = mysqli_query($conn, "SELECT profile_picture FROM `user` WHERE user_id=$user_id");
            $fetch_profile_picture = mysqli_fetch_assoc($get_profile_pic);

            // Use null-safe assignment operator and default value for clarity
            $user_profile_picture = $fetch_profile_picture['profile_picture'] ?? './assets/default_user_image.jpg';

            // Handle both null and empty string directly for robustness
            if (is_null($user_profile_picture) || $user_profile_picture === '') {
                echo '
                <div>
                    <img src="../assets/default_user_image.jpg" alt="" onclick="addProfile()" 
                    style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                </div>
                ';
            } else {
                echo '
                <div>
                    <img src="./user_images/' . $user_profile_picture . '" alt="" onclick="changeProfile()" 
                    style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                </div>
                ';
            }

            ?>

            <script>
                function addProfile() {
                    //when profile image clicked redirect to a page    
                    window.location.href = "add_profile_picture.php";
                }
                function changeProfile() {
                    //when profile image clicked redirect to a page    
                    window.location.href = "change_profile_picture.php";
                }
            </script>

            <div class="profile-sub-container">
                
                <div class="text-center">
                    <p class="profile_text" style="font-size: 1.75rem; font-family: antonio;">Welcome to admin page</p>
                    <h1 style="color: #F34414; font-family: anton;"><?php echo $user_given_name . " " . $user_surname ?></h1>
                    <p class="profile_text" style="font-size: 1.75rem; font-family: antonio;"><span id="element"></span></p>
                </div>

                <!-- Element to contain animated typing -->
                    <!--<span id="element"></span>-->

                    <!-- Setup and start animation! -->
                    <script>
                    var typed = new Typed('#element', {
                        strings: ['Pickup where you left with', 'Update your data', 'Manage your information'],
                        typeSpeed: 40,
                    });
                    </script>

                <div class="profile-btn-container">

                <?php

                $get_cv = mysqli_query($conn, "SELECT * FROM `user_cv` WHERE user_id=$user_id");
                $cv_count = mysqli_num_rows($get_cv);

                if ($cv_count == 0 || $cv_count == ""){

                    //if row user_cv is empty, propt user to add CV
                    echo '
                        <a class="btn btn-download" href="add_cv.php">
                            Add your CV
                        </a>
                    ';

                }else{

                    while($fetch_cv = mysqli_fetch_assoc($get_cv)){
                        $cv_id = $fetch_cv['id'];
                        $cv_file_name = $fetch_cv['my_cv'];

                        /* We will use this piece of code in our root index
                        <button class="btn btn-download" onclick="window.open(\'./user_files/'.$cv_file_name.'\')">
                            Download CV
                        </button>
                        */

                        echo '
                            <a class="btn btn-download" href="update_cv.php?id='.$cv_id.'">
                                Update CV
                            </a>
                        ';
                    }
                }

                ?>
                    <a class="btn btn-download" href="manage_info.php">
                        Manage Info
                    </a>
                </div>

            </div>

        </div>
        

        <!--ABOUT--------------------------------------------------------------------------------------------------->
        <div class="container-fluid" id="about" style="margin-top: 30vh;"><!--about container-->

            <h1 data-aos="zoom-in" style="color: #F34414; font-family: anton;" class="text-center">ABOUT</h1>
            <hr class="mb-4">

            <!--about-image & more-about-me container -->
            <div data-aos="fade-up" class="about-container d-flex justify-content-center align-items-center gap-4">
            
            <!-- about-image -->
            <?php

                $get_about_pic = mysqli_query($conn, "SELECT about_picture FROM `user` WHERE user_id=$user_id");
                $fetch_about_picture = mysqli_fetch_assoc($get_about_pic);

                // Use null-safe assignment operator and default value for clarity
                $user_about_picture = $fetch_about_picture['about_picture'] ?? './assets/default_user_image.jpg';

                // Handle both null and empty string directly for robustness
                if (is_null($user_about_picture) || $user_about_picture === '') {
                    echo '
                    
                    <div class="text-center" style="margin-bottom: 2rem;">
                        <img src="../assets/default_user_image.jpg" class="about-image" onclick="addAboutImage()" 
                        style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                    </div>
                    ';
                } else {
                    echo '

                    <div class="text-center" style="margin-bottom: 2rem;">
                        <img src="./user_images/' . $user_about_picture . '" class="about-image" onclick="changeAboutImage()" 
                        style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                    </div>
                    ';
                }

            ?>
                
                <script>
                    function addAboutImage() {
                        // when about image is clicked redirect to this page
                        window.location.href = "add_about_image.php";
                    }
                    function changeAboutImage() {
                        // when about image is clicked redirect to this page
                        window.location.href = "change_about_image.php";
                    }
                </script>                

                <!-- more-about-me -->
                <div data-aos="fade-up" style="flex-wrap: wrap; border: none; text-align: justify; 
                                                border-radius: 1rem; height: fit-content; padding: 1rem;">
                
                <!-- text box details container -->            
                <?php

                $get_more_about = mysqli_query($conn, "SELECT * FROM `more_about_me` WHERE user_id=$user_id");
                $count_more_about = mysqli_num_rows($get_more_about);

                if($count_more_about == 0) {

                    echo '
                    
                    <div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloremque velit, est quo 
                            consequatur reiciendis quibusdam assumenda, quia doloribus dolor enim! Asperiores sapiente 
                            cum non eligendi provident aut labore magni, commodi nesciunt odit expedita distinctio 
                            voluptate. Odio modi officia, suscipit impedit necessitatibus illo nisi totam dolores, voluptas 
                            dolor ipsam laborum.
                        </p>
                    </div>

                    <!-- add-icon button container -->
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-edit" href="add_textbox_details.php">
                            <i class="fa-regular fa-pen-to-square" style="color: #262018;"></i>
                        </a>
                    </div>  
                    
                    ';

                }else{

                    while($fetch_more_about = mysqli_fetch_assoc($get_more_about)) {

                        $more_about_me_id = $fetch_more_about['id'];
                        $about_me_description = $fetch_more_about['about_me'];

                        echo '

                        <div>
                            <p>'.$about_me_description.'</p>
                        </div>

                        <!-- edit-icon button container -->
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-edit" href="edit_textbox_details.php?id='.$more_about_me_id.'">
                                <i class="fa-regular fa-pen-to-square" style="color: #262018;"></i>
                            </a>
                        </div>  
                        
                        ';
                    }
                }

                ?>

                </div>
            </div>
            <!-- about-image & more-about-me container end -->


            <h2 id="education" data-aos="fade-right" class="text-start mt-5" 
            style="color: #F34414; font-family: anton;">Educational Background</h2>
            <hr class="mb-4">

            <!--EDUCATIONAL BACKGROUND container-->
            <div class="educational-container" style="display: grid; grid-template-columns: 1fr 1fr; gap: .75rem;">

                <!--Tertiary Education container-->
                <div data-aos="fade-up" style="flex-wrap: wrap; background-color: #262018; color: #DED1B7; 
                                            border-radius: 1rem; height:inherit; padding: 1rem; 
                                            -webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                            -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                            box-shadow: 3px 3px 10px 3px #91856c;">

                    <!--text box details container-->
                    <div class="py-4">
                        <h3 style="font-family: antonio;">Tertiary Education</h3>
                        <hr class="mb-3">

                        <?php

                        $get_tertiary_education = mysqli_query($conn, "SELECT * FROM `tertiary_education` WHERE user_id=$user_id");
                        $tertiary_count = mysqli_num_rows($get_tertiary_education);

                        if($tertiary_count == 0){

                            echo '
                            <div class="py-4 text-center" style="display: flex; align-items: center; justify-content: center;">
                                <div style="border: 1px dashed #DED1B7; width: 130px;">
                                    <!---Add btn-->
                                    <a href="add_tertiary_education.php"><i class="fa-solid fa-plus" 
                                        style="color: #DED1B7; font-size: 70px; font-weight: 200; padding: 1rem;"></i>
                                    </a>
                                </div>
                            </div>
                            </div>   
                            ';

                        }else{

                            while ($fetch_tertiary_education = mysqli_fetch_assoc($get_tertiary_education)) {
                                $tertiary_education_id =  $fetch_tertiary_education['id'];
                                $course = $fetch_tertiary_education['course'];
                                $tertiary_school = $fetch_tertiary_education['school'];
                                $tertiary_school_address = $fetch_tertiary_education['school_address'];
                                $tertiary_sy = $fetch_tertiary_education['school_year'];

                                echo '
                                
                                <p>'.$course.'</p>
                                <p>'.$tertiary_school.'</p>
                                <p>'.$tertiary_school_address.'</p>
                                <p>'.$tertiary_sy.'</p>
                                <hr>

                                </div>
                                <!--edit-icon button container-->
                                <div class="d-flex justify-content-end" style="position: absolute; bottom: 1rem; right: 1rem;">
                                    <a class="btn btn-edit" href="edit_tertiary_education.php?id='.$tertiary_education_id.'">
                                        <i class="fa-regular fa-pen-to-square" style="color: #DED1B7;"></i>
                                    </a>
                                </div>
                                
                                ';
                            }
                        }

                        ?>
                        
                </div>
                <!--Tertiary Education container end-->

                <!--Secondary Education container-->
                <div data-aos="fade-up" style="flex-wrap: wrap; background-color: #262018; color: #DED1B7; 
                                        border-radius: 1rem; height:inherit; padding: 1rem; 
                                        -webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                            -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                            box-shadow: 3px 3px 10px 3px #91856c;">
                                            
                    <!--text box details container-->
                    <div class="py-4">
                        <h3 style="font-family: antonio;">Secondary Education</h3>
                        <hr class="mb-3">

                        <?php

                        $get_secondary_education = mysqli_query($conn, "SELECT * FROM `secondary_education` WHERE user_id=$user_id");
                        $secondary_count = mysqli_num_rows($get_secondary_education);

                        if($secondary_count == 0){

                            echo '
                            <div class="py-4 text-center" style="display: flex; align-items: center; justify-content: center;">
                                <div style="border: 1px dashed #DED1B7; width: 130px;">
                                    <!---Add btn-->
                                    <a href="add_secondary_education.php"><i class="fa-solid fa-plus" 
                                        style="color: #DED1B7; font-size: 70px; font-weight: 200; padding: 1rem;"></i>
                                    </a>
                                </div>
                            </div>
                            </div>   
                            ';

                        }else{

                            while ($fetch_secondary_education = mysqli_fetch_assoc($get_secondary_education)) {
                                $secondary_education_id =  $fetch_secondary_education['id'];
                                $strand = $fetch_secondary_education['strand'];
                                $secondary_school = $fetch_secondary_education['school'];
                                $secondary_school_address = $fetch_secondary_education['school_address'];
                                $secondary_sy = $fetch_secondary_education['school_year'];

                                echo '
                                
                                <p>'.$strand.'</p>
                                <p>'.$secondary_school.'</p>
                                <p>'.$secondary_school_address.'</p>
                                <p>'.$secondary_sy.'</p>
                                <hr>

                                </div>
                                <!--edit-icon button container-->
                                <div class="d-flex justify-content-end" style="position: absolute; bottom: 1rem; right: 1rem;">
                                    <a class="btn btn-edit" href="edit_secondary_education.php?id='.$secondary_education_id.'">
                                        <i class="fa-regular fa-pen-to-square" style="color: #DED1B7;"></i>
                                    </a>
                                </div>
                                
                                ';
                            }
                        }

                        ?>
                    </div>
                </div>
                <!--Secondary Education container end-->

            </div>
            <!--EDUCATIONAL BACKGROUND container end-->

            <!--WORK EXPERIENCE-->
            <h2 id="work_experience" data-aos="fade-right" class="text-start mt-5" 
            style="color: #F34414; font-family: anton;">Work Experience</h2>
            <hr>

            <!-- Work experience container -->
            <div data-aos="fade-right" class="mt-4" style="-webkit-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            -moz-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            box-shadow: 2px 2.5px 10px -2.5px #91856c;">
                <div class="education-container d-flex justify-content-between">
                    <div><h3 style="font-family: antonio;">Companies</h3></div>
                    <!-- Add btn -->
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-add"  href="add_work_experience.php">
                            <i class="fa-solid fa-plus" style="color: #DED1B7;"></i>
                        </a>
                    </div>
                </div>

                <table class="table" style="border: 1px solid #262018;">
                    <thead>
                        <tr>
                            <th class="th-custom justify-center" scope="col">#</th>
                            <th class="th-custom" scope="col">Company</th>
                            <th class="th-custom" scope="col">Position</th>
                            <th class="th-custom" scope="col">Company address</th>
                            <th class="th-custom" scope="col">Employment period</th>
                            <th class="th-custom text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            
                        <?php

                        $get_work = mysqli_query($conn, "SELECT * FROM `work_experience` WHERE user_id=$user_id");

                        while($fetch_work=mysqli_fetch_assoc($get_work)){
                            $id = $fetch_work['id'];
                            $company_name = $fetch_work['company_name'];
                            $position = $fetch_work['position'];
                            $company_address = $fetch_work['company_address'];
                            $employment_period = $fetch_work['employment_period'];

                            echo '
                            
                            <tr>
                                <td style="background-color: #DED1B7;">'.$id,'</td>
                                <td style="background-color: #DED1B7;">'.$company_name.'</td>
                                <td style="background-color: #DED1B7;">'.$position.'</td>
                                <td style="background-color: #DED1B7;">'.$company_address.'</td>
                                <td style="background-color: #DED1B7;">'.$employment_period.'</td>
                                
                                <td style="background-color: #DED1B7;" colspan="2" class="text-end">
                                    <!--edit btn-->
                                    <a class="btn btn-edit mb-1" href="edit_work_experience.php?id='.$id.'">
                                        <i class="fa-regular fa-pen-to-square" style="color: #262018;"></i>
                                    </a>
                                    <!--delete btn-->
                                    <a class="btn btn-delete mb-1" href="delete_work_experience.php?id='.$id.'">
                                        <i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i>
                                    </a>
                                </td>
                            </tr>

                            ';
                        }

                        ?>                            
                            
                    </tbody>
                </table>
            </div>
            <!--WORK EXPERIENCE end -->

            <!--SKILLS-->
            <h2 id="skills" data-aos="fade-right" class="text-start mt-5" 
            style="color: #F34414; font-family: anton;">Skills</h2>
            <hr>

            <!-- Soft skills Section -->
            <div data-aos="flip-left" class="mt-4" style="-webkit-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            -moz-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            box-shadow: 2px 2.5px 10px -2.5px #91856c;"><!-- Soft skills container -->
                <div class="education-container d-flex justify-content-between">
                    <div><h3 style="font-family: antonio;">Soft Skills</h3></div>
                    <!-- Add btn -->
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-add" href="add_soft_skill.php">
                            <i class="fa-solid fa-plus" style="color: #DED1B7;"></i>
                        </a>
                    </div>
                </div>

                <table class="table" style="border: 1px solid #262018;">
                    <thead>
                        <tr>
                            <th class="th-custom justify-center" scope="col">#</th>
                            <th class="th-custom" scope="col">Skill</th>
                            <th class="th-custom" scope="col">Current level of expertice</th>
                            <th class="th-custom text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        $get_soft_skills = mysqli_query($conn, "SELECT * FROM `soft_skills` WHERE user_id=$user_id");

                        while($fetch_soft_skill=mysqli_fetch_assoc($get_soft_skills)){
                            $id = $fetch_soft_skill['id'];
                            $soft_skill = $fetch_soft_skill['soft_skills'];
                            $skill_rating = $fetch_soft_skill['skill_rating'];

                            echo '
                            
                            <tr>
                                <td style="background-color: #DED1B7;">'.$id,'</td>
                                <td style="background-color: #DED1B7;">'.$soft_skill.'</td>
                                
                                <td style="background-color: #DED1B7; vertical-align: middle;">
                                    <progress class="w-100" style="height: 1.3rem" min="1" max="10" value='.$skill_rating.'></progress>
                                </td>

                                <td style="background-color: #DED1B7;" colspan="2" class="text-end">
                                    <a class="btn btn-edit mb-1" href="edit_soft_skill.php?id='.$id.'"><i class="fa-regular fa-pen-to-square" style="color: #262018;"></i></a>
                                    <a class="btn btn-delete mb-1" href="delete_soft_skill.php?id='.$id.'"><i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i></a>
                                </td>        
                            </tr>

                            ';
                        }

                        ?>

                    </tbody>
                </table>
            </div><!-- Soft skills container end -->

            <!-- Hard skills Section -->
            <div data-aos="flip-left" class="mt-4" style="-webkit-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            -moz-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            box-shadow: 2px 2.5px 10px -2.5px #91856c;"><!-- Hard skills container -->
                <div class="education-container d-flex justify-content-between">
                    <div><h3 style="font-family: antonio;">Hard Skills</h3></div>
                    <!-- Add btn -->
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-add" href="add_hard_skill.php">
                            <i class="fa-solid fa-plus" style="color: #DED1B7;"></i>
                        </a>
                    </div>
                </div>

                <table class="table" style="border: 1px solid #262018;">
                    <thead>
                        <tr>
                            <th class="th-custom justify-center" scope="col">#</th>
                            <th class="th-custom" scope="col">Skill</th>
                            <th class="th-custom" scope="col">Current level of expertice</th>
                            <th class="th-custom text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $get_hard_skills = mysqli_query($conn, "SELECT * FROM `hard_skills` WHERE user_id=$user_id");

                        while($fetch_hard_skill=mysqli_fetch_assoc($get_hard_skills)){
                            $id = $fetch_hard_skill['id'];
                            $hard_skill = $fetch_hard_skill['hard_skills'];
                            $skill_rating = $fetch_hard_skill['skill_rating'];

                            echo '
                            
                            <tr>
                                <td style="background-color: #DED1B7; vertical-align: middle;">'.$id,'</td>
                                <td style="background-color: #DED1B7; vertical-align: middle;">'.$hard_skill.'</td>
                                
                                <td style="background-color: #DED1B7; vertical-align: middle;">
                                    <progress class="w-100" style="height: 1.3rem" min="1" max="10" value='.$skill_rating.'></progress>
                                </td>
                                
                                <td style="background-color: #DED1B7;" colspan="2" class="text-end">
                                    <a class="btn btn-edit mb-1" href="edit_hard_skill.php?id='.$id.'"><i class="fa-regular fa-pen-to-square" style="color: #262018;"></i></a>
                                    <a class="btn btn-delete mb-1" href="delete_hard_skill.php?id='.$id.'"><i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i></a>
                                </td>
                            </tr>

                            ';
                        }

                        ?>

                    </tbody>
                </table>
            </div><!-- Hard skills container end -->

             <!--PROJECTS-->
             <h2 id="projects" data-aos="fade-right" class="text-start mt-5" 
             style="color: #F34414; font-family: anton;">Projects</h2>
             <hr>

             <!-- Projects experience container -->
             <div data-aos="fade-right" class="mt-4" style="-webkit-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            -moz-box-shadow: 2px 2.5px 10px -2.5px #91856c;
                                                            box-shadow: 2px 2.5px 10px -2.5px #91856c;">
                 <div class="education-container d-flex justify-content-between">
                     <div><h3 style="font-family: antonio;">My projects</h3></div>
                     <!-- Add btn -->
                     <div class="d-flex justify-content-end">
                         <a class="btn btn-add" href="add_project.php">
                             <i class="fa-solid fa-plus" style="color: #DED1B7;"></i>
                         </a>
                     </div>
                 </div>
 
                 <table class="table" style="border: 1px solid #262018;">
                     <thead>
                         <tr>
                             <th class="th-custom justify-center" scope="col">#</th>
                             <th class="th-custom" scope="col">Image</th>
                             <th class="th-custom" scope="col">Project title</th>
                             <th class="th-custom" scope="col">Project link</th>
                             <th class="th-custom text-center" scope="col">Actions</th>
                         </tr>
                     </thead>
                     <tbody>

                        <?php

                        $get_project = mysqli_query($conn, "SELECT * FROM `projects` WHERE user_id=$user_id");
                        $project_count = mysqli_num_rows($get_project);

                        while($fetch_project = mysqli_fetch_assoc($get_project)){
                            $project_id = $fetch_project['id'];
                            $project_title = $fetch_project['project_title'];
                            $project_image = $fetch_project['project_image'];
                            $project_link = $fetch_project['project_link'];

                            echo '
                            
                            <tr>
                                <td style="background-color: #DED1B7; vertical-align: middle;">'.$project_id.'</td>

                                <td style="background-color: #DED1B7; vertical-align: middle;">
                                    <img src="./project_images/'.$project_image.'" style="width: 100px; height: 100px; object-fit: contain;">
                                </td>

                                <td style="background-color: #DED1B7; vertical-align: middle;">'.$project_title.'</td>
                                <td style="background-color: #DED1B7; vertical-align: middle;">'.$project_link.'</td>
                                
                                <td style="background-color: #DED1B7; vertical-align: middle;" colspan="2" class="text-end">
                                    <a class="btn btn-edit mb-1" href="edit_project.php?id='.$project_id.'"><i class="fa-regular fa-pen-to-square" style="color: #262018;"></i></a>
                                    <a class="btn btn-delete mb-1" href="delete_project.php?id='.$project_id.'"><i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i></a>
                                </td>
                            </tr>

                            ';
                        }

                        ?>

                     </tbody>
                 </table>
             </div>
             <!--WORK EXPERIENCE end -->

        </div><!-- end of about container ------------------------------------------------------------------------------------------------>

    </div>    

    <footer data-aos="zoom-in-up" class="w-100 text-center" style="margin-top: 10vh; margin-bottom: 5rem;">

            <nav class="text-center">
                <div class="nav-links-container">

                    <ul class="nav-links footer-links" style="display: flex; flex-direction: row; 
                gap: 2rem; font-size: 1.25rem; list-style: none; justify-content: center;">
                        <li class="nav-item">
                            <a class="nav-link" href="#profile">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#skills">Skills</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">Projects</a>
                        </li>
                    </ul>

                </div>
            </nav>

            <p>Cpyright &#169; 2024 Al-Ernest Tamse. All Rights Reserved</p>

        </footer>

    </div><!--END of content-wrapper-->

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