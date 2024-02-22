<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Styling -->
    <link rel="stylesheet" href="css/default-style.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/utilities.css" />
  </head>
  <body>
    <div class="login-box">
      <img src="images/login-image.jpg" alt="" />
      <div class="container | d-flex flex-column justify-content-center gap-2">
        <div class="login__heading text-center">
          <h2 class="h2 | text-neutral-100">Sign Up</h2>
          <p class="text">Welcome to ICOS.</p>
          <p>Register as a member and start your experience</p>
        </div>

        <form action="services/route.php" method="post" class="login__form">
          <div class="form__form-field-group d-flex flex-column">

            <div class="form__form-label-field">
              <label for="firstName">First Name</label>
              <input
                type="firstName"
                class="form-field"
                placeholder="Enter your first name"
                name="firstName"
                
              />
            </div>


            <div class="form__form-label-field">
              <label for="middleName">Middle Name</label>
              <input
                type="middleName"
                class="form-field"
                placeholder="Enter your last name"
                name="middleName"
                
              />
            </div>

            

            <div class="form__form-label-field">
              <label for="lastName">Last Name</label>
              <input
                type="lastName"
                class="form-field"
                placeholder="Enter your last name"
                name="lastName"
                
              />
            </div>

        

          
            <div class="form__form-label-field">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-field"
                placeholder="Enter your last name"
                name="email"
                
              />
            </div>


            <div class="form__form-label-field">
              <label for="password">Password</label>
              <input
                type="password"
                class="form-field"
                placeholder="Enter your password"
                name="password"
                
              />
            </div>

            <div class="form__form-label-field">
              <label for="confirmPassword">Confirm Password</label>
              <input
                type="password"
                class="form-field"
                placeholder="Confirm Password"
                name="repassword"
                
              />
            </div>
          </div>

          <div class="form__license-agreement">
            <input type="checkbox" name="isChecked"/>
            <p class="text text-checklist">I agree to the terms of Service</p>
          </div>

          <button class="btn btn-primary" type="toRegister" name="toRegister">Sign Up</button>
        </form>

        <div class="login__membership mx-auto">
          <p class="text">Already a member?</p>
          <a href="index.php" class="nav-link">Sign In</a>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script> 
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
}
?>
  </body>
</html>
