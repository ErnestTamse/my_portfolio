<?php

include "../includes/connect_db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $get_work = mysqli_query($conn, "SELECT * FROM `work_experience` WHERE id=$id");
    
    while($fetch_data = mysqli_fetch_assoc($get_work)){
        $company = $fetch_data['company_name'];
        $position = $fetch_data['position'];
        $company_address = $fetch_data['company_address'];
        $employment_period = $fetch_data['employment_period'];
    }

    if(isset($_POST['save_changes'])){
        $company = $_POST['company'];
        $position = $_POST['position'];
        $company_address = $_POST['company_address'];
        $employment_period = $_POST['employment_period'];

        $update_tbl = mysqli_query($conn, "UPDATE work_experience SET 
            company_name = '$company', 
            position = '$position', 
            company_address = '$company_address', 
            employment_period = '$employment_period' WHERE id=$id");

            if($update_tbl) {
                echo "<script>alert('Work Experiece Updated Successfully.')</script>";
                echo "<script>window.open('index.php#work_experience', '_self')</script>";
            }
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
    </style>

</head>
<body style="background-color: grey;">

    <div data-aos="fade-right" class="container form-container w-50" 
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        
        <h1 class="fs-5 mt-3">Edit work experience</h1>
        <hr>
        <form class="d-flex flex-column" method="post">
            <label class="form-label" for="company">Company:</label>
            <input class="form-control" type="text" id="company" value="<?php echo $company; ?>" name="company" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="position">Position:</label>
            <input class="form-control" type="text" id="position" value="<?php echo $position; ?>" name="position" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="company_address">Company address:</label>
            <input class="form-control" type="text" id="company_address" value="<?php echo $company_address; ?>" name="company_address" 
                style="background-color: #DED1B7; border: 1px solid #262018;" required>

            <label class="form-label mt-3" for="employment_period">Employment period:</label>
            <input class="form-control" type="text" id="employment_period" value="<?php echo $employment_period; ?>" name="employment_period" 
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