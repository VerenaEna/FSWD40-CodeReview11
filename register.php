<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['users'])!="" ){
 header("Location: home.php"); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {

 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
 $name = strip_tags($name);
 $name = htmlspecialchars($name);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 // basic name validation
 if (empty($name)) {
  $error = true;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have atleat 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // check whether the email exist or not
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);


 // if there's no error, continue to signup
 if( !$error ) {

  $query = "INSERT INTO users(name,email,pass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);

  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }

 }


}
?>
<!DOCTYPE html>
<head>
<title>VerenaEnas Library Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
</head>
<body>
  <header class="header">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log in</a>
      </li>
    </ul>
  </header>
  <section>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


            <h2>Here you can sign up</h2>
            <hr />

           <?php
  if ( isset($errMSG) ) {

   ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">
        <i class="fas fa-user"></i>
      </span>
    </div>
    <input type="text" name="name" class="form-control" placeholder="Enter your name" aria-label="name" aria-describedby="basic-addon1" maxlength="50" value="<?php echo $name ?>" />
    <span class="text-danger"><?php echo $nameError; ?></span>
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">
        <i class="fas fa-at"></i>
      </span>
    </div>
    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" aria-label="name" aria-describedby="basic-addon1" maxlength="40" value="<?php echo $email ?>" />
    <span class="text-danger"><?php echo $emailError; ?></span>
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">
        <i class="fas fa-lock"></i>
      </span>
    </div>
    <input type="password" name="pass" class="form-control" placeholder="Enter your prefered Password" aria-label="name" aria-describedby="basic-addon1" maxlength="15">
    <span class="text-danger"><?php echo $passError; ?></span>
  </div>

            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>

            <a href="index.php">Already a User? Login here</a>


          </form>
     </section>
</body>
</html>
<?php ob_end_flush(); ?>
