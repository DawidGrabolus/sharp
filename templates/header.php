<?php
session_start();

if (isset($_SESSION['id'])) {
  echo '<nav class="fixed">
    <div class="left__side">
      <a href="#">
        <span class="nav__title">Sharp</span>
      </a>
      
      <div class="version">
        <span class="version__text">v1.9.0</span>
      </div>
     
    
      <div class="update">
        <div class="dot"></div>
        <span class="update__text">Last updated 05.11.2023</span>
      </div>
    </div>
    <div class="right__side">
      <div class="ikony">
      <a href = "http://xazovsky.me/pages/logout.php" class="together">
        <div class="cheer item__right">
          <div class="thanks__text">
           <i class="fa-solid fa-right-from-bracket heart"></i>
              <span class="ahref">Log out</span>
      
    </div> 
    </div></a>
    </div>
    </div>
    </nav>';
} else {
  echo '<nav class="fixed">
<div class="left__side">
  <a href="#">
    <span class="nav__title">Sharp</span>
  </a>
  
  <div class="version">
    <span class="version__text">v1.9.0</span>
  </div>
 

  <div class="update">
    <div class="dot"></div>
    <span class="update__text">Last updated 05.11.2023</span>
  </div>
</div>
<div class="right__side">
  <div class="ikony">
  <a href = "pages/login.php" class="together">
    <div class="cheer item__right">
      <div class="thanks__text">
       <i class="fa-solid fa-user heart"></i>
          <span class="ahref">Log in</span>
  
</div> 
</div></a>
</div>
</div>
</nav>';
}
?>

