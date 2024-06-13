<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        
        <input type="text" name="nom" required placeholder="nom">
        <br>
        <br>
        <input type="text" name="prix" required placeholder="prix">
        <br>
        <br>
        <input type="text" name="description" required placeholder="description">
        <br>
        <br>
        <input type="submit" name="submit" value="Insert">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        @$nom = $_POST["nom"];
        @$prix = $_POST["prix"];
        @$description = $_POST["description"];
        
        $servername = 'mysql:host=localhost;dbname=easytourbooking;';

        $user = 'root';

        $pass = '';

        try {
            $connect = new PDO($servername, $user, $pass);

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO tour (tour_name,tour_price,tour_description) VALUES ('$nom','$prix','$description')";
            $connect->exec($query);
            header('Location:tours.php');
            echo "Data Inserted Successfuly";
        } catch (PDOException $e) {
            echo "Insertion Failed" . $e->getMessage();
            
        }
    }
    ?>
</body>
</html>