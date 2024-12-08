<?php 
  require_once('../../private/initialize.php');
  require_login();
  $page_title = 'Bird List';
  include(SHARED_PATH . '/member_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<?php if ($session->is_logged_in()) { ?>
  <p><a href="<?php echo url_for('/birds/new.php'); ?>">Add a Bird</a></p>
<?php } ?>
  
<table border="1">
  <tr>
    <th>Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Conservation</th>
    <th>Backyard Tips</th>
    <th>&nbsp;</th>
  
    <?php if ($session->is_logged_in()) { ?>

      <th>&nbsp;</th>
      <th>&nbsp;</th>

    <?php } ?>  
  
  </tr>

  <?php

  $birds = Bird::find_all();

    foreach($birds as $bird) { 

    ?>
        <tr>
          <td><?php echo h($bird->common_name); ?></td>
          <td><?php echo h($bird->habitat); ?></td>
          <td><?php echo h($bird->food); ?></td>
          <td><?php echo h($bird->conservation()); ?></td>
          <td><?php echo h($bird->backyard_tips); ?></td>
          <td><a href="<?php echo url_for('/birds/detail.php?id=' . h(u($bird->id))); ?>">View</a></td>
          <?php if ($session->is_logged_in()) { ?>
            <td><a href="<?php echo url_for('/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
            <td><a href="<?php echo url_for('/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
          <?php } ?>
        </tr>
        <?php } ?>

      </table>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
