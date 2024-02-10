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

    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
            margin-top: 2rem;
        }

        .about-image {
            width: 300px;
            height: 300px;
            border-radius: 1rem;
            object-fit: contain;
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

    </style>

</head>
<body style="background-color: #DED1B7;">

    <!--Modals-->

    <!-- Modal triggered when textBoxDetails-->
    <div class="modal fade" id="textBoxDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #DED1B7; border:1px solid #262018;">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tell us more about you:</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column align-items-end" method="post">
                    <textarea name="text_area_input" class="form-control" style="height: 10rem; border:1px solid #262018; background-color: #DED1B7;"></textarea>
                    <button type="submit" class="btn mt-3" style="background-color: #262018; color:#DED1B7;" 
                    name="submit_textArea">Submit</button>
                </form>                
            </div>
        </div>
        </div>
    </div>

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

    <!-- delete work experience Modal -->
    <div class="modal fade" id="delete_workExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #DED1B7; border:1px solid #262018;">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this data?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form method="get">
                    <input class="btn" type="submit" value="Delete" name="delete_work_experience" 
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
            <a class="navbar-brand custom-brand" style="font-size: 2.25rem;">Al-Ernest Tamse</a>
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

    <section id="profile">

        <div class="profile-container">
            
            <div>
                <img src="../images/profile-image3.jpg" alt="" onclick="changeProfile()">
            </div>

            <script>
                function changeProfile() {
                    //when profile image clicked redirect to a page    
                    window.location.href = "index.php";
                }
            </script>

            <div class="profile-sub-container">
                
                <div class="text-center">
                    <p style="font-size: 1.75rem;">Welcome to admin page</p>
                    <h1 style="color: #F34414;">Al-Ernest Tamse</h1>
                    <p style="font-size: 1.75rem;">A web developer</p>
                </div>

                <div class="profile-btn-container">
                    <button class="btn btn-download" onclick="window.open('./assets/resume-example.pdf')">
                        Download CV
                    </button>
                    <button class="btn btn-download" onclick="location.href='./#contact'">
                        Contact Info
                    </button>
                </div>

            </div>

        </div>
        

        <!--ABOUT--------------------------------------------------------------------------------------------------->
        <div class="container-fluid" id="about" style="margin-top: 30vh;"><!--about container-->

            <h1 data-aos="zoom-in" class="text-center mb-4">ABOUT</h1>

            <!--about-image & more-about-me container -->
            <div data-aos="fade-up" class="d-flex justify-content-center align-items-center gap-4">
                <!-- about-image -->
                <div class="text-center" style="margin-bottom: 2rem;">
                    <img src="../images/about-image3.jpg" alt="" class="about-image" onclick="changeAboutImage()">
                </div>
                
                <script>
                    function changeAboutImage() {
                        // when about image is clicked redirect to this page
                        window.location.href = "your_page_url.html";
                    }
                </script>                

                <!-- more-about-me -->
                <div data-aos="fade-up" style="flex-wrap: wrap; border: none; text-align: justify; 
                                                border-radius: 1rem; height: fit-content; padding: 1rem;">
                    <!-- text box details container -->
                    <div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloremque velit, est quo 
                            consequatur reiciendis quibusdam assumenda, quia doloribus dolor enim! Asperiores sapiente 
                            cum non eligendi provident aut labore magni, commodi nesciunt odit expedita distinctio 
                            voluptate. Odio modi officia, suscipit impedit necessitatibus illo nisi totam dolores, voluptas 
                            dolor ipsam laborum.
                        </p>
                    </div>
                    <!-- edit-icon button container -->
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#textBoxDetails" href="#">
                            <i class="fa-regular fa-pen-to-square" style="color: #262018;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- about-image & more-about-me container end -->


            <h2 data-aos="fade-right" class="text-start mt-5 mb-4">Educational Background</h2>

            <!--EDUCATIONAL BACKGROUND container-->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: .75rem;">

                <!--Tertiary Education container-->
                <div data-aos="fade-up" style="flex-wrap: wrap; background-color: #262018; color: #DED1B7; 
                                            border-radius: 1rem; height:inherit; padding: 1rem;">
                    <!--text box details container-->
                    <div class="py-4">
                        <h4 class="mb-3">Tertiary Education</h4>
                            <p>Bachelor of Science in Information Technology</p>
                            <p>Western Mindanao State Univercity</p>
                            <p>Normal Road, Baliwasan, Zamboanga City, Philippines, 7000</p>
                            <p>2020-2024</p>
                            <hr>
                    </div>
                    <!--edit-icon button container-->
                    <div class="d-flex justify-content-end" style="position: absolute; bottom: 1rem; right: 1rem;">
                        <a class="btn btn-edit" href="#">
                            <i class="fa-regular fa-pen-to-square" style="color: #DED1B7;"></i>
                        </a>
                    </div>
                </div>
                <!--Tertiary Education container end-->

                <!--Secondary Education container-->
                <div data-aos="fade-up" style="flex-wrap: wrap; background-color: #262018; color: #DED1B7; 
                                        border-radius: 1rem; height:inherit; padding: 1rem;">
                    <!--text box details container-->
                    <div class="py-4">
                        <h4 class="mb-3">Secondary Education</h4>
                            <p>TVL-Drafting Technology</p>
                            <p>Zamboanga City State Polytechnique College</p>
                            <p>R.T.Lim Blvd, Baliwasan, Zamboanga City, Philippines, 7000</p>
                            <p>2016-2019</p>
                            <hr>
                    </div>
                    <!--edit-icon button container-->
                    <div class="d-flex justify-content-end" style="position: absolute; bottom: 1rem; right: 1rem;">
                        <a class="btn btn-edit" href="#">
                            <i class="fa-regular fa-pen-to-square" style="color: #DED1B7;"></i>
                        </a>
                    </div>
                </div>
                <!--Secondary Education container end-->

            </div>
            <!--EDUCATIONAL BACKGROUND container end-->

            <!--WORK EXPERIENCE-->
            <h2 id="work_experience" data-aos="fade-right" class="text-start mt-5">Work Experience</h2>

            <!-- Work experience container -->
            <div data-aos="fade-right" class="mt-4">
                <div class="education-container d-flex justify-content-between">
                    <div><h4>Companies</h4></div>
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
            <h2 id="skills" data-aos="fade-right" class="text-start mt-5">Skills</h2>

            <!-- Soft skills Section -->
            <div data-aos="flip-left" class="mt-4"><!-- Soft skills container -->
                <div class="education-container d-flex justify-content-between">
                    <div><h4>Soft Skills</h4></div>
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
                            <th class="th-custom text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


<?php

$get_soft_skills = mysqli_query($conn, "SELECT * FROM `soft_skills` WHERE user_id=$user_id");

while($fetch_soft_skill=mysqli_fetch_assoc($get_soft_skills)){
    $id = $fetch_soft_skill['id'];
    $soft_skill = $fetch_soft_skill['soft_skills'];

    echo '
    
    <tr>
        <td style="background-color: #DED1B7;">'.$id,'</td>
        <td style="background-color: #DED1B7;">'.$soft_skill.'</td>
        
        <td style="background-color: #DED1B7;" colspan="2" class="text-end">
            <a class="btn btn-edit mb-1" href="#"><i class="fa-regular fa-pen-to-square" style="color: #262018;"></i></a>
            <a class="btn btn-delete mb-1" href="#"><i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i></a>
        </td>
    </tr>

    ';
}

?>                            
                    </tbody>
                </table>
            </div><!-- Soft skills container end -->

            <!-- Hard skills Section -->
            <div data-aos="flip-left" class="mt-4"><!-- Hard skills container -->
                <div class="education-container d-flex justify-content-between">
                    <div><h4>Hard Skills</h4></div>
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
            <a class="btn btn-edit mb-1" href="#"><i class="fa-regular fa-pen-to-square" style="color: #262018;"></i></a>
            <a class="btn btn-delete mb-1" href="#"><i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i></a>
        </td>
    </tr>

    ';
}

?>
                    </tbody>
                </table>
            </div><!-- Hard skills container end -->

             <!--WORK EXPERIENCE-->
             <h2 id="projects" data-aos="fade-right" class="text-start mt-5">Projects</h2>

             <!-- Work experience container -->
             <div data-aos="fade-right" class="mt-4">
                 <div class="education-container d-flex justify-content-between">
                     <div><h4>My projects</h4></div>
                     <!-- Add btn -->
                     <div class="d-flex justify-content-end">
                         <a class="btn btn-add" href="#">
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
                         <tr>
                             <td style="background-color: #DED1B7;">1</td>
                             <td style="background-color: #DED1B7;">HTML</td>
                             <td style="background-color: #DED1B7;">Pro</td>
                             <td style="background-color: #DED1B7;">Pro</td>
                             
                             <td style="background-color: #DED1B7;" colspan="2" class="text-end">
                                 <a class="btn btn-edit mb-1" href="#"><i class="fa-regular fa-pen-to-square" style="color: #262018;"></i></a>
                                 <a class="btn btn-delete mb-1" href="#"><i class="fa-regular fa-trash-can" style="color: #DED1B7;"></i></a>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </div>
             <!--WORK EXPERIENCE end -->

        </div><!-- end of about container ------------------------------------------------------------------------------------------------>



    </section>


    

    </div><!--END of content-wrapper-->

    <footer data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" 
    class="w-100 text-center" style="margin-top: 10vh; margin-bottom: 20vh;">

        <nav class="text-center">
            <div class="nav-links-container">
       
                <ul class="nav-links" style="display: flex; flex-direction: row; 
                gap: 2rem; font-size: 1.25rem; list-style: none; justify-content: center;">
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
        </nav>
        
        <p>Cpyright &#169; 2024 Al-Ernest Tamse. All Rights Reserved</p>
    
    </footer>

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