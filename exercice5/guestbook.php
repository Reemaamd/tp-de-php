<?php
$filename = "messages.txt";

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST["nom"]);
    $message = trim($_POST["message"]);

    // Vérification des champs
    if (!empty($nom) && !empty($message)) {
        $date = date("Y-m-d H:i:s");
        $ligne = "$date | $nom : $message" . PHP_EOL;

        // Écrire dans le fichier
        file_put_contents($filename, $ligne, FILE_APPEND);
    }
}

// Lire les messages
$messages = [];
if (file_exists($filename)) {
    $messages = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre d’or</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 20px auto; }
        form { margin-bottom: 30px; }
        textarea, input { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 10px; padding: 10px; background-color: #4CAF50; color: white; border: none; }
        .message { background: #f4f4f4; padding: 10px; margin-bottom: 10px; border-left: 4px solid #4CAF50; }
    </style>
</head>
<body>
    <h1>Livre d’or</h1>

    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Message :</label>
        <textarea name="message" rows="4" required></textarea>

        <button type="submit">Envoyer</button>
    </form>

    <h2>Messages :</h2>

    <?php if (!empty($messages)) : ?>
        <?php foreach ($messages as $msg) : ?>
            <div class="message"><?php echo htmlspecialchars($msg); ?></div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun message pour le moment.</p>
    <?php endif; ?>
</body>
</html>
