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
    $skill_id = $_GET['id'];

    //get data
    $get_skill = mysqli_query($conn, "SELECT * FROM `soft_skills` WHERE id=$skill_id");

    //fetch data
    while ($fetch_skill = mysqli_fetch_assoc($get_skill)) {
        $soft_skill = $fetch_skill['soft_skills'];
        $curr_skill_rating = $fetch_skill['skill_rating'];
    }

    if(isset($_POST['edit_skill'])){
        
        $soft_skill = $_POST['soft_skill'];
        // Check if the 'skill_rating' key exists in the $_POST array
        $skill_rating = isset($_POST['skill_rating']) ? $_POST['skill_rating'] : '';

        if($skill_rating == "") {

            //set equal to cuurent skill rating
            $skill_rating =  $curr_skill_rating;
        
            //update query
            $update_skill = mysqli_query($conn, "UPDATE soft_skills SET 
            soft_skills = '$soft_skill', skill_rating = $skill_rating 
            WHERE id=$skill_id");

            if($update_skill) {
                echo "<script>alert('Skill Successfully Updated.')</script>";
                echo "<script>window.open('index.php#skills', '_self')</script>";
            }

        }else if ($skill_rating !== ""){

            //update query
            $update_skill = mysqli_query($conn, "UPDATE soft_skills SET 
            soft_skills = '$soft_skill', skill_rating = $skill_rating 
            WHERE id=$skill_id");

            if($update_skill) {
                echo "<script>alert('Skill Successfully Updated.')</script>";
                echo "<script>window.open('index.php#skills', '_self')</script>";
            }
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit soft skill</title>

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
            .container3 {
                width: 100% !important;
                margin-top: .75rem;
            }
        }
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container container-custom form-container w-50" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        
        <h1 class="fs-5 mt-3">Edit soft skill</h1>
        <p style="text-align: justify;">Soft skills, also known as interpersonal or people skills, are the personal attributes 
            and qualities that relate to how individuals interact with others and navigate their 
            social and work environments.
        </p>
        <hr>
        <form class="d-flex flex-column" method="post">
            <div class="container2 d-flex gap-1">
                <div class="w-100">
                    <label class="form-label" for="soft_skill">Skill:</label>
                    <input class="form-control" type="text" id="soft_skill" name="soft_skill" value="<?php echo $soft_skill; ?>" placeholder="e.g.(leadership, managearal, communication)." 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
                <div class="container3 w-50">
                    <label class="form-label">Rate this skill from 1 to 10:</label>
                    <select class="form-select" name="skill_rating" style="background-color: #DED1B7; border: 1px solid #262018;">
                        <option value="" disabled selected><?php echo $curr_skill_rating; ?></option>
                        <option>10</option>
                        <option>9</option>
                        <option>8</option>
                        <option>7</option>
                        <option>6</option>
                        <option>5</option>
                        <option>4</option>
                        <option>3</option>
                        <option>2</option>
                        <option>1</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn mt-4" style="background-color: #262018; color: #DED1B7;" 
                    name="edit_skill">Save changes</button>
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