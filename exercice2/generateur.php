<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de mot de passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        input, button {
            padding: 8px;
            width: 100%;
            margin-top: 10px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
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
    <h1>Générateur de mot de passe</h1>

    <form method="POST">
        <label for="longueur">Longueur du mot de passe :</label>
        <input type="number" id="longueur" name="longueur" min="4" required>
        <button type="submit">Générer</button>
    </form>

    <?php
    function genererMotDePasse($longueur) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
        $motDePasse = '';
        $taille = strlen($caracteres);

        for ($i = 0; $i < $longueur; $i++) {
            $motDePasse .= $caracteres[rand(0, $taille - 1)];
        }

        return $motDePasse;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $longueur = intval($_POST["longueur"]);

        if ($longueur < 4) {
            echo "<div class='result'>La longueur doit être au moins 4 caractères.</div>";
        } else {
            $motDePasse = genererMotDePasse($longueur);
            echo "<div class='result'><strong>Mot de passe généré :</strong> $motDePasse</div>";
        }
    }
    ?>
</body>
</html>
