<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            background-color: #2ecc71;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #27ae60;
        }
        .result {
            margin-top: 20px;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Contactez-nous</h1>

    <form method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = trim($_POST["nom"]);
        $email = trim($_POST["email"]);
        $message = trim($_POST["message"]);

        if (!empty($nom) && !empty($email) && !empty($message)) {
            echo "<div class='result'>";
            echo "<h3>Merci pour votre message !</h3>";
            echo "<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>";
            echo "<p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
            echo "</div>";
        } else {
            echo "<div class='result'>Tous les champs sont obligatoires.</div>";
        }
    }
    ?>
</body>
</html>
