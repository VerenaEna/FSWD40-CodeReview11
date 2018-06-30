<!-- its the admin indexpage for unregistered and unlogged admins -->
<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';


// it will never let you open index(login) page if session is set
if ( isset($_SESSION['admin'])!="" ) {
 header("Location: adminhome.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {

  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT ID, name, pass FROM admin WHERE email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

  if( $count == 1 && $row['pass']==$password ) {
   $_SESSION['admin'] = $row['ID'];
   header("Location: adminhome.php");
  } else {
   $errMSG = "Incorrect Credentials, Are you registered? Please try again";
  }

 }

}
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>VerenaEnas Car rental</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>

  <body>
    <header class="header">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="/php/FSWD40-CodeReview11/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminregister.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </header>
    <section>
      <h1>This is our Car rental</h1>

      <section class="action">
        <h2>Please log in to edit all Cars and Locations</h2>
      </section>

      <section>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on" accept-charset="utf-8">
          <?php
            if ( isset($errMSG) ) {
              echo $errMSG; }
          ?>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Your email" value="<?php echo $email; ?>" maxlength="40">
            <span class="text-danger"><?php echo $emailError; ?></span>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-lock"></i>
              </span>
            </div>
            <input type="password" name="pass" class="form-control" id="input" placeholder="Your Password" maxlength="15">
            <span class="text-danger"><?php echo $passError; ?></span>
          </div>

          <button type="submit" name="btn-login" class="btn btn-primary">Log in</button>
          <a class="registerText" href="adminregister.php">Want to edit something? <span class="signup">Sign up HERE as Admin</span></a>
        </form>
      </section>
  </body>
</html>
<?php ob_end_flush(); ?>
