<?php

if (isset($_POST['signup-submit'])) {

  require 'dbh.php';

  $user = $_POST['uid'];
  $email = $_POST['mail'];
  $pass = $_POST['pwd'];
  $passRepeat = $_POST['pwd2'];


  if (empty($user) || empty($email) || empty($pass) || empty($passRepeat)) {
    header("Location: ../register.php?error=emptyfields&uid=".$user."&mail=".$email);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $user) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidmail");
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
    header("Location: ../register.php?error=invaliduser&mail=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidmail&uid=".$user);
    exit();
  }
  else if ($pass !== $passRepeat) {
    header("Location: ../register.php?error=passwordcheck&uid=".$user."&mail=".$email);
    exit();
  }
  else {
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../register.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $user);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);

      if ($resultCount > 0) {
        header("Location: ../register.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../register.php?error=sqlerror");
          exit();
        }
        else {
          $hpass = password_hash($pass, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sss", $user, $email, $hpass);
          mysqli_stmt_execute($stmt);
          header("Location: ../register.php?signup=success");
          exit();

        }
      }
    }
  }
  
}
else {
  header("Location: ../signup.php");
  exit();
}
