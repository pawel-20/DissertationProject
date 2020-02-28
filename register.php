<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <header>
      <div class="container">
        <div id="logo">
          <h1>Made-up Gallery</h1>
        </div>
        <div id="log">
          <a href="index.php">Take me back</a>
        </div>
      </div>
    </header>

    <section id="showcase">
      <div class="container register">
        <form action="php/signup.php" id="form" class="form" method="post">
          <h2>Register with us</h2>
          <?php

      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyfields") {
          echo '<p class="error">Empty fields</p>';
        }
        else if ($_GET["error"] == "invaliduidmail") {
          echo '<p class="error">Invalid username and e-mail</p>';
        }
        else if ($_GET["error"] == "invaliduid") {
          echo '<p class="error">Invalid username</p>';
        }
        else if ($_GET["error"] == "invalidmail") {
          echo '<p class="error">Invalid e-mail</p>';
        }
        else if ($_GET["error"] == "passwordcheck") {
          echo '<p class="error">Passwords dont match</p>';
        }
        else if ($_GET["error"] == "usertaken") {
          echo '<p class="error">Username already taken</p>';
        }
      }

      else if (isset($_GET["signup"])) {
        if ($_GET["signup"] == "success") {
          echo '<p class="signupsuccess">Welcome, you have successfuly signed up</p>';
        }
      }
      ?>
          <div class="form-control">
            <label for="username">Username</label>
            <input
              type="text"
              id="username"
              name="uid"
              placeholder="Enter username"
            />
            
          </div>
          <div class="form-control">
            <label for="Email">Email</label>
            <input
              type="text"
              id="Email"
              name="mail"
              placeholder="Enter Email"
            />
            
          </div>
          <div class="form-control">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="pwd"
              placeholder="Enter password"
            />
            
          </div>
          <div class="form-control">
            <label for="password2">Confirm password</label>
            <input
              type="password"
              id="password2"
              name="pwd2"
              placeholder="Enter password again"
            />
            
          </div>
          <button type="submit" name="signup-submit">Submit</button>
        </form>
      </div>
    </section>

  </body>
</html>
