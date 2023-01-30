<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset= "utf-8">
      <meta http-equiv="language" content="NL">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Maikel Braas">
      <meta name="keywords" content="html,css-- mijn eigen website">
      <title>Ra site</title>
      <link rel="stylesheet" href="../css/back.css">
  </head>
  <body>
    <header>
      <a href="../index.php"><img src="../image/logo.jpg"></a>
      <p>
      <?php session_start();
      if(!empty($_SESSION['username'])){
        echo 'Welkom ' . $_SESSION['username'] . ', je activiteiten worden bijgehouden.';
      }else{
        header("Location: /blog-voorbeeld-swd/login.php");
      }
       ?>
      

     </p>
      <a href="partial/logout.php" class="btn-cus">Logout</a>
    </header>
    <section class="container">
      <div id="sidebar">
        <span>
          <h2>Gebruikers</h2>
            <a href="gebruikers.php?page=1">Gebruikers</a>
            <h2>Post</h2>
            <a href="createPost.php">Add Post</a>
            <a href="posts.php?page=1">Posts</a>
            <h2>Products</h2>
            <a href="products.php?page=1">Products</a>
        </span>
      </div>