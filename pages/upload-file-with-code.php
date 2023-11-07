<?php
session_start();
include_once("../includes/db.php");

$code = $_SESSION["code"];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $studentNumber = $_POST["student-number"];
    $file = $_FILES["file"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    // Zapisz informacje do bazy danych
    
    
        if (isset($_FILES['file'])) {
            
            $targetDirectory = "../files/" . $code . "/";
            $targetFile = $targetDirectory . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $originalFileName = $_FILES["file"]["name"];
            $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $newFileName = $first_name . "_" . $last_name . "_" . $studentNumber . ".$extension"; // Tutaj możesz ustawić nową nazwę pliku
            $newFilePath = $targetDirectory . $newFileName;

            if (rename($targetFile, $newFilePath)) {
                $sql = "INSERT INTO test_file (folder_id ,student_id,first_name,last_name,extension ) VALUES ('$code','$studentNumber','$first_name', '$last_name','$extension')";
                $result = mysqli_query($conn, $sql);
                echo "Plik został pomyślnie przesłany";
            } else {
                echo "Wystąpił błąd podczas przesyłania pliku.";
            }
        } else {
            die("nie");
        }

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
    <link rel="stylesheet" href="../assets/css/sharewithcode.css">
    <link rel="icon" href="../assets/css/sharp.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        <div class="right card__border">
            <div class="nvm">
                <span class="title">Share your <span class="diff3">file</span></span>
                <a href="../index.php">
                    <div class="goback">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                </a>

            </div>

            <span class="subtitle">Your class code: <?php echo "" . $code . ""; ?>.</span>

            
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="mail1" id="myDiv">
                        <i class="uil uil-briefcase mail__icon"></i>
                            <div class="mail__right">
                                <span class="subtitle2">Your diary number</span>
                                <input type="number" id="student-numer mouse-only-number-input" min="0" max="50" name="student-number" required placeholder="Type your diary number" class="number__input">
                            </div>
                        </div>
                        <div class="password" id="myDiv">
                            <i class="uil uil-user mail__icon"></i>
                            <div class="mail__right">
                                <span class="subtitle2">Name</span>
                                <input type="text" id="student-numer" name="first_name" required placeholder="Type your name">
                            </div>
                        </div>
                        <div class="password" id="myDiv">
                            <i class="uil uil-user mail__icon"></i>
                            <div class="mail__right">
                                <span class="subtitle2">Surname</span>
                                <input type="text" id="student-numer" name="last_name" required placeholder="Type your surname">
                            </div>
                        </div>
                        
                        <div class="flex__row">
                        <div id="file-container">
                            <input type="file" id="file-input" name="file" class="file__pick" required>
                            <div id="custom-button" class="pick__file__input">Pick a file</div>
                        </div>
                        
                        <script>
                            document.getElementById('custom-button').addEventListener('click', function() {
                                document.getElementById('file-input').click();
                            });
                        </script>
                        <button type="submit" name="submit" class="submit__button">Send</button>
                        </div>
                        
            </form>
           


            </form>
        </div>
    </main>
</body>

</html>




