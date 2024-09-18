<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird Inventory</h2>
<p>This is a short list -- start your birding!</p>

<!-- Create a table. The header should reflect the headings in the wnc-birds.csv class.
     Use a table border of 1 to make the display easier to read. -->
<table border="1">
  <thead>
    <tr>
      <th>Common Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Nesting</th>
      <th>Behavior</th>
      <th>Conservation Status</th>
      <th>Backyard Tips</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // Instantiate the CSV parser and parse the file
      $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
      $bird_array = $parser->parse();

      // Iterate over each bird in the parsed array
      foreach($bird_array as $args) {
        // Create a new instance of Bird using the $args array
        $bird = new Bird($args);
    ?>
    <tr>
      <td><?php echo htmlspecialchars($bird->common_name); ?></td>
      <td><?php echo htmlspecialchars($bird->habitat); ?></td>
      <td><?php echo htmlspecialchars($bird->food); ?></td>
      <td><?php echo htmlspecialchars($bird->nest_placement); ?></td>
      <td><?php echo htmlspecialchars($bird->behavior); ?></td>
      <td><?php echo htmlspecialchars($bird->conservation()); ?></td>
      <td><?php echo htmlspecialchars($bird->backyard_tips); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
