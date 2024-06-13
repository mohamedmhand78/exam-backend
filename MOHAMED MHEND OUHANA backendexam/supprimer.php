<?php
$id = $_GET['id'];
$servername = 'mysql:host=localhost;dbname=easytourbooking;';

   $user = 'root';

   $pass = '';

   try {
       $connect = new PDO($servername, $user, $pass);

       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("DELETE FROM tour WHERE tour_id=:id");
        $stmt->bindParam(':id',$id);
        $stmt ->execute();
        header('Location:tours.php');
    }catch(PDOException $e) {
        echo "error";
    }
?>