<?php
session_start();

include '../API/database.php';
$db = new Database();

try {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $sql ="SELECT id_utilisateur, prenom, nom, email, mot_de_passe, id_role FROM utilisateurs WHERE email = :email";
        $stmt = $db->query($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch();

        if ($result) {
            if (password_verify($password, $result['mot_de_passe'])) {

                $_SESSION['user-id'] = $result["id_utilisateur"];
                $_SESSION['user_email'] = $result['email'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION['role'] = $result['id_role'];

                header("location: ../Vues/v_accueil.php?titre=DashBoard");
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
