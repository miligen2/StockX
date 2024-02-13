<?php

try{

    var_dump($_POST);
if (isset($_POST['email']) && $_POST['password'])
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT email FROM utilisateur WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch();


    if ($result === true){
      
        if ($password == $result['password']){
            echo "Connexion en cours";
            header("location: v_dashboard.php");
            exit();
        } else {
            echo "Votre email ou mot de passe est incorrect";
        }

    } else {
        echo "Votre email ou mot de passe est incorrect";
    }


} else {
    echo "Tous les champs ne sont pas remplis";
}
} catch (Exception $e) {
    echo "Error: ".$e

}


?>
