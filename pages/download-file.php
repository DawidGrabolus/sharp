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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        <div class="right card__border">
            <div class="nvm">
                <span class="title">Download <span class="diff3">file!</span></span>
                <a href="../index.php">
                    <div class="goback">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                </a>

            </div>

            <span class="subtitle">Download your teacher files.</span>

            <?php
            session_start();
            include_once("../includes/db.php");

            $code = $_SESSION["code"];


            $fileQuery = "SELECT sf.file_name, sf.extension FROM share_file sf JOIN folders fo ON sf.folder_id = fo.id WHERE fo.id = '$code' ";
            $fileResult = mysqli_query($conn, $fileQuery);




            if ($fileResult->num_rows > 0) {
                $fileRow = $fileResult->fetch_assoc();
                $file_path = "../files/" . $code . "/" . $fileRow["file_name"] . "." . $fileRow["extension"];
                $file_name = $fileRow["file_name"] . "." . $fileRow["extension"];
                echo $fileRow["file_name"] . "<a href='" . $file_path . "' download='" . $file_name . "'>Pobierz plik</a>";
            }



            ?>
        </div>
    </main>
    <!-- Formularz dla nauczyciela -->



</body>

</html>