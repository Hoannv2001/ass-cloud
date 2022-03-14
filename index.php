
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/hoanEX.css" />
    <link rel="stylesheet" href="fontawesome-free-5.15-2.4-web/css/all.css">
    <link rel="stylesheet" href="css/card.css">
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
  <div id = "toast" ></div>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <!-- login -->
          <form action="login.php" method = "POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = "username"  >
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "password"  >
            </div>

            <input type="submit" name = "login"  value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>

            <div class="social-media">
              <a href="https://www.facebook.com/" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <!-- register -->
          </form>
          <form action="register.php" method = "POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="firdstName" placeholder="Firstname" name = "firstname" value = <?php echo $firstname; ?> >
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="lastName" placeholder="Lastname" name = "lastname" value = <?php echo $lastname; ?> >
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = "username" value = <?php echo $username; ?> >
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name = "email" value = <?php echo $email; ?> >
            </div>
            <div class="input-field">
              <i class="fas fa-phone-square-alt"></i>
              <input type="telephone" placeholder="Telephone" name = "telephone" value = <?php echo $telephone; ?> >
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "password" value = <?php echo $password; ?> >
            </div>
            <input onclick="clickSigup()"   type="submit" name ="signup_submit" id="sing_up"  class="btn" value="Sign up" >
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
<!-- button and informatio -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
            If you do not have an account to log in to the system, please click the register button below!!
            </p>
            <button  onclick="card()" class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/undraw_Swipe_profiles_re_tvqm.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us </h3>
            <p>
            If you have an account, please click the button below !!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/undraw_shopping_app_flsj.svg" class="image" alt="" />
        </div>
      </div>

      <div id = "card"></div>

    </div>
    <script>

      function clickSigup() {
          toast({
          title: "Successfully!",
          message: "You have added a product to the cart!.",
          type: "success",
          duration: 5000;
          });
      }
    </script>

    <script src="js/hoanEX.js"></script>
  </body>
</html>