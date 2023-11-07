<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e19a838c91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/code.css">
    <link rel="icon" href="../assets/css/sharp.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<style>
    p {
        text-align: center;
    }
</style>

<body>
    <?php
    session_start();
    $code = $_SESSION['code'];
    ?>
   <main>

<div class="right card__border">
    <div class="nvm">
        <span class="title">Success!</span>
        <a href="../index.php">
            <div class="goback">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
        </a>

    </div>

    <span class="subtitle">Copy the code below and share it with your students.</span>


    <div class="row">
        <span class="subtitle0">Your code:  <span class="diff3 title" id="p1"><?php echo $code; ?></span></span>
        <button onclick="copyToClipboard('#p1')" class="mt1">Copy</button>
    </div>
    
    
</div>
</main>
    
</body>

</html>

<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>

