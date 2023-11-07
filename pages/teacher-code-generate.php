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
            $_SESSION["code"] = $id;
            $code = $_SESSION["code"];
            header("refresh:0;url=http://xazovsky.me/pages/code.php");
        } else {
            echo "Błąd podczas generowania kodu: " . $conn->error;
        }


        // Zamknij połączenie
        $conn->close();
    }
} else {
    header("refresh:0;url=http://xazovsky.me/");
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
    <link rel="stylesheet" href="../assets/css/teacher-code-generate.css">
    <link rel="icon" href="../assets/css/sharp.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        <div class="right card__border">
            <div class="nvm">
                <span class="title">Generate your <span class="diff3">code!</span></span>
                <a href="../index.php">
                    <div class="goback">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                </a>

            </div>

            <span class="subtitle">Generate your special code to keep in touch with your students.</span>


            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="mail1" id="myDiv">
                    <i class="uil uil-paperclip mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Test Name</span>
                        <input id="name" type="text" placeholder="Type your test name" name="name" required>
                    </div>
                </div>
                <div class="password" id="myDiv">
                    <i class="uil uil-backpack mail__icon"></i>
                    <div class="mail__right">
                        <span class="subtitle2">Class Name</span>
                        <input id="name" type="text" placeholder="Type your class name" name="class_name" required>
                    </div>
                </div>
                <button type="submit" name="generate_code" class="submit__button">Generate Code</button>
            </form>
        </div>
    </main>
</body>

</html>