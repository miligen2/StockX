<?php
include "../API/database.php";
$db = new Database();

try {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password == $cpassword) {
            $sql = $db->query("SELECT email FROM utilisateurs WHERE email = :email");
            $sql->execute(["email" => $email]);

            $result = $sql->rowCount();
            if ($result == 0) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $q = $db->query("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, id_role) VALUES (:nom, :prenom, :email, :password, 2);");
                $q->execute(["nom" => $nom, "prenom" => $prenom, "email" => $email, "password" => $hashedPassword]);
                
                header("location: ../index.php");
                exit();

            } else {
                echo "Un compte avec cet email existe déjà.";
            }
        } else {
            echo "Les mots de passe ne correspondent pas.";
        }
    } else {
        echo "Erreur : Tous les champs doivent être remplis.";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
