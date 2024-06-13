<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <form method="post" >
        <input type="search" name="search" placeholder="Search" >
<button name="searsh">recherer</button>
    </form>
    <?php
        ?>
        <table>
            <tr>
                <th>Id</th>
                <th>nom</th>
                <th>prix</th>
                <th>description</th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
            
                <?php

                if(isset($_POST["searsh"])){
                    $word = $_POST["search"];
                    try{
                        include_once "connect.php";
                        $stm = $connect->prepare("SELECT * FROM `tour` WHERE tour_name LIKE '%$word%'");
                        $stm->execute();
                        $rep = $stm->fetchAll();
                    
                        foreach($rep as $row){
                            echo   "<tr>
                                        <td>{$row['tour_id']}</td>
                                        <td>{$row['tour_name']}</td>
                                        <td>{$row['tour_price']}</td>
                                        <td>{$row['tour_description']}</td>
                                        <td><a href='editerTour.php?tour_id={$row['tour_id']}'>modifier</a></td>
                                        <td><a href='supprimer.php?tour_id={$row['tour_id']}'>supprimer</a></td>
                                    </tr>";
                                        
                                      
                        }
                    
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                
}
                ?>
            

        </table>
</body>

</html>