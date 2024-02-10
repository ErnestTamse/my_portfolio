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

if(isset($_POST['add_skill'])){
    $hard_skill = $_POST['hard_skill'];
    $skill_rating = $_POST['skill_rating'];
    
    $insert_data = mysqli_query($conn, "INSERT INTO `hard_skills` (user_id, hard_skills, skill_rating) 
        VALUE ($user_id, '$hard_skill', $skill_rating)");

        if($insert_data) {
            echo "<script>alert('Skill Successfully Added.')</script>";
            echo "<script>window.open('index.php#skills', '_self')</script>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add hard skill</title>

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
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container form-container w-50" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        
        <h1 class="fs-5 mt-3">Add hard skill</h1>
        <p style="text-align: justify;">Hard skills are specific, teachable abilities or knowledge that can be 
        easily quantified and measured. They are often technical in nature and can be acquired through education, 
        training, or experience.
        </p>
        <hr>
        <form class="d-flex flex-column" method="post">
            <div class="d-flex gap-1">
                <div class="w-100">
                    <label class="form-label" for="hard_skill">Skill:</label>
                    <input class="form-control" type="text" id="hard_skill" name="hard_skill" placeholder="e.g.(data analysis, graphic design, accounting)." 
                        style="background-color: #DED1B7; border: 1px solid #262018;" required>
                </div>
                <div class="w-50">
                    <label class="form-label">Rate this skill from 1 to 10:</label>
                    <select class="form-select" name="skill_rating" style="background-color: #DED1B7; border: 1px solid #262018;" required>
                        <option value="" disabled selected>Select rating</option>
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
                    name="add_skill">Add skill</button>
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