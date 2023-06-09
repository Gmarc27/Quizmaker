<?php 
session_start();

include("connection.php");
include("functions.php");


$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Responsive</title>
   <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>


<form method="POST" action="logout.php">
    <header>
        <h2 class = "logo"> Quiz Maker </h2>
        <nav class = "navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#" class="contact">Contact</a>
            <button class ="btnLogout" href="logout.php">Logout</button>
        </nav>
       
    </header>
</form>
    <div class="container">
            <div class="form-box quiz">
                        <h2>QUIZMAKER</h2>
                    </div>
            </div>  
        </div>

    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/afc379b9be.js" crossorigin="anonymous"></script>
</body>
</html>