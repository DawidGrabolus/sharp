<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/e19a838c91.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <title>Teacher panel</title>
  <link rel="stylesheet" href="../assets/css/teacher-panel.css">
  <link rel="icon" href="../assets/css/sharp.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php include '../templates/header.php' ?>

<body>
  <main>

    <div class="section__toppp background">
      <span class="title">Manage your <span class="diff3"> classes</span></span>
      <?php
      session_start();
      $teacherID = $_SESSION['id'];
      include_once("../includes/db.php");


      $classQuery = "SELECT class_name FROM folders WHERE user_id = '$teacherID'";


      $classResult = mysqli_query($conn, $classQuery);


      $uniqueClasses = array(); // Tablica do przechowywania unikatowych klas
      
      if ($classResult->num_rows > 0) {
        while ($classRow = $classResult->fetch_assoc()) {
          $class_name = $classRow["class_name"];

          // Sprawdzenie, czy klasa została już wyświetlona
          if (!in_array($class_name, $uniqueClasses)) {
            $uniqueClasses[] = $class_name; // Dodanie klasy do tablicy unikatowych klas
      
            $testQuery = "SELECT MAX(fo.name) as name, tf.* FROM folders fo JOIN test_file tf ON fo.id = tf.folder_id WHERE user_id = '$teacherID' AND class_name = '$class_name' GROUP BY tf.folder_id ";
            $testResult = mysqli_query($conn, $testQuery);

            // Wyświetla nazwe klasy
            echo "<div class='klasa klasa1'><span class='title'>$class_name<span class='diff3'></span></span><div class='test'>";

            if ($testResult->num_rows > 0) {
              while ($testRow = $testResult->fetch_assoc()) {
                $test_name = $testRow["name"];
                $fileQuery = "SELECT f.student_id, f.first_name, f.last_name, f.folder_id, f.extension FROM test_file f JOIN folders fo ON f.folder_id = fo.id WHERE fo.user_id = '$teacherID' AND fo.class_name = '$class_name' AND fo.name = '$test_name' ";

                //Wyświetla nazwe tesu
                echo "<div class='test_name'>" . $testRow["name"] . "d</div>";
                $fileResult = mysqli_query($conn, $fileQuery);


                if ($fileResult->num_rows > 0) {
                  while ($fileRow = $fileResult->fetch_assoc()) {
                    $file_path = "../files/" . $fileRow["folder_id"] . "/" . $fileRow["first_name"] . "_" . $fileRow["last_name"] . "_" . $fileRow["student_id"] . "." . $fileRow["extension"];
                    $file_name = $fileRow["first_name"] . "_" . $fileRow["last_name"] . "_" . $fileRow["student_id"] . "." . $fileRow["extension"];

                    //Wyświetla uczniów którzy wysłali
                    echo "<div class='student'><li>" . $fileRow["first_name"] . " " . $fileRow["last_name"] . " " . $fileRow["student_id"] . "<a href='" . $file_path . "' download='" . $file_name . "'> |  Download file</a></li></div>";

                  }
                }


              }

            }
            $shareQuery = "SELECT sf.file_name, sf.folder_id, sf.extension FROM share_file sf JOIN folders fo ON sf.folder_id = fo.id WHERE fo.user_id = '$teacherID' AND fo.class_name = '$class_name'";
            $shareResult = mysqli_query($conn, $shareQuery);
            if ($shareResult->num_rows > 0) {
              echo "<span class='send__files diff3'>Shared files</span>";
              while ($shareRow = $shareResult->fetch_assoc()) {

                $fileResult = mysqli_query($conn, $fileQuery);


                $file_path = "../files/" . $shareRow["folder_id"] . "/" . $shareRow["file_name"] . "." . $shareRow["extension"];
                $file_name = $shareRow["file_name"] . "." . $shareRowRow["extension"];

                echo "<div class='student'><li>" . $shareRow["file_name"] . " (" . $shareRow['folder_id'] . ")" . "<a href='" . $file_path . "' download='" . $file_name . "'> |  Download file</a></li></div>";

              }
            }
            echo "</div></div>";

          }

        }
        echo "</div>";
      }


      ?>

    </div>
    <div class="section background2 footer__section">
      <span class="title">Contact us</span>

      <span class="subtitle3">If you have any questions or something.</span>




      <div class="cards2">

        <a href="https://twitter.com/_SharpGroup" class="card__top2 card__border card__one ">
          <div>
            <div class="card__nav">
              <div class="card__icon__twt">
                <i class="uil uil-twitter"></i>
              </div>
              <span class="card__title">Twitter<i class="uil uil-external-link-alt href__icon"></i></span>
            </div>

            <div class="card__text">
              <span class="card__txt">
                Quick message for little help.</span>
            </div>
          </div>
        </a>



        <a href="https://www.instagram.com/sharpgroupofficial/" class="card__top2 card__border card__one ">
          <div>
            <div class="card__nav">
              <div class="card__icon__ig">
                <i class="uil uil-instagram"></i>
              </div>
              <span class="card__title">Instagram<i class="uil uil-external-link-alt href__icon"></i></span>
            </div>

            <div class="card__text">
              <span class="card__txt">
                Quick message and support.</span>
            </div>
          </div>

        </a>


        <a href="https://github.com/mxteo77" class="card__top2 card__border card__one ">
          <div>
            <div class="card__nav">
              <div class="card__icon__gh">
                <i class="uil uil-github"></i>
              </div>
              <span class="card__title">Github<i class="uil uil-external-link-alt href__icon"></i></span>
            </div>

            <div class="card__text">
              <span class="card__txt">
                Check out ours projects.</span>
            </div>
          </div>

        </a>
      </div>
      <span class="footer__text">Created by <span class="blue">Sharp group</span></span>
  </main>
</body>

</html>