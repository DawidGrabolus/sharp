<?php
session_start();
include_once("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST['password'];

    $query = "SELECT id, password FROM users WHERE mail = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION["id"] = $row['id']; // Ustaw user_id w sesji
            $_SESSION["mail"] = $email;
            header("Location: http://xazovsky.me");
            exit();
        } else {
            echo "Niepoprawne hasło.";
        }
    } else {
        echo "Brak użytkownika o podanym emailu.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e19a838c91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Log in</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" href="../assets/css/sharp.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>

        <div class="right card__border">
            <div class="nvm">
                <span class="title">Welcome <span class="diff3">Back!</span></span>
                <a href="../index.php">
                    <div class="goback">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                </a>

            </div>

            <span class="subtitle">Login to your account to access more features.</span>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="mail1">
                    <i class="uil uil-envelope mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Email Address</span>
                        <input id="mail1Input" type="email" name="email" placeholder="Type your email" required>
                    </div>
                </div>
                <div class="password">
                    <i class="uil uil-lock mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Password</span>
                        <input id="passwordInput" type="password" name="password" placeholder="Type your password"
                            required>
                    </div>
                </div>

                <div class="forgot">
                    <div class="forgot__left">
                        <div class="checkbox-wrapper-13">
                            <input id="c1-13" type="checkbox" id="rememberMe" value="lsRememberMe">
                            <label for="c1-13">Remember Me</label>
                        </div>



                    </div>

                </div>

                <div class="buttons">
                    <button class="button" type="submit" name="login">
                        <span class="button__text">Login Now</span>
                    </button>


                    <a href="register.php">
                        <div class="button2" id="button2">
                            <span class="button__text">Create Account</span>
                        </div>
                    </a>




                </div>
            </form>
        </div>
    </main>

</body>


</html>
<script src="../assets/js/main.js"></script>