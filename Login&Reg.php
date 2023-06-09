<?php
session_start();

include("connection.php");
include("functions.php");

// Registration logic
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $quizmaker = isset($_POST['quizmaker']) ? 1 : 0;

    if (!empty($username) && !empty($email) && !empty($password) && !is_numeric($username)) {
        // Save to database
        $user_id = random_num(12);

        $query = "INSERT INTO user_accounts (user_id, username, email, password, quizmaker) VALUES ('$user_id', '$username', '$email', '$password', $quizmaker)";

        mysqli_query($con, $query);

        header("Location: Login&Reg.php");
        die;
    } else {
        echo "Please enter valid information!";
        die;
    }
}
// Login logic
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM user_accounts WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];
                if ($user_data['quizmaker'] != 1) {
                    header("Location: index.php");
                    die;
                } else {
                    header("Location: quizindex.php");
                    die;
                }
            }
        }
    }

    echo "Invalid email or password!";
    die;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
   <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>


    <header>

        <h2 class =  "logo"> Quiz Maker </h2>
        <nav class = "navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#" class="contact">Contact</a>
            <button class = "btnLoginPopup">Login</button>
        </nav>

    </header>
   

    <div class="wrapper">
        <div class="form-box login">
            <section class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </section>
            <h2>Login</h2>
            <form action="Login&Reg.php" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn" value="login" name="login">Login</button>
                <div class="login-register">
                    <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <section class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </section>
            <h2>Registration</h2>
            <form action="Login&Reg.php" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot register">
                    <label><input type="checkbox" name="quizmaker[ ]">Register as Quiz Maker</label>
                </div>
                <button type="submit" class="btn" value="register" name="register">Register</button>
                <div class="login-register">
                    <p>Already have an account?<a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
        <div class="form-box contact">
            <section class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </section>
            <h2>Contact</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="text" required>
                    <label>Message</label>
                </div>
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/afc379b9be.js" crossorigin="anonymous"></script>
</body>
</html>