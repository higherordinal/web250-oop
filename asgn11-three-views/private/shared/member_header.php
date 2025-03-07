<?php
  if(!isset($page_title)) { $page_title = 'Member Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/main.css?v=' . time()); ?>">
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
          <?php if($session->is_logged_in()): ?>  
            <ul>
              <li>User: <?= h($session->username); ?></li>
              <li><a href="<?= url_for('/birds/birds.php'); ?>">Birds</a></li>
              <li><a href="<?= url_for('/logout.php'); ?>">Logout</a></li>
            </ul>
          <?php endif; ?>  
        </navigation>
      </div>
    </header>

    <div class="container content">
      <?= display_session_message(); ?>
