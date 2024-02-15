<?php
session_start(); // Démarrage ou continuation de la session

// Effacement de toutes les variables de session
$_SESSION = array();

// Destruction de la session
session_destroy();

// Redirection vers la page de connexion
header("Location: ../index.php");
exit;
