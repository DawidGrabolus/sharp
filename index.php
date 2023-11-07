<?php
session_start();
include_once("includes/db.php");

//Wpisywanie kodu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $code = $_POST["code"];
  $query = "SELECT id FROM folders WHERE id = '$code'";
  $result = mysqli_query($conn, $query);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $testQuery = "SELECT folder_id FROM share_file WHERE folder_id = '$code'";
    $testResult = mysqli_query($conn, $testQuery);


    $_SESSION["code"] = $row['id'];
    if (mysqli_num_rows($testResult) > 0) {
      die(header("Location: http://xazovsky.me/pages/download-file.php"));

    } else {
      die(header("Location: http://xazovsky.me/pages/upload-file-with-code.php"));
    }
  }
}

//1

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <?php
  if (isset($_SESSION['id'])) {
    echo '  <link rel="stylesheet" href="assets/css/panel.css" />';
  } else {
    echo '<link rel="stylesheet" href="assets/css/style.css" />';
  }
  ?>



  <script src="https://kit.fontawesome.com/e19a838c91.js" crossorigin="anonymous"></script>
  <title>Sharp</title>
  <link rel="icon" href="./assets/css/sharp.png">
</head>

<body>
  <!--==================== Background ====================*/-->
  <?php include 'templates/header.php' ?>
  <?php include 'templates/main.php' ?>
</body>

</html>

<script>
  // Obsługa przycisku hamburgera
  const mobileToggle = document.getElementById('mobileToggle');
  const mobileMenu = document.getElementById('mobileMenu');

  mobileToggle.addEventListener('click', () => {
    mobileMenu.style.display = mobileMenu.style.display === 'none' ? 'flex' : 'none';
  });

</script>