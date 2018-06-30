<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';


// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) ) {
 header("Location: index.php");
 exit;
}

// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM admin WHERE ID=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Welcome - <?php echo $userRow['name']; ?></title>
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link rel="stylesheet" href="Astyle.css" />

    </head>

  <body>
    <header class="header">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="/php/FSWD40-CodeReview11/admin/adminhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cars_list.php">Cars List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="office_list.php">Office List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php?logout">Log out</a>
        </li>
      </ul>
    </header>
    <section>
      <h1>Hi' <?php echo $userRow['name']; ?></h1>
      <p>
        Hope you had a good start in the day and i wish you fun in this lists
      </p>

      <div class="manageUser">
        <a class="btn btn-success" href="cars_list.php" role="button">Show me all cars</a>
      </div>

      <div class="manageUser">
        <a class="btn btn-success" href="office_list.php" role="button">Show me all Locations</a>
      </div>
    </section>
    <section class="cards">


      <div class='cards card card-group'>
        <!-- <div class="manager">
          <h2>Here we have our Full List - add some new files</h2>
          <a class="btn btn-info" role="button" href="create.php">+ Add new Media</a>
        </div> -->

        <?php


        $sql = "SELECT * FROM locations";

        $result = $connect->query($sql);


        if($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo
                "
                <div class='card' id='".$row['ID']."'>
                  <img class='card-img-top' src='".$row['img']."' alt='Card image of the media' />
                    <div class='card-body'>
                      <h6 class='card-subtitle mb-2 text-muted'>Location # ".$row['ID']." </h6>
                      <h5 class='card-title'>".$row['name']."</h5>
                      <p class='card-text'>Wien ".$row['point'].": ".$row['address']." in ".$row['postcode']." Wien</p>
                    </div>
                </div>


                  ";
            }
        } else {
            echo "<p><center>Nothing available</center></p>";
        }
        ?>
      </div>
    </section>
  </body>

</html>
<?php ob_end_flush(); ?>
