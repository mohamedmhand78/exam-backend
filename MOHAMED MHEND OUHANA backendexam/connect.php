
    <?php 
     $servername = 'mysql:host=localhost;dbname=easytourbooking;';
    $user = 'root';

    $pass = '';

    try {
        $connect = new PDO($servername, $user, $pass);
    
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    }
    catch(PDOException $e) {
        echo 'Connection Failed' . $e->getMessage();
    }
    
    ?>
