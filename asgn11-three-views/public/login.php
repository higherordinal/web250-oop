<?php
require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $member = Member::find_by_username($username);
    // test if member found and password is correct
    if($member != false && $member->verify_password($password)) {
      // Mark member as logged in
      $session->login($member);
      redirect_to(url_for('/index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="auth-container">
  <div class="auth-card">
    <div class="auth-header">
      <h2>Log In</h2>
      <p>Enter your credentials to access your account</p>
    </div>

    <?php if(!empty($errors)) { ?>
      <div class="auth-errors">
        <h3>Please fix the following errors:</h3>
        <?php echo display_errors($errors); ?>
      </div>
    <?php } ?>

    <form action="login.php" method="post" class="auth-form">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo h($username); ?>" autofocus />
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <div class="password-field">
          <input type="password" id="password" name="password" value="" />
          <button type="button" class="password-toggle" onclick="togglePasswordVisibility()">Show</button>
        </div>
      </div>
      
      <div class="auth-actions">
        <button type="submit" name="submit" class="auth-submit">Log In</button>
      </div>
      
      <div class="auth-alternate">
        <p>Don't have an account?</p>
        <a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a>
      </div>
    </form>
  </div>
</div>

<script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.querySelector('.password-toggle');
    
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
