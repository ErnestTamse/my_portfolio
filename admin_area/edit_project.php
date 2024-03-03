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
    
    $get_project = mysqli_query($conn, "SELECT * FROM `projects` WHERE id=$id");
    
    while($fetch_data = mysqli_fetch_assoc($get_project)){
        $id = $fetch_data['id'];
        $project_title = $fetch_data['project_title'];
        $project_link = $fetch_data['project_link'];
        $project_image = $fetch_data['project_image'];
    }

    if(isset($_POST['save_changes'])){

        $form_project_title = $_POST['project_title'];
        $form_project_link = $_POST['project_link'];
        
        $form_project_image = $_FILES['project_image']['name'];
        $form_project_image_tmp = $_FILES['project_image']['tmp_name'];

        //getting the no. of error in uploading the file     
        $fileError = $_FILES['project_image']['error'];     
        //Getting the file ext     
        $fileExt = explode('.', $form_project_image);     
        $fileActualExt = strtolower(end($fileExt));     
        //Array of Allowed file type     
        $allowedExt = array("jpg","jpeg","png");     
        //Checking, Is file extentation is in allowed extentation array     
        if(in_array($fileActualExt, $allowedExt)){         
            
            //Checking, Is there any file error         
            if($fileError == 0){                          
                move_uploaded_file($form_project_image_tmp, "./project_images/$form_project_image");

                $update_tbl = mysqli_query($conn, "UPDATE projects SET 
                project_title = '$form_project_title', 
                project_link = '$form_project_link', 
                project_image = '$form_project_image' WHERE id=$id");

                if($update_tbl) {
                    echo "<script>alert('Project Updated Successfully.')</script>";
                    echo "<script>window.open('index.php#projects', '_self')</script>";             
                }

            }else{             
                //Message, If there is some error             
                echo "<script>alert('The type of file you provided is not supported')</script>";         
            }   
        }
        echo "<script>alert('The type of file you provided is not supported')</script>";
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
        }
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container container-custom form-container w-50" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><!--use this opacity: 0; if the form is blocking the error message-->
        
        <h1 class="fs-5 mt-3">Edit project</h1>
        <hr>
        <form class="d-flex flex-column" method="post" enctype="multipart/form-data">
            
            <label class="form-label mt-3" for="project_title">Project title</label>
            <input class="form-control" type="text" id="project_title" value="<?php echo $project_title; ?>" name="project_title" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="project_image">Project image</label>
            <input class="form-control" type="file" id="project_image" value="<?php echo $project_image; ?>" name="project_image" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="project_link">Project link</label>
            <input class="form-control" type="text" id="project_link" value="<?php echo $project_link; ?>" name="project_link" 
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