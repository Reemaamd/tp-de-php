<?php
session_start();

// Si l'utilisateur est déjà connecté, on le redirige
if (isset($_SESSION['utilisateur'])) {
    header("Location: bienvenue.php");
    exit();
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['motdepasse'];

    // Identifiants valides (à adapter si besoin)
    $identifiant_valide = "admin";
    $motdepasse_valide = "1234";

    if ($identifiant === $identifiant_valide && $motdepasse === $motdepasse_valide) {
        $_SESSION['utilisateur'] = $identifiant;
        header("Location: bienvenue.php");
        exit();
    } else {
        $erreur = "Identifiants incorrects !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
    <form method="POST">
        <label for="identifiant">Identifiant :</label>
        <input type="text" name="identifiant" required><br><br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse" required><br><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
