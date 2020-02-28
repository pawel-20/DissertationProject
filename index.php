<?php 
session_start();
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <link rel="stylesheet" href="styles.css" />
</head>
  <body>
    <header>
      <div class="container">
        <div id="logo">
          <h1>Made-up Gallery</h1>
        </div>

        <div id="log">
        <?php 
           if(isset($_SESSION['uid'])) {
            echo '<form action="php/logout.php" method="post">
            <button type="submit" name="logout-submit">
              Log out
            </button>
          </form>';
          } else {
            echo '<form action="php/login.php" method="post">
            <input type="text" name="mailuid" placeholder="username/e-mail" />
            <input type="password" name="pwd" placeholder="password" />
            <button type="submit" name="login-submit">Log in</button>
          </form>

          <a href="register.php">Sign up</a>
';
          }

        ?>
          
          
        </div>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
      <?php
      if(isset($_SESSION['uid'])) {
        echo '<h2>Welcome</h2>';
      } else {
        echo '<h2>You are currently signed out</h2>
        <p>Please sign in to manipulate the images</p>';
      }

      ?>
        
     
      </div>
      <div class="container" id="gallery">
        <div class="box">
          <img src="img/img1.jpg" alt="" />
        </div>
        <div class="box">
          <img src="img/img3.jpg" alt="" />
        </div>
      </div>

      <?php

if(isset($_SESSION['uid'])) {
echo ' <div class="container" id="container2">
<div id="control">
  <p>Brightness</p>
<input id="bri" class="form-control-range" type="range" min="50" max="200" value="100">
<p>Contrast</p>
<input id="con" class="form-control-range" type="range" min="50" max="300" value="100" >
<p>Saturation</p>
<input id="sat" class="form-control-range" type="range" min="50" max="500" value="100">
</div>
</div>';
     
}
    ?>
      </section>
    

    
  </body>
</html>
