<?php
  if(!isset($page_title)) { $page_title = 'Member Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds - <?php echo h($page_title); ?></title>
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
        <?php if($session->is_logged_in()): ?>  
          <ul>
            <li>User: <?= h($session->username); ?></li>
            <li><a href="<?= url_for('/birds/birds.php'); ?>">Birds</a></li>
            <li><a href="<?= url_for('/logout.php'); ?>">Logout</a></li>
          </ul>
        <?php endif; ?>  
      </navigation>
    </header>

    <?= display_session_message(); ?>

