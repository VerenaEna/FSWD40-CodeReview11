<!DOCTYPE html>
<head>
  <title>VerenaEnas Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a class="nav-link" href="contact.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php?logout">Log out</a>
      </li>
    </ul>
  </header>


  <?php
  require_once 'db_connect.php';
  if($_POST) {

    $id = $_POST['ID'];
    $type = $_POST['type'];
    $manuf = $_POST['manufactur'];
    $modelType = $_POST['model_type'];
    $amount = $_POST['amount'];
    $img = $_POST['img'];
    $locID = $_POST['fk_location_ID'];

    $sql = "UPDATE car SET ID = '$id', type = '$type', manufactur = '$manuf', model_type = '$modelType', amount = '$amount',img = '$img',fk_location_ID = '$locID'  WHERE ID = {$id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a class='btn btn-dark' href='../update.php?ID=".$id."'>Back</a>";
        echo "<a class='btn btn-light' href='../adminhome.php'>Home</a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;

    }
    $connect->close();
  }
  ?>
  
</body>
</html>
