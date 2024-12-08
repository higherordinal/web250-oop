<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          WNC Birds
        </a>
      </h1>

      <navigation>
        <ul>
          <li><a href="<?php echo url_for('/login.php'); ?>">Log In</a></li>
          <li><a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a></li>
        </ul>
      </navigation>
    </header>
      