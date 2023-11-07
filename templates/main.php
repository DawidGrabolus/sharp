<?php
    session_start();
    include_once("includes/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT type FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
    if (isset($_SESSION['id']) && $row['type'] == 1) {
        echo'<main>
        <div class="section background">
          <div class="section__top__side">
            <div class="section__left__side">
              <div class="section__left__content">
                <span class="title">Generate your <span class="diff3">code.</span>
                </span>
    
                <span class="subtitle">Click the button to get your <span class="diff3">code</span></span>
    

                

                <div class="buttons">
                    <a href="pages/teacher-code-generate.php">
                      <button type="submit" name="generate_code" class="create__test__button1">
                        Create test
                        <i class="fa-solid fa-barcode getcode__icon"></i>
                      </button>
                    </a>
                    <a href="pages/share-file.php">
                      <button type="submit"  name="generate_code" class="create__test__button1">
                        Send file
                        <i class="fa-solid fa-file-arrow-up getcode__icon"></i></i>
                      </button>
                    </a>
                  
                </div>
                <div class="buttons2">
                  <a href="pages/teacher-panel.php">
                    <button type="submit" name="generate_code" class="create__test__button button0">
                      Control Panel
                      
                    </button>
                  </a>
                </div>
                
                
              </div>
    
            </div>
            
          </div>
    
    
    
          <div class="cards">
            <div class="card__top advisor card__one card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-camera"></i>
                </div>
                <span class="card__title">Photos</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Easily share your creations with your teacher</span>
              </div>
            </div>
    
            <div class="card__top giving__advice card__two card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-file"></i>
                </div>
                <span class="card__title">Files</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Let your teacher know about your new projects</span>
              </div>
            </div>
    
            <div class="card__top giving__advice card__three card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-message"></i>
                </div>
                <span class="card__title">Message</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Easily text your teacher about something</span>
              </div>
            </div>
    
            <div class="card__top giving__advice card__four card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-ellipsis-h"></i>
                </div>
                <span class="card__title">More</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Get started to learn more about us</span>
              </div>
            </div>
          </div>
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
    
      </main>';
    } else {
        echo '<main>
        <div class="section background">
          <div class="section__top__side">
            <div class="section__left__side">
              <div class="section__left__content">
                <span class="title">Share <span class="diff3">files, photos,<br> thoughts and more</span><br> with
                  your teacher.<br />
                </span>
    
                <span class="subtitle">everything with <span class="diff3">#</span></span>
    
                <div class="buttons">
                  <a href="#code">
                    <div class="button" id="button">
                      <span class="button__text">Get Started</span>
                      <i class="uil uil-arrow-right" id="icon"></i>
                    </div>
                  </a>
    
                </div>
              </div>
    
            </div>
            <div class="section__righ__side">
    
            </div>
          </div>
    
    
    
          <div class="cards">
            <div class="card__top advisor card__one card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-camera"></i>
                </div>
                <span class="card__title">Photos</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Easily share your creations with your teacher</span>
              </div>
            </div>
    
            <div class="card__top giving__advice card__two card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-file"></i>
                </div>
                <span class="card__title">Files</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Let your teacher know about your new projects</span>
              </div>
            </div>
    
            <div class="card__top giving__advice card__three card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-message"></i>
                </div>
                <span class="card__title">Message</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Easily text your teacher about something</span>
              </div>
            </div>
    
            <div class="card__top giving__advice card__four card__border">
              <div class="card__nav">
                <div class="card__icon4">
                  <i class="uil uil-ellipsis-h"></i>
                </div>
                <span class="card__title">More</span>
              </div>
    
              <div class="card__text">
                <span class="card__txt">
                  Get started to learn more about us</span>
              </div>
            </div>
          </div>
        </div>
    
        <div class="section tags code" id="code">
    
          <div class="section__top__side">
            <div class="section__left__side">
              <div class="section__left__content">
                <span class="title2">Do you have<br> your <span class="diff2">special</span> code?<br />
                </span>
    
                <span class="subtitle2 mt">Paste it below<br></span>
    
                
                  <form class="mt" method="post" action="index.php">
                    <input type="text" name="code"placeholder="Enter your code" class="code__input">
                    <button type="submit" name="submit" class="code__button"><i class="uil uil-message code__icon"></i></button>
                  </form>
                
                
    
                <span class="danger subtitle__danger"><br>*To get this code your teacher needs to create a class</span>
    
              </div>
    
            </div>
            <div class="section__righ__side">
    
            </div>
          </div>
        </div>
    
        <div class="section tags" id="tags2">
        <div class="tags__left">
        <span class="title2">Who
          <span class="diff">we</span> are?
          <br />
  
  
          <span class="subtitle2">Get to know us better</span>
      </div>
      <div class="tags__right">
        <div class="code__text">
          <div class="dots">
            <div class="dot1"></div>
            <div class="dot2"></div>
            <div class="dot3"></div>
          </div>
          <div class="text__text">
          <span class="console"><span class="whiteee">SharpGroup</span>, we are a group of 5 creative teenagers who want to make sharing files easier. Our website was built for the <span class="blueee">HackHeroes</span> project, but we also want to finish this website and share it with our school so they can use it. We are currently studying at <span class="greennn">ZSEiI</span> (<span class="greennn">Zespół Szkół Elektronicznych i Informatycznych</span>) in Sosnowiec. We are in the 3rd grade with some cool experience. 
          Enjoy!</span>
          </div>
        </div>
      </div>
        </div>
    
        <div class="section tags" id="tags2">
        <div class="tags__left">
          <span class="title2">What is this
          <span class="diff4">for?</span>
          <br />
  
  
          <span class="subtitle2">Why did we create this website?</span>



          
    


      </div>
      <div class="tags__right">
        <div class="code__text">
          <div class="dots">
            <div class="dot1"></div>
            <div class="dot2"></div>
            <div class="dot3"></div>
          </div>
          <div class="text__text">
            <span class="console">We created this website to make the lives of <span class="blueee">teachers</span> and <span class="blueee">students</span> easier. Normally, when sending files to your teacher, you need to log into your account, which can be a waste of time. However, with <span class="whiteee">Sharp</span>, you can easily send files without logging in (although you have the option to do so if desired). We hope that our website will be helpful to you, and <span class="pinkkk">thank you</span> for using it!</span>
          </div>
        </div>
      </div>
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
    
      </main>';
    }
?>

  
