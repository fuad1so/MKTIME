<?php

ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signUp"])) {
        $regFirstName = filter_input(INPUT_POST, "regFirstName", FILTER_SANITIZE_SPECIAL_CHARS);
        $regLastName = filter_input(INPUT_POST, "regLastName", FILTER_SANITIZE_SPECIAL_CHARS);
        $register_email = $_POST["regEmail"];
        // Password hash
        $register_password = password_hash($_POST["regPassword"], PASSWORD_DEFAULT);
        $sqlinsert = "INSERT INTO users (first_name,last_name,email,pass)
        VALUES ('$regFirstName', '$regLastName', '$register_email', '$register_password')";

        if (mysqli_query($link, $sqlinsert)) {
            echo ' <div class="alert alert-success mt-4 position-absolute top-0 start-50 translate-middle-x" role="alert">
           You have registerd successfully 
        </div>';
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $logEmail = $_POST["logEmail"];
        $logPassword = $_POST["logPassword"];
        $sqlCheck = " SELECT pass FROM users WHERE email = ?";
        $stmt = mysqli_prepare($link, $sqlCheck);
        mysqli_stmt_bind_param($stmt, "s", $logEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $password);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        if ($logPassword === $password) {
            header("Location:profile.php");
            exit;
        } else {
            echo ' <div class="alert alert-danger mt-4 position-absolute top-0 start-50 translate-middle-x" role="alert">
               logpassword:' . $logPassword . ',password:' . $password . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="template/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="template/Images/backImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Every new friend is a <br> new adventure</span>
                    <span class="text-2">Let's get connected</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="template/Images/frontImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Complete miles of journey <br> with one step</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content" action="">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="#" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Enter your email" name="logEmail" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" name="logPassword" required>
                            </div>
                            <div class="text"><a href="#">Forgot password?</a></div>
                            <div class="button input-box">
                                <input type="submit" value="Submit" name="login">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your first name" name="regFirstName" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your last name" name="regLastName" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Enter your email" name="regEmail" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" name="regPassword" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit" name="signUp">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>