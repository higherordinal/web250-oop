<?php

require_once('../private/initialize.php');

if(is_post_request()) {
  // Create record using post parameters
  $args = $_POST['member'];
  $member = new Member($args);
  $member->set_hashed_password();
  $result = $member->save();

  if($result === true) {
    $new_id = $member->id;
    $session->message('You\'ve signed up successfully.');
    $session->login($member);
    redirect_to(url_for('/members/show.php?id=' . $new_id));
  } else {
    // show errors
  }
} else {
  // display the form
  $member = new Member;
}
?>

<?php $page_title = 'Sign Up for Membership'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="auth-container">
  <div class="auth-card">
    <div class="auth-header">
      <h2>Create Account</h2>
      <p>Join our community of bird enthusiasts</p>
    </div>

    <?php if(!empty($member->errors)) { ?>
      <div class="auth-errors">
        <h3>Please fix the following errors:</h3>
        <?php echo display_errors($member->errors); ?>
      </div>
    <?php } ?>

    <form action="<?php echo url_for('signup.php'); ?>" method="post" class="auth-form">
      <div class="form-row">
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" name="member[first_name]" value="<?php echo h($member->first_name); ?>" />
        </div>
        
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" name="member[last_name]" value="<?php echo h($member->last_name); ?>" />
        </div>
      </div>
      
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="member[email]" value="<?php echo h($member->email); ?>" />
      </div>
      
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="member[username]" value="<?php echo h($member->username); ?>" />
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="password">Password</label>
          <div class="password-field">
            <input type="password" id="password" name="member[password]" value="" />
            <button type="button" class="password-toggle" onclick="togglePassword('password')">Show</button>
          </div>
        </div>
        
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <div class="password-field">
            <input type="password" id="confirm_password" name="member[confirm_password]" value="" />
            <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">Show</button>
          </div>
        </div>
      </div>
      
      <div class="auth-actions">
        <button type="submit" class="auth-submit">Sign Up</button>
      </div>
      
      <div class="auth-alternate">
        <p>Already have an account?</p>
        <a href="<?php echo url_for('/login.php'); ?>">Log In</a>
      </div>
    </form>
  </div>
</div>

<script>
  function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    const toggleButton = passwordInput.nextElementSibling;
    
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleButton.textContent = 'Hide';
    } else {
      passwordInput.type = 'password';
      toggleButton.textContent = 'Show';
    }
  }
</script>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
