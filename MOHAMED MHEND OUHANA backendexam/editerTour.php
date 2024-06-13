<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     $stmt = $connect->prepare("SELECT * FROM tour WHERE tour_id=:id");
     $stmt->bindParam(':id',$id);
     $stmt ->execute();
     $rep =  $stmt -> fetchAll();
        foreach( $rep as $row ) {
           
        
?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="id" value="<?php echo $row['tour_id']?>" required>
    <br><br>
        <input type="text" name="nom" value="<?php echo $row['tour_name']?>" required>
        <br>
        <br>
        <input type="text" name="prix" value="<?php echo $row['tour_price']?>" required>
        <br>
        <br>
        <input type="text" name="description" value="<?php echo $row['tour_description']?>" required>
        <br>
        <br>
        <input type="submit" name="submit" value="Modifier" >
        <br><br>
    </form>
    <?php
    };
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
    
}
    if (isset($_POST["submit"])) {
        @$nom = $_POST["nom"];
        @$prix = $_POST["prix"];
        @$description = $_POST["description"];

        try {
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("UPDATE `tour` SET tour_name=:nom, tour_price=:prix, tour_description=:description WHERE tour_id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':prix',$prix);
        $stmt->bindParam(':description',$description);
        $stmt ->execute();
        header('Location:tours.php');
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
            
        }
    }
    ?>
</body>
</html>