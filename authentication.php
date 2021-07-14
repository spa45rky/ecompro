<?php

  require('./resources/config.php');

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
  </head>
  <body>

  <!-- Main container -->

    <div class="main-container">

  <!-- login form container -->

      <div class="login-form-container">

        <!-- login form -->

        <form action="" method="post" enctype="multipart/form-data">

          <?php loginSystem(); ?>

          <h1 class="form-headings">Hi, welcome back!</h1>

          <!-- email and password for login -->

          <input class="login-form-input" type="email" name="email" placeholder="Email" required>

          <input type="password" class="login-form-input" name="password" placeholder="Password" required>

          <div id="form-checkbox-container">

            <span>
              <input type="checkbox" name="remember-me">
              <label for="remember-me">Remember Me</label>
            </span>

            <span>
              <a href="" class="form-links">Forgot Password?</a>
            </span>
          </div>

          <button type="submit" name=login id="login" class="btn btn-primary">Log In</button>

          <p>Don't have an account? <a href="#" id="login-link" class="form-links next-form-link">Sign Up</a></p>

        </form>

      </div>

  <!-- Image container -->

      <div class="img-container">

        <img src="img1.jpg" alt="">

      </div>

      <!-- signup form container -->

      <div class="signup-form-container">

              <!-- login form -->

              <form id="signupform" action="" method="post" enctype="multipart/form-data">

                <?php registerSystem(); ?>

                <h1 class="form-headings">Hello, new here?</h1>

                <!-- form inputs for signup section -->

                <input class="signup-form-inputs" type="text" name="username" placeholder="Username" required>

                <input class="signup-form-inputs" type="email" name="email" placeholder="Email" required>

                <input type="password" class="signup-form-inputs" name="password" placeholder="Password" required>

                <input type="password" class="signup-form-inputs" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit" name="register" id="signup" class="btn btn-primary">Sign Up</button>

                <p>Already have an account? <a href="" id="signup-link" class="form-links next-form-link">Log In</a></p>

              </form>

      </div>

    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js">
  </script>
  <script src="./js/auth.js"></script>
  <script>
    $(document).ready(function(){
      $('#signup').click(function(){
        $.ajax({
          url: 'authentication.php',
          method: 'post',
          data: $('signupform').serialize(),
          success: function(){}
        });
      });

      $('#login').click(function(){
        $.ajax({
          url: 'authentication.php',
          method: 'post',
          data: $('loginform').serialize(),
          success: function(){}
        });
      });
    });


  </script>
  </body>
</html>
