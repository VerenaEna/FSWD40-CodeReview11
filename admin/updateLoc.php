<?php



require_once 'actions/db_connect.php';



if($_GET['ID']) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM locations WHERE ID = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
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
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="header">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
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
        <input type="text" name="ID" value="<?php echo $data['ID'] ?>" class="form-control" placeholder="Location ID" aria-label="locaton_name" aria-describedby="basic-addon1" disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">name</span>
        </div>
        <input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control" placeholder="name of LOC" aria-label="locaton_name" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">point</span>
        </div>
        <input type="text" name="point" value="<?php echo $data['point'] ?>" class="form-control" placeholder="Vienna International Center" aria-label="points of interests" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">address</span>
        </div>
        <input type="text" name="address" value="<?php echo $data['address'] ?>"class="form-control" placeholder="Cadillac" aria-label="address" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">postcode</span>
        </div>
        <input type="text" name="postcode" value="<?php echo $data['postcode'] ?>"class="form-control" placeholder="1110" aria-label="postcode" aria-describedby="basic-addon1">
      </div>

        <div class="buttons">
          <button class="btn btn-success" type="submit">Change</button>
          <a class="btn btn-danger" href="adminhome.php">Discard</a>
        </div>
        </form>
          </section>
    </body>
</html>
