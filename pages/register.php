<?php
session_start();
include_once("../includes/db.php");
$error_message = ""; // Inicjalizuj pusty komunikat o b��dzie

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST["name"];
    $type = $_POST["type"];



    $query = "SELECT * FROM users WHERE mail = '$email'";
    $result = mysqli_query($conn, $query);

    if ($password == $password2) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($result->num_rows > 0) {
            $error_message = "Email is Already Registered"; 
        } else {
            $sql = "INSERT INTO users (name, password, mail,type) VALUES ('$name', '$password', '$email', '$type')";
            if ($conn->query($sql) === TRUE) {
                echo "Success!";
                $_SESSION["email"] = $email;
                header("Location: http://xazovsky.me/pages/login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
    } else {
        echo "Hasła się różnią.";
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
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" href="../assets/css/sharp.png">
</head>

<body>
    <main>

        <div class="right card__border">
            <div class="nvm">
                <span class="title">Nice to see <span class="diff3">you!</span></span>
                <a href="../index.php">
                    <div class="goback">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                </a>

            </div>
            <span class="subtitle">Create an account to access more features.</span>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="mail1">
                    <i class="uil uil-user mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Name</span>
                        <input id="mail1Input" type="text" name="name" placeholder="Type your name" required>
                    </div>
                </div>

                <div class="mail">
                    <i class="uil uil-envelope mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Email Address</span>
                        <input type="email" id="email" name="email" placeholder="Type your email" required>
                    </div>
                   
                </div>
                <div id="error_message" class="error-message"><?php echo $error_message; ?></div> 
                <div class="password">
                    <i class="uil uil-lock mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Password</span>
                        <input id="passwordInput" type="password" name="password" placeholder="Type your password"
                            required>
                    </div>

                </div>
                <div class="password" id="confirmPassword">
                    <i class="uil uil-lock mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Confirm Password</span>
                        <input type="password" id="inConfirmPassword" name="password2" placeholder="Type your password"
                            required>
                    </div>
                </div>

                <select name="type">
                    <option selected value="1">Teacher</option>
                    <option value="0">Student</option>

                </select>



                <div class="buttons">
                    <button class="button" type="submit" name="login">
                        <span class="button__text">Create Account</span>
                    </button>



                    <a href="login.php">
                        <div class="button2" id="button2">
                            <span class="button__text">Have an account</span>
                        </div>
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
<script src="../assets/js/main.js"></script>