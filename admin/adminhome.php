<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';


// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) ) {
 header("Location: home.php");
 exit;
}

// select logged-in admin detail
$res=mysqli_query($conn, "SELECT * FROM admin WHERE ID=".$_SESSION['admin']);
$adminRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

// $title = $media['title'];


?>

<!DOCTYPE html>
  <html>
    <head>
      <title>Welcome - <?php echo $adminRow['name']; ?></title>
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
          <a class="nav-link" href="#">Home</a>
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
      <h1>Hi' <?php echo $adminRow['name']; ?></h1>
      <p>
        Hope you had a good start in the day and i wish you a productive Day in this lists
      </p>
<!-- buttons for edit -->
      <div class="manageUser">
        <a class="btn btn-info" role="button" href="create.php">+ Add new car</a>
      </div>

     <!-- NOT FINISHED
     <div class="manageUser">
        <a class="btn btn-info" role="button" href="createLoc.php">+ Add new location</a>
      </div> -->
    </section>

    <section>
      <div class="table-responsive-md">
        <h3>Here you see all cars in a List</h3>
        <table class='table table-sm table-hover table-dark'>
          <thead class='thead-dark'>
            <tr>
            <th scope='col'>ID</th>
            <th scope='col'>type</th>
            <th scope='col'>manufactur</th>
            <th scope='col'>model_type</th>
            <th scope='col'>amount</th>
            <th scope='col'>location</td>

            </tr>
          </thead>

<!-- table view for admin all car -->
          <?php

          $sql = "SELECT * FROM car";
          $result = $connect->query($sql);


          if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo
                  "
                    <tbody>
                      <tr>
                        <th scope='row'>".$row['ID']."</th>
                        <td>".$row['type']."</td>
                        <td>".$row['manufactur']."</td>
                        <td>".$row['model_type']."</td>
                        <td>".$row['amount']."</th>
                        <td><a href='office_list.php?ID=".$row['fk_location_ID']."'>".$row['fk_location_ID']."</a></td>
                        <td><a class='btn btn-outline-secondary' href='update.php?ID=".$row['ID']."'>Edit</a></td>
                        <td><a class='btn btn-danger' href='delete.php?ID=".$row['ID']."'>Delete</a></td>

                      </tr>
                    </tbody>";
              }
          } else {
              echo "<p><center>No Data Avaliable</center></p>";
          }
          ?>
        </table>
      </div>
    </section>

    <section class="cards">

<!-- card view with restriction  -->
      <div class='cards card card-group'>
      </thead>

        <?php

        $sql = "SELECT * FROM car WHERE type = 'Limo'";

        $result = $connect->query($sql);

        if($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo
                "
                  <div class='card'>
                    <img class='card-img-top' src='".$row['img']."' alt='Card image of the media' />
                      <div class='card-body'>
                        <h5 class='card-title'>".$row['type']." ".$row['model_type']."</h5>
                        <p class='card-text'>Sold from ".$row['manufactur']." and ".$row['amount']." available in <a href='office_list.php'> Location # ".$row['fk_location_ID']."</a> </p>
                      </div>
                      <a class='btn btn-outline-secondary' href='update.php?ID=".$row['ID']."'>Edit</a>
                      <a class='btn btn-danger' href='delete.php?ID=".$row['ID']."'>Delete</a>
                  </div>
                  ";
            }
        } else {
            echo "<p><center>No Data Avaliable</center></p>";
        }
        ?>
      </div>
    </section>
  </body>
</html>
<?php ob_end_flush(); ?>
