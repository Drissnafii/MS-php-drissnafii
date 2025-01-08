<?php 
    require __DIR__ . '/config/conn.php';

    $stmt = $pdo->prepare("SELECT nom, message, horodatage from commentaires");
    $stmt->execute();
    $Comments = $stmt->fetchAll(PDO::FETCH_OBJ);


    if ($Comments > 0) {

        echo "<h4>Search for a name in the input field.</h4>

            <input>";

        echo "<div>";
        echo "<table>";
        echo "<tr>
                <th>Name</th><br>
                <th>Comment</th>
                <th>Created At</th>
                <th>Action...</th>
            </tr>";

            foreach ($Comments as $Comment) {
                // echo "<pre>";
                // var_dump($contact[4]); die();
                // echo "</pre>";


                # code...
                echo "<tr>
                <td>$Comment->nom</td>  
                <td>$Comment->message</td>  
                <td>$Comment->horodatage</td> 
                <td>
                    <form method='post'>
                        <input type='submit' value='modifier' name='modifier' action=modifier.php >
                        <input type='submit' value='suprimer' name='suprimer' action=suprimer.php >
                    </form>
                </td>
            </tr>";
            }

        echo "</table>";
        echo "</div>";
    } else {
        echo "Pas de ligne pour l'afficher...";
    }
?>