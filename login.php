<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Omar Shehabi</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="shortcut icon" href="favicon.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.4/TweenMax.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  </head>
  <body>
    <div class="cursor"></div>
    <div class="nav">
      <div class="artist"><a href="index.html">Omar Shehabi</a></div>
      <div class="login">
      <?php
        if(isset($_SESSION["useruid"])){
          echo "<li>Hello there " . $_SESSION["useruid"]."</li>";
          echo "<li><a href='logout.inc.php'>Log out</a></li>";
        }
        else{
          echo "<li><a href='login.php'>Sign up</a></li>";
          echo "<li><a href='login.php'>Log in</a></li>";
        }

      ?>
      </div>
    </div>

    <div class="menu-btn">
      <button type="button"><ion-icon name="menu"></ion-icon></button>
    </div>
    <div class="menu">
      <div class="row">
          <div class="col-lg overlay">
              <div class="nav">
                  <ul>
                      <li><a href="index.html">Home</a></li>
                      <li><a href="portfolio.html">Portfolio</a></li>
                      <li><a href="aboutme.html">My Story</a></li>
                      <li><a href="#">Contact me</a></li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
    <div class="social-media">
      <ul>
            <a href="https://www.facebook.com/lazyvisuals/"><li><ion-icon name="logo-facebook"></ion-icon></li></a>
            <a href="https://www.instagram.com/omar.shehabii/"><li><ion-icon name="logo-instagram"></ion-icon></li></a>
      </ul>
    </div>
    <div class="explore-btn">
      <a href="aboutme.html" class="btn">
          <span class="text">Text</span>
          <span class="flip-front">My Story</span>
          <span class="flip-back">Explore</span>
      </a>
    </div>

    <section class="forms-section">
        <div class="forms">
          <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
              Login
              <span class="underline"></span>
            </button>
            <form class="form form-login" method="POST" action="login.inc.php">
              <fieldset>
                <legend>Please, enter your email and password for login.</legend>
                <div class="input-block">
                  <label for="login-email">E-mail/Username</label>
                  <input id="login-email" type="text" name="uid" required>
                </div>
                <div class="input-block">
                  <label for="login-password">Password</label>
                  <input id="login-password" type="password" name="pwd" required>
                </div>
              </fieldset>
              <button type="submit" name="submit" class="btn-login">Login</button>

              <?php
                    if(isset($_GET["error"])){
                      if($_GET["error"] == "emptyinput"){
                          echo "<p> Fill in all fields!</p>";
                      }
                      else if($_GET["error"] == "wronglogin"){
                          echo "<p> Incorrect login information!</p>";
                      }
                    }
              ?>

            </form>
          </div>
          <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
              Sign Up
              <span class="underline"></span>
            </button>
            <form class="form form-signup" method="POST" action="signup.inc.php">
              <fieldset>
                  <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                  <div class="input-block">
                    <label for="signup-name">Full Name</label>
                    <input id="signup-name" type="text" name="name" required>
                  </div>
                  <div class="input-block">
                    <label for="signup-email">E-mail</label>
                    <input id="signup-email" type="email" name="email" required>
                  </div>
                  <div class="input-block">
                    <label for="signup-username">Username</label>
                    <input id="signup-username" type="text" name="uid" required>
                  </div>
                  <div class="input-block">
                    <label for="signup-password">Password</label>
                    <input id="signup-password" type="password" name="pwd" required>
                  </div>
                  <div class="input-block">
                    <label for="signup-password-confirm">Confirm password</label>
                    <input id="signup-password-confirm" type="password" name="pwdrepeat" required>
                  </div>
                </fieldset>
              <button type="submit" name="submit" class="btn-signup">Continue</button>
                    <?php
                    if(isset($_GET["error"])){
                      if($_GET["error"] == "emptyinput"){
                          echo "<p> Fill in all fields!</p>";
                      }
                      else if($_GET["error"] == "invaliduid"){
                          echo "<p> Choose a proper username!</p>";
                      }
                      else if($_GET["error"] == "invalidemail"){
                          echo "<p> Choose a proper email!</p>";
                      }
                      else if($_GET["error"] == "passwordsdontmatch"){
                          echo "<p> Passwords don't match!</p>";
                      }
                      else if($_GET["error"] == "stmtfailed"){
                          echo "<p> Something went wrong, try again!</p>";
                      }
                      else if($_GET["error"] == "usernametaken"){
                          echo "<p> Username already taken!</p>";
                      }
                      else if($_GET["error"] == "none"){
                          echo "<p> You have signed up!</p>";
                      }
                    }
              ?>
            </form>
          </div>
        </div>
    </section>

    <script>
        const switchers = [...document.querySelectorAll('.switcher')]

        switchers.forEach(item => {
            item.addEventListener('click', function() {
                switchers.forEach(item => item.parentElement.classList.remove('is-active'))
                this.parentElement.classList.add('is-active')
            })
        })

    </script>

    <script>
      var $cursor = $(".cursor"),
        $overlay = $(".project-overlay");

      function moveCircle(e) {
        TweenLite.to($cursor, 0.5, {
          css: {
            left: e.pageX,
            top: e.pageY
          },
          delay: 0.03
        });
      }

      $(".p-1").hover(function() {
        $(".cursor").css({ "background-image": "url(image-1.jpg)" });
      });
      $(".p-2").hover(function() {
        $(".cursor").css({ "background-image": "url(image-2.jpg)" });
      });
      $(".p-3").hover(function() {
        $(".cursor").css({ "background-image": "url(image-3.jpg)" });
      });
      $(".p-4").hover(function() {
        $(".cursor").css({ "background-image": "url(image-4.jpg)" });
      });

      var flag = false;
      $($overlay).mousemove(function() {
        flag = true;
        TweenLite.to($cursor, 0.3, { scale: 1, autoAlpha: 1 });
        $($overlay).on("mousemove", moveCircle);
      });

      $($overlay).mouseout(function() {
        flag = false;
        TweenLite.to($cursor, 0.3, { scale: 0.1, autoAlpha: 0 });
      });
    </script>

    <script>
      
      var t1 = new TimelineMax({paused: true});
      
      t1.to(".overlay", 1.6, {
          
          top: 0,
          ease: Expo.easeInOut
          
      });
      
      t1.staggerFrom(".menu ul li", 1, {y: 100, opacity: 0, ease: Expo.easeOut}, 0.1);
      
      t1.reverse();
      $(document).on("click", ".menu-btn", function() {
          t1.reversed(!t1.reversed());
      });
      
      t1.reverse();
      $(document).on("click", "li", function() {
          t1.reversed(!t1.reversed());
      });

    </script>
  </body>
</html>
