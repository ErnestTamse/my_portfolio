<?php

include './includes/connect_db.php';

//fetch all super_admin
$get_user = mysqli_query($conn, "SELECT * FROM user WHERE user_type='super_admin'");
$fetch_user_data = mysqli_fetch_assoc($get_user);

$user_id = $fetch_user_data['user_id'];
$username = $fetch_user_data['username']; 
//echo "<br>User ID: " . $user_id;
//echo "<br>User ID: " . $username;

//name
$user_fullname = $fetch_user_data['full_name'];
$user_given_name = $fetch_user_data['given_name'];
$user_surname = $fetch_user_data['surname'];

//contacts
$user_gmail = $fetch_user_data['gmail'];
$user_fb_link = $fetch_user_data['fb_link'];
$user_contact_number = $fetch_user_data['mobile_number'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>

    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--FONT AWESOME CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        * {
            margin: 0;
            padding: 0;
        }

        p,
        h1 {
            margin: 0;
            padding: 0;
        }

        /*SECTIONS*/
        section {
            padding-top: 4dvh;
            height: 96dvh;
            margin: 0 10rem;
            box-sizing: border-box;
            min-height: fit-content;
        }

        /*profile section*/

        .profile-container,
        .about-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 3rem;
            margin-top: 1rem;
        }

        .profile-container img {
            border-radius: 50%;
            min-width: 100%;
            width: 420px;
            height: 420px;
            object-fit: contain;
            border: solid 2px #262018;
        }

        .profile-sub-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .profile-btn-container {
            margin-top: 1rem;
        }

        /*about section*/

        .about-container {
            position: relative;
        }

        .about-background-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: .5rem;
        }

        .about-image {
            width: 300px;
            height: 300px;
            object-fit: contain;
            border-radius: 1rem;
            border: 1.5px solid #262018;
            -webkit-box-shadow: 3px 3px 10px 3px #91856c;
            -moz-box-shadow: 3px 3px 10px 3px #91856c;
            box-shadow: 3px 3px 10px 3px #91856c;
        }

        .education-container,
        .work-experience-container {
            border: .5px solid black;
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            border-radius: 2rem;
        }

        /*skills section*/

        .skills-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .soft-skills,
        .hard-skills {
            border: .5px solid black;
            padding-left: .3rem;
            padding-right: 2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            border-radius: 2rem;
        }

        /*projects section*/

        .card-parent-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            justify-content: center;
        }

        @media (max-width: 576px) {

            .content-warapper {
                max-width: fit-content;
                margin-inline: auto;
            }

            .custom-brand {
                font-size: 22px !important;
            }

            p {
                font-size: .85rem;
            }

            /*section {
                min-height: 70vh;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding-top: 80px;
                padding-bottom: 80px;
            }*/

            /*profile section*/

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
            }

            .profile-btn-container button {
                width: 130px;
                border-radius: 20px;
            }

            .profile_text {
                font-size: 18px !important;
            }

            /*about section*/

            .about-container {
                display: flex;
                flex-direction: column;
                padding-left: 1.2rem;
                padding-right: 1.2rem;
            }

            .about-background-details {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }

            .about-image {
                width: 200px;
                height: 200px;
                object-fit: contain;
                border-radius: 1rem;
            }

            /*skills section*/

            .skills-container {
                align-items: center;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                justify-content: center;
            }

            .skill-list span {
                font-size: .9rem;
            }

            .skill-rating {
                height: .8rem !important;
            }

            /*project section*/

            .card-parent-container {
                min-width: 300px;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: .5rem;
            }

            /*contact section*/

            .contact-form-container {
                grid-template-columns: 1fr;
            }

            .contact-info {
                flex-direction: column;
                /*grid-template-columns: 1fr;*/
            }

            .footer-links {
                padding: 0;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                align-items: center;
            }

        }

        /*color palette
        
        orange - #F34414
        black - #262018
        background - #DED1B7
        
        */

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

        .btn-send {
            background: #f12711;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #f5af19, #f12711);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #f5af19, #f12711); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
            border: none;
        }

        .education-container,
        .work-experience-container {
            background-color: #262018;
        }

        .about-background-details {
            color: #DED1B7;
        }

        .card-custom {
            border-radius: 1.5rem;
            background-color: #DED1B7;
            border: 1px solid #262018;
        }

        /*hovers*/

        .btn-download:hover,
        .btn-custom:hover {
            background-color: #262018;
            color: white;
        }

    </style>

</head>

<body style="background-color: #DED1B7;">

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg nav-bar-custom" id="profile">
        <div class="container">
            <a class="navbar-brand custom-brand" style="font-size: 2rem; font-family: antonio;">
                Welcome to my portfolio
            </a>
            <button class="navbar-toggler border-0 toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 1.5rem;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#profile"></a>
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
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container content-warapper" style="padding-bottom: 10vh;">

        <!--profile section-->
        <div style="height: 100vh;">

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
                            <img src="./assets/default_user_image.jpg" alt="User profile picture" 
                            style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                        </div>
                        ';
                } else {
                    echo '
                        <div data-aos="flip-left">
                            <img src="./admin_area/user_images/' . $user_profile_picture . '" alt="User profile picture" 
                            style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                        </div>
                        ';
                }

                ?>

                <div class="profile-sub-container">

                    <div class="text-center">
                        <p class="profile_text" style="font-size: 1.75rem; font-family: antonio;">Hello my name is</p>
                        <h1 style="color: #F34414; font-family: anton;"><span id="element"></span></h1>
                        <p class="profile_text" style="font-size: 1.75rem; font-family: antonio;">and I'm a Web Developer.</p>
                    </div>

                    <!-- Element to contain animated typing -->
                    <!--<span id="element"></span>-->

                    <!-- Setup and start animation! -->
                    <script>
                    var typed = new Typed('#element', {
                        strings: ['<?php echo $user_given_name . " " . $user_surname; ?>'],
                        typeSpeed: 30,
                    });
                    </script>

                    <div class="profile-btn-container">

                    <?php

                    //user cv file
                    $get_cv = mysqli_query($conn, "SELECT * FROM `user_cv` WHERE user_id=$user_id");
                    $cv_count = mysqli_num_rows($get_cv);

                    if($cv_count == 0) {
                        echo '
                        <button class="btn btn-download disabled">
                            Download CV
                        </button>
                        ';
                    }else {

                        while($fetch_cv = mysqli_fetch_assoc($get_cv)){
                            $cv_id = $fetch_cv['id'];
                            $cv_file_name = $fetch_cv['my_cv'];

                            echo '
                            <button class="btn btn-download" onclick="window.open(\'./admin_area/user_files/'.$cv_file_name.'\')">
                                Download CV
                            </button>
                            ';

                        }
                    }

                    ?>
                        <button class="btn btn-download" onclick="location.href='./#contact'">
                            Email me
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <!--profile section end-->

        <!--about section-->
        <div id="about">

            <div style="padding-top: 30px">
                <h1 data-aos="zoom-in-up" class="text-center" 
                    style="color: #F34414; font-family: anton;">ABOUT
                </h1>
                <p data-aos="zoom-in-up" class="text-center" style="font-family: antonio;">Get to know me and my background</p>
                <hr class="mb-4">
            </div>

            <div class="about-container mb-5">

            <?php

                //about image
                $get_about_pic = mysqli_query($conn, "SELECT about_picture FROM `user` WHERE user_id=$user_id");
                $fetch_about_picture = mysqli_fetch_assoc($get_about_pic);

                // Use null-safe assignment operator and default value for clarity
                $user_about_picture = $fetch_about_picture['about_picture'] ?? './assets/default_user_image.jpg';

                // Handle both null and empty string directly for robustness
                if (is_null($user_about_picture) || $user_about_picture === '') {
                    echo '
                    
                    <div class="text-center">
                        <img src="./assets/default_user_image.jpg" class="about-image">
                    </div>
                    ';
                } else {

                    echo '
                    <div data-aos="zoom-in-up" class="text-center">
                        <img src="./admin_area/user_images/' . $user_about_picture . '" class="about-image">
                    </div>
                    ';

                }

                //more about me textbox
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
                    
                    ';

                }else{

                    while($fetch_more_about = mysqli_fetch_assoc($get_more_about)) {

                        $more_about_me_id = $fetch_more_about['id'];
                        $about_me_description = $fetch_more_about['about_me'];

                        echo '

                        <div style="text-align: justify;">
                            <p>'.$about_me_description.'</p>
                        </div> 
                        
                        ';
                    }
                }

            ?>

            </div>

            <div data-aos="fade-left" class="about-background-details">
                <div class="education-container" style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                    <h2 class="mb-3" style="font-family: antonio;">
                        <i class="fa-solid fa-graduation-cap" style="margin-right: 4px;"></i>EDUCATION
                    </h2>
                    <hr>
                    <div class="mb-2">
                        <h4 class="mb-3" style="font-family: antonio;">Tertiary Education</h4>

                        <?php

                        $get_tertiary_education = mysqli_query($conn, "SELECT * FROM `tertiary_education` WHERE user_id=$user_id");
                        $tertiary_count = mysqli_num_rows($get_tertiary_education);

                        if($tertiary_count == 0){

                            echo '
                            <P>Course</P>
                            <P>School name</P>
                            <p>School year</p>
                            <p>School address</p>   
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
                                ';
                            }
                        }

                        ?>

                        <hr>
                        <h4 class="mb-3" style="font-family: antonio;">Secondary Education</h4>

                        <?php

                        $get_secondary_education = mysqli_query($conn, "SELECT * FROM `secondary_education` WHERE user_id=$user_id");
                        $secondary_count = mysqli_num_rows($get_secondary_education);

                        if($secondary_count == 0){

                            echo '
                            <P>Course</P>
                            <P>School name</P>
                            <p>School year</p>
                            <p>School address</p>   
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
                                ';
                            }
                        }

                        ?>

                    </div>
                </div>
                <div class="work-experience-container" style="-webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">
                    <h2 class="mb-3" style="font-family: antonio;">
                        <i class="fa-solid fa-briefcase" style="margin-right: 4px;"></i>WORK EXPERIENCE
                    </h2>
                    <hr>
                    <div class="mb-2">

                    <?php

                        $get_work = mysqli_query($conn, "SELECT * FROM `work_experience` WHERE user_id=$user_id");
                        $work_experience_count = mysqli_num_rows($get_work);

                        if($work_experience_count == 0) {

                            echo '
                            <p>Position</p>
                            <P>Company name</P>
                            <p>Company address</p>
                            <p>Date present</p>
                            <hr>
                            ';
                        
                        }else {

                            while($fetch_work=mysqli_fetch_assoc($get_work)){
                                $id = $fetch_work['id'];
                                $company_name = $fetch_work['company_name'];
                                $position = $fetch_work['position'];
                                $company_address = $fetch_work['company_address'];
                                $employment_period = $fetch_work['employment_period'];

                                echo '
                                <p>'.$position.'</p>
                                <P>'.$company_name.'</P>
                                <p>'.$company_address.'</p>
                                <p>'.$employment_period.'</p>
                                <hr>
                                ';
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>

        </div>
        <!--about section end-->

        <!--skill section-->
        <div style="padding-top: 30px; padding-bottom: 20px;">
            <div id="skills" class="py-1">
                <h1 data-aos="zoom-in-up" class="text-center" 
                    style="color: #F34414; margin-top: 5vh; font-family: anton;">SKILLS
                </h1>
                <p data-aos="zoom-in-up" class="text-center" style="font-family: antonio;">What I can offer</p>
                <hr class="mb-3">
            </div>

            <div data-aos="flip-left" class="skills-container">

                <div>
                    <h2 class="soft-skills" style="color: #DED1B7; background-color: #262018; padding-top: 1rem;
                        padding-bottom: 1rem; padding-left: 2rem; font-family: antonio;">
                        <i class="fa-regular fa-handshake" style="margin-right: 4px;"></i>Soft Skills
                    </h2>
                    <div class="soft-skills" style="border: none; -webkit-box-shadow: inset 2px 2.5px 10px 3px #91856c;
                                            -moz-box-shadow: inset 2px 2.5px 10px 3px #91856c;
                                            box-shadow: inset 2px 2.5px 10px 3px #91856c;">
                        <ul class="skill-list" style="list-style: none;">

                        <?php

                        $get_soft_skills = mysqli_query($conn, "SELECT * FROM `soft_skills` WHERE user_id=$user_id");

                        while($fetch_soft_skill=mysqli_fetch_assoc($get_soft_skills)){
                            $id = $fetch_soft_skill['id'];
                            $soft_skill = $fetch_soft_skill['soft_skills'];
                            $skill_rating = $fetch_soft_skill['skill_rating'];

                            echo '
                            <li class="mb-2">
                            <i class="fa-solid fa-square-check fa-sm" style="margin-right: 8px;"></i>
                                <span>'.$soft_skill.'</span><br>
                                <span><progress style="height: 1.3rem" class="w-100 skill-rating" min="1" max="10" 
                                value="'.$skill_rating.'"></progress></span>
                            </li>
                            ';
                        }

                        ?>

                        </ul>
                    </div>
                </div>

                <div>
                    <h2 class="hard-skills" style="color: #DED1B7; background-color: #262018; padding-top: 1rem;
                        padding-bottom: 1rem; padding-left: 2rem; font-family: antonio;">
                        <i class="fa-solid fa-gears" style="margin-right: 4px;"></i>Hard Skills
                    </h2>
                    <div class="hard-skills" style="border: none; -webkit-box-shadow: inset 2px 2.5px 10px 3px #91856c;
                                            -moz-box-shadow: inset 2px 2.5px 10px 3px #91856c;
                                            box-shadow: inset 2px 2.5px 10px 3px #91856c;">
                        <ul class="skill-list" style="list-style: none;">
                
                        <?php

                        $get_hard_skills = mysqli_query($conn, "SELECT * FROM `hard_skills` WHERE user_id=$user_id");

                        while($fetch_hard_skill=mysqli_fetch_assoc($get_hard_skills)){
                            $id = $fetch_hard_skill['id'];
                            $hard_skill = $fetch_hard_skill['hard_skills'];
                            $skill_rating = $fetch_hard_skill['skill_rating'];

                            echo '
                            <li class="mb-2">
                            <i class="fa-solid fa-square-check fa-sm" style="margin-right: 8px;"></i>
                                <span>'.$hard_skill.'</span><br>
                                <span><progress style="height: 1.3rem" class="w-100 skill-rating" min="1" max="10" 
                                value="'.$skill_rating.'"></progress></span>
                            </li>
                            ';
                        }

                        ?>

                        </ul>
                    </div>
                </div>

            </div>
        </div><!--skill section end-->

        <!--projects section-->
        <div>
            <div id="projects" style="padding-top: 50px;">
                <h1 data-aos="zoom-in-up" class="text-center" 
                    style="color: #F34414; font-family: anton;">PROJECTS
                </h1>
                <hr class="mb-4">
            </div>

            <div class="container justify-content-center">
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-2 justify-content-center" 
                data-aos="fade-up">

            <?php

            $get_project = mysqli_query($conn, "SELECT * FROM `projects` WHERE user_id=$user_id");
            $project_count = mysqli_num_rows($get_project);

            if($project_count == 0) {

                echo '
                <div class="card card-custom">
                    <h1 style="font-family: antonio;">Currently No projects</h1>
                </div>
                            ';
            }else{

                while($fetch_project = mysqli_fetch_assoc($get_project)){
                    $project_id = $fetch_project['id'];
                    $project_title = $fetch_project['project_title'];
                    $project_image = $fetch_project['project_image'];
                    $project_description = $fetch_project['project_description'];
                    $project_link = $fetch_project['project_link'];

                    echo '
                    
                    <div class="col">
                    <div class="card shadow border-dark" style="background-color: #DED1B7;">
                        <img src="./admin_area/project_images/'.$project_image.'" class="card-img-top" alt="..." style="height: 175px; object-fit: cover">
                        <div class="card-body">
                        <h5 class="card-title" style="font-family: antonio;">'.$project_title.'</h5>
                        <p class="card-text">'.$project_description.'</p>
                        </div>
                        <div class="card-footer">
                            <a href="'.$project_link.'" class="btn btn-custom btn-sm">Check on Github</a>
                        </div>
                      </div>
                    </div>';

                }
            }
            
            ?>

                </div>
            </div>
        </div>
        <!--project section end-->

        <!--contact section-->
        <div>
            <div id="contact" style="padding-top: 30px">
                <h1 data-aos="zoom-in-up" class="text-center" 
                    style="color: #F34414; font-family: anton;">CONTACT
                </h1>
                <hr class="mb-4">
            </div>

            <div data-aos="zoom-in-up" class="contact-form-container" style="border: .5px solid #262018; padding: 1.75rem; 
            border-radius: 1rem; background-color: #262018; -webkit-box-shadow: 3px 3px 10px 3px #91856c;
                                -moz-box-shadow: 3px 3px 10px 3px #91856c;
                                box-shadow: 3px 3px 10px 3px #91856c;">

                <form method="post" action="send_email.php">

                    <div class="d-flex contact-info" style="display: grid; grid-template-columns: repeat(autofit, minmax(300px 1fr)); gap: .5rem">
                    
                        <div class="mb-3 w-100">
                            <label for="sender_name" class="form-label text-light">Name</label>
                            <input type="text" class="form-control" id="sender_name" 
                            placeholder="Your name" name="sender_name" required>
                        </div>

                        <div class="mb-3 w-100">
                            <label for="user_email" class="form-label text-light">Email address</label>
                            <input type="email" class="form-control" id="user_email" 
                            placeholder="Your email" name="sender_email" required>
                        </div>
                        <div class="mb-3 w-100">
                            <label for="subject" class="form-label text-light">Subject</label>
                            <input type="text" class="form-control" id="subject" 
                            placeholder="Purpose" name="message_subject">
                        </div>
                    </div>

                    <div class="message-box" style="display: grid; grid-template-columns: 1fr;">
                        <textarea class="form-control" cols="30" rows="10" style="padding: 10px;" 
                        placeholder="Your message here:" name="message"></textarea>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-send text-center" style="min-width: 200px;">Send</button>
                    </div>

                </form>

            </div>

        </div>
        <!--contact section end-->

        <footer data-aos="zoom-in-up" class="w-100 text-center" style="margin-top: 10vh;">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
