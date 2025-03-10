<?php

require_once('../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/birds/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('/birds/birds.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['bird'];
  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('/birds/show.php?id=' . $id));
  } else {
    // show errors
    
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<div id="content">

  <a class="back-link" href="birds.php">&laquo; Back to List</a>

  <div class="bird edit">
    <h1>Edit Bird</h1>

    <?php echo display_errors($bird->errors); ?>

    <form action="<?php echo url_for('/birds/edit.php?id=' . h(u($id))); ?>" method="post">

      
      <?php 
      $conservation_options = Bird::getConservationOptions();
      include('form_fields.php'); 
      ?>

      <div id="operations">
        <input type="submit" value="Edit Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
