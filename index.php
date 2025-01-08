<?php
require_once "./models/User.php";
if(isset($_POST["modifierbtn"])){

    $id = $_POST["modifier"];
    $fetch = new User;
    print_r($Comment = $fetch->edit($id));
    $name=$Comment[0]["nom"];
    $message=$Comment[0]["message"]; 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Feedback</title>
</head>
<body>
    <h1>Soumettre un Commentaire</h1>
    <form action="submit_feedback.php" method="POST">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?php if(isset($_POST["modifierbtn"])){ echo $name;}?>" required><br><br>

        <label for="message">Message :</label>
        <textarea name="message" id="message" rows="4"  required><?php if(isset($_POST["modifierbtn"])){ echo $message;}?></textarea><br><br>

        <input type="submit"name="s1"  value="Envoyer le commentaire">
    </form> <br> <br>
    <form action="Commentaires.php">
        <input type="submit" name="showComments" value="Voir tou les commentaire">
    </form>
</body>
</html>