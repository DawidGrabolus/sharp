<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once("../includes/db.php");

    function checkId($id)
    {
        $katalog = "../files/" . $id;
        if (!is_dir($katalog)) {

            mkdir($katalog, 0777);
        } else {

            $id = generateRandomCode();
            checkId($id);
        }
    }

    function generateRandomCode()
    {
        // Generuj losowy kod w formacie "123-456"  
        $id = "";
        for ($i = 0; $i < 6; $i++) {
            $id .= rand(1, 9); // Dodaj losową cyfrę od 1 do 9
            if ($i == 2) {
                $id .= "-"; // Dodaj myślnik po pierwszych trzech cyfrach
            }
        }
        return $id;
    }




}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate_code"])) {
    // Pobierz dane z formularza
    $name = $_POST["name"];
    $user_id = $_SESSION["id"];
    $class_name = $_POST["class_name"];
    // Pobierz ID nauczyciela z sesji
    // Generuj unikalny kod
    $id = generateRandomCode();


    checkId($id);
    // Zapisz informacje do bazy danych
    require_once "../includes/db.php"; // Połącz się z bazą danych
    $sql = "INSERT INTO folders (id, name,user_id, class_name) VALUES ('$id', '$name','$user_id', '$class_name')";
    if ($conn->query($sql) === TRUE) {
        if (isset($_FILES['file'])) {
            $targetDirectory = "../files/" . $id . "/";
            $targetFile = $targetDirectory . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                $originalFileName = $_FILES["file"]["name"];
                $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $newFileName = $name . ".$extension"; // Tutaj możesz ustawić nową nazwę pliku
                $newFilePath = $targetDirectory . $newFileName;

                if (rename($targetFile, $newFilePath)) {
                    $sql = "INSERT INTO share_file (folder_id ,file_name,extension) VALUES ('$id','$name', '$extension')";
                    $result = mysqli_query($conn, $sql);



                    $_SESSION["code"] = $id;
                    header("refresh:0;url=http://xazovsky.me/pages/code.php");
                } else {
                    echo "Wystąpił błąd podczas przesyłania pliku.";
                }
            }
        } else {
            echo "Błąd podczas generowania kodu: " . $conn->error;
        }


        // Zamknij połączenie
        $conn->close();
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
    <link rel="stylesheet" href="../assets/css/share-file.css">
    <link rel="icon" href="../assets/css/sharp.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        <div class="right card__border">
            <div class="nvm">
                <span class="title">Share <span class="diff3">file</span> with your students</span>
                <a href="../index.php">
                    <div class="goback">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                </a>

            </div>

            <span class="subtitle">Generate your special code to keep in touch with your students.</span>


            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <div class="mail1" id="myDiv">
                    <i class="uil uil-file-info-alt mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">File Name</span>
                        <input id="name" type="text" placeholder="Type your file name" name="name" required>
                    </div>
                </div>
                <div class="password" id="myDiv">
                    <i class="uil uil-backpack mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Class Name</span>
                        <input id="name" type="text" placeholder="Type your class name" name="class_name" required>
                    </div>
                </div>

                <div class="flex__row">
                    <div id="file-container">
                        <input type="file" id="file-input" name="file" class="file__pick" required>
                        <div id="custom-button" class="pick__file__input">Pick a file</div>
                    </div>

                    <script>
                        document.getElementById('custom-button').addEventListener('click', function () {
                            document.getElementById('file-input').click();
                        });
                    </script>
                    <button type="submit" name="generate_code" class="submit__button">Generate Code</button>
                </div>

            </form>



            </form>
        </div>
    </main>
</body>

</html>