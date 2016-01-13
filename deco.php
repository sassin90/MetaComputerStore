<?php
session_start();
unset($_SESSION['pseudo']);
unset($_SESSION['Mot_de_passe']);

header('Location: index.php');
?>