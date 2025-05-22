<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de la Calculatrice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Résultat du Calcul</h1>
    <?php
    // Vérification des données envoyées
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre1 = $_POST["nombre1"];
        $nombre2 = $_POST["nombre2"];
        $operation = $_POST["operation"];

        // Calcul selon l'opération choisie
        switch ($operation) {
            case "addition":
                $resultat = $nombre1 + $nombre2;
                $symbole = "+";
                break;
            case "soustraction":
                $resultat = $nombre1 - $nombre2;
                $symbole = "-";
                break;
            case "multiplication":
                $resultat = $nombre1 * $nombre2;
                $symbole = "×";
                break;
            case "division":
                if ($nombre2 == 0) {
                    $resultat = "Erreur : Division par zéro impossible !";
                } else {
                    $resultat = $nombre1 / $nombre2;
                    $symbole = "÷";
                }
                break;
            default:
                $resultat = "Opération non valide";
                $symbole = "?";
        }

        // Affichage du résultat
        echo "<div class='result'>";
        echo "<p><strong>Opération :</strong> $nombre1 $symbole $nombre2</p>";
        echo "<p><strong>Résultat :</strong> $resultat</p>";
        echo "</div>";
    } else {
        echo "<p>Veuillez soumettre le formulaire.</p>";
    }
    ?>
    <a href="calculatrice.html">Retour à la calculatrice</a>
</body>
</html>