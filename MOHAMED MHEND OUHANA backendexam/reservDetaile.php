<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les reservations</title>
</head>
<body>
    <h2>Les reservations</h2>
    <?php
        try{
            include_once "connect.php";
            $stm = $connect->prepare("SELECT COUNT(*) AS total FROM `book`");
            $stm->execute();
            $res = $stm->fetch();
            $total = $res["total"];
            echo "<h3>le nombre total des réservations : $total</h3>";

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    ?>
   

    <table>
        <tr>
            <th>ID Client</th>
            <th>Nom Client</th>
            <th>Email </th>
            <th>Téléphone </th>
            <th>ID Tour</th>
            <th>Nom Tour</th>
            <th>Date de réservation</th>
        </tr>
        <tbody id="data">
            <?php

                try{
                    $stm = $connect->prepare("SELECT  C.client_id, T.tour_id, B.book_date, C.client_fullname, C.client_email, C.client_phone,  T.tour_name 
                                        FROM (`client` AS C  INNER JOIN `book` AS B ON C.client_id = B.client_id ) 
                                        INNER JOIN  `tour` AS T ON T.tour_id = B.tour_id");
                    $stm->execute();
                    $rep = $stm->fetchAll();

                    foreach($rep as $row){
                        echo   "<tr>
                                    <td>{$row['client_id']}</td>
                                    <td>{$row['client_fullname']}</td>
                                    <td>{$row['client_email']}</td>
                                    <td>{$row['client_phone']}</td>
                                    <td>{$row['tour_id']}</td>
                                    <td>{$row['tour_name']}</td>
                                    <td>{$row['book_date']}</td>
                                </tr>";
                                    
                    }

                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            ?>
        </tbody>
    </table>



</body>
</html>