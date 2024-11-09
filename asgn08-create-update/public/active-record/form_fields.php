<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bird)) {
  redirect_to(url_for('/active-record/index.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
</dl>

<dl>
  <dt>Conservation Status</dt>
  <dd>
    <select name="bird[conservation_id]">
      <option value=""></option>
      <?php foreach($conservation_options as $conservation_id => $conservation_name) { ?>
        <option value="<?php echo $conservation_id; ?>" <?php if($bird->conservation_id == $conservation_id) { echo 'selected'; } ?>>
          <?php echo $conservation_name; ?>
        </option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyard_tips]" rows="5" cols="50"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>
