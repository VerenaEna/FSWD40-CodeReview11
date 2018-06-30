<?php



require_once 'db_connect.php';



if($_POST) {

    $id = $_POST['ID'];



    $sql = "DELETE FROM car WHERE ID = {$id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Successfully deleted!!</p>";

        echo "<a href='../adminhome.php'><button type='button'>Back</button></a>";

    } else {

        echo "Error updating record : " . $connect->error;

    }



    $connect->close();

}



?>
