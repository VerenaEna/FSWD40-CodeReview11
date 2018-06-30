<?php



require_once 'actions/db_connect.php';



if($_GET['ID']) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM car WHERE ID = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
?>

<?php

}

?>

<!DOCTYPE html>
<head>
  <title>VerenaEnas Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a class="nav-link" href="adminhome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Add media</a>
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


    <form action="actions/a_update.php" method="post">
      <h1>Update Media</h1>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">ID</span>
        </div>
        <input type="text" name="ID" value="<?php echo $data['ID'] ?>" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Type</span>
        </div>
        <input type="text" name="type" value="<?php echo $data['type'] ?>" class="form-control" placeholder="SUV" aria-label="car-type" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Manufacture</span>
        </div>
        <input type="text" name="manufactur" value="<?php echo $data['manufactur'] ?>"class="form-control" placeholder="Cadillac" aria-label="title" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Model Type</span>
        </div>
        <input type="text" name="model_type" value="<?php echo $data['model_type'] ?>"class="form-control" placeholder="Esclanade" aria-label="car_model_type" aria-describedby="basic-addon1">
      </div>


      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Amount of cars</span>
        </div>
        <input type="text" name="amount" value="<?php echo $data['amount'] ?>" class="form-control" placeholder="type in number" aria-label="amount" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Image source</span>
        </div>
        <input type="text" name="img" value="<?php echo $data['img'] ?>" class="form-control" placeholder="http://googleimages.com/image.jpg" aria-label="image" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Location</span>
        </div>
        <input type="text" name="fk_location_ID" value="<?php echo $data['fk_location_ID'] ?>" class="form-control" placeholder="1 - 4" aria-label="image" aria-describedby="basic-addon1">
      </div>


        <div class="buttons">
          <button class="btn btn-success" type="submit">Change</button>
          <a class="btn btn-danger" href="adminhome.php">Discard</a>
        </div>
        </form>
          </section>
    </body>
</html>
