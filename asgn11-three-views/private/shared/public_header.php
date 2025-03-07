<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/main.css?v=' . time()); ?>">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/auth.css?v=' . time()); ?>">
    <?php if(strpos($_SERVER['SCRIPT_NAME'], '/birds/') !== false) { ?>
      <link rel="stylesheet" href="<?php echo url_for('/stylesheets/birds.css?v=' . time()); ?>">
    <?php } ?>
  </head>

  <body>
    <header>
      <div class="container">
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
      </div>
    </header>
    
    <div class="container content">