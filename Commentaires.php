<?php 
require_once "./models/User.php";
$fetch = new User;


if(isset($_POST["suprimerbtn"])){
    $id = $_POST["suprimer"];
    $fetch->delete($id);

}

$Comments = $fetch->read();

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
                    <form method='POST'action='index.php'>
                        <input type='hidden' value='$Comment->id' name='modifier'>
                        <input type='submit' value='modifier' name='modifierbtn'>
                    </form>

                    <form method='POST'>
                        <input type='submit' value='suprimer' name='suprimerbtn'>
                        <input type='hidden' value='$Comment->id' name='suprimer'>
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