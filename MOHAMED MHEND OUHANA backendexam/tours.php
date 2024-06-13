<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   $servername = 'mysql:host=localhost;dbname=easytourbooking;';

   $user = 'root';

   $pass = '';

   try {
       $connect = new PDO($servername, $user, $pass);

       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("SELECT * FROM tour");
        $stmt ->execute();
        $rep =  $stmt -> fetchAll();
        echo "<table border = 1px>";
        echo "<tr>";
        echo "<th> Nom </th>";
        echo "<th> Prix </th>";
        echo "<th> Descreption </th>";
        echo "</tr>";
        

        foreach( $rep as $row ) {
            echo "<tr>
                    <td>{$row['tour_name']}</td>
                    <td>{$row['tour_price']}</td>
                    <td>{$row['tour_description']}</td>
                    <td><button class='btn'><a href='supprimer.php?id={$row['tour_id']}'>Supprimer</a></button></td>
                    <td><button class='btn'><a href='editerTour.php?id={$row['tour_id']}'>Modifier</a></button></td>
                </tr>";
        };
        echo "</table><br>";
    }catch(PDOException $e) {
        echo "error";
    }
?>
<button  id="addbtn"><a href="nouveauTour.php">Add Users</a></button>
<button  id="addbtn"><a href="reservDetaile.php">Les détails </a></button>
<button  id="addbtn"><a href="search.php">search</a></button>

</body>
</html>