<?php
include '../API/database.php';
global $db;

try {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT email, mot_de_passe FROM utilisateurs WHERE email = :email AND mot_de_passe = :password";
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $password]);
        $result = $stmt->fetch();

        if ($result) {
            if ($password == $result['mot_de_passe']) {
                echo "Connexion en cours";
                header("location: ../Vues/v_dashboard.php");
                exit();
            } else {
                echo "Votre mot de passe est incorrect";
            }
        } else {
            echo "Votre email est incorrect";
        }
    } else {
        echo "Tous les champs ne sont pas remplis";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>