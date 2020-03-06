<?php
require_once '../private/initialize.php';

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if (is_blank($username)) {
        $errors[] = 'Username cannot be blank.';
    }
    if (is_blank($password)) {
        $errors[] = 'Password cannot be blank.';
    }

    // if there were no errors, try to login
    if (empty($errors)) {
        // Using one variable ensures that msg is the same
        $login_failure_msg = 'Log in was unsuccessful.';

        $admin = find_admin_by_username($username);
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                // password matches
                log_in_admin($admin);
                redirect_to(url_for('/staff/cashier/new.php'));
            } else {
                // username found, but password does not match
                $errors[] = $login_failure_msg;
            }
        } else {
            // no username found
            $errors[] = $login_failure_msg;
        }
    }
}

?>

<!DOCTYPE html>
<html>
  <head>   
    <title>VelvetPOS | Log in</title>
    <?php require_once '../private/shared/commn_header_links.php'; ?>
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="staff/admin/cashier.php"><b>Velvet</b>POS</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="index.php" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="username" placeholder="username" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
              name="password"
                type="password"
                class="form-control"
                placeholder="Password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" />
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                  Sign In
                </button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="forgot-password.php">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.php" class="text-center"
              >Register a new membership</a
            >
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    <?php require_once '../private/shared/cmn_scripts.php'; ?>
  </body>
</html>
