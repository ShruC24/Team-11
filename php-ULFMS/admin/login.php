<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<body>
  <style>
    body {
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size: cover;
      background-repeat: no-repeat;
      backdrop-filter: brightness(.7);
      overflow-x: hidden;
    }

    .logo img {
      max-height: 55px;
      margin-right: 25px;
    }

    .logo span {
      color: #fff;
      text-shadow: 0px 0px 10px #000;
    }

    #a3dp52izps {
      display: none;
    }
  </style>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?= validate_image($_settings->info('logo')) ?>" alt="">
                  <span class="d-none d-lg-block text-center"><?= $_settings->info('name') ?></span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate id="login-frm">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" id="login-btn">Login</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="credits">
                Template Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- jQuery -->
  <script src="<?= base_url ?>assets/js/jquery-3.6.4.min.js"></script>
  <script src="<?= base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>+
  <script src="<?= base_url ?>assets/js/main.js"></script>
  <script>
  $(document).ready(function () {
    end_loader();

    document.getElementById('login-btn').addEventListener('click', function (event) {
      // Check if both the username and password fields are empty
      var usernameField = document.getElementById('yourUsername');
      var passwordField = document.getElementById('yourPassword');

      if (usernameField.value.trim() === '' && passwordField.value.trim() === '') {
        // If both fields are empty, display an alert
        alert('Please enter your username and password.');
        // Prevent the form from being submitted
        event.preventDefault();
      } else if (usernameField.value.trim() === '') {
        // If only the username field is empty, display an alert
        alert('Please enter your username.');
        // Prevent the form from being submitted
        event.preventDefault();
      } else if (passwordField.value.trim() === '') {
        // If only the password field is empty, display an alert
        alert('Please enter your password.');
        // Prevent the form from being submitted
        event.preventDefault();
      } else if (!isValidUsername(usernameField.value.trim())) {
        // If the username contains special symbols, display an alert
        alert('Please enter a valid username without special symbols.');
        // Prevent the form from being submitted
        event.preventDefault();
      }
    });

    // Function to check if the username is valid
    function isValidUsername(username) {
      // Use a regular expression to check for special symbols
      var regex = /^[a-zA-Z0-9_]+$/;
      return regex.test(username);
    }
  });
</script>
</body>
</html>