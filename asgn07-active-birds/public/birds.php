<?php
require_once('../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>


<table>
  <tr>
    <th>Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Conservation</th>
    <th>Backyard Tips</th>
    <th>&nbsp;<th>
  </tr>

  <?php

  $query = "SELECT id, common_name, habitat, food, conservation_id, backyard_tips FROM birds";
  $result = $database->query($query);

  while ($args = $result->fetch_assoc()) {
    $bird = new Bird($args); 
  ?>
    <tr>
        <td><?php echo h($bird->common_name); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->conservation()); ?></td>
        <td><?php echo h($bird->backyard_tips); ?></td>
        <td><a href="detail.php?id=<?php echo h($bird->id); ?>">View</a></td>
    </tr>
  <?php } ?>

</table>

<?php

$result = Bird::find_all();

?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>