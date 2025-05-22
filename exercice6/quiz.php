<?php
// Tableau des questions et des réponses
$questions = [
    [
        "question" => "Quel langage est utilisé pour créer des pages web dynamiques ?",
        "options" => ["HTML", "CSS", "PHP", "Photoshop"],
        "correct" => 2 // Index de la bonne réponse
    ],
    [
        "question" => "Quelle balise HTML permet d'afficher une image ?",
        "options" => ["<img>", "<image>", "<src>", "<pic>"],
        "correct" => 0
    ],
    [
        "question" => "Quelle est la valeur de 2 + 2 * 2 ?",
        "options" => ["6", "8", "4", "2"],
        "correct" => 0
    ],
    [
        "question" => "Quel protocole est utilisé pour naviguer sur le web ?",
        "options" => ["HTTP", "FTP", "SSH", "SMTP"],
        "correct" => 0
    ],
    [
        "question" => "Quelle extension de fichier est typiquement associée au code PHP ?",
        "options" => [".html", ".css", ".php", ".js"],
        "correct" => 2
    ],
];

$score = 0;
$total = count($questions);
$afficher_resultats = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $afficher_resultats = true;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Quiz PHP</title>
    <style>
        body { font-family: Arial; max-width: 700px; margin: 20px auto; }
        .question { margin-bottom: 20px; }
        .result { background: #f0f0f0; padding: 10px; margin-top: 10px; border-left: 4px solid #4CAF50; }
        .correct { color: green; }
        .incorrect { color: red; }
    </style>
</head>
<body>
    <h1>Mini Quiz</h1>

    <form method="POST">
        <?php foreach ($questions as $index => $q): ?>
            <div class="question">
                <p><strong><?php echo ($index + 1) . ". " . $q["question"]; ?></strong></p>
                <?php foreach ($q["options"] as $key => $option): ?>
                    <label>
                        <input type="radio" name="q<?php echo $index; ?>" value="<?php echo $key; ?>"
                        <?php if ($afficher_resultats && isset($_POST["q$index"]) && $_POST["q$index"] == $key) echo "checked"; ?>>
                        <?php echo htmlspecialchars($option); ?>
                    </label><br>
                <?php endforeach; ?>

                <?php if ($afficher_resultats): ?>
                    <div class="result">
                        <?php
                        $selected = isset($_POST["q$index"]) ? intval($_POST["q$index"]) : -1;
                        if ($selected === $q["correct"]) {
                            echo "<span class='correct'>Bonne réponse ✅</span>";
                            $score++;
                        } else {
                            echo "<span class='incorrect'>Mauvaise réponse ❌</span><br>";
                            echo "Réponse correcte : <strong>" . $q["options"][$q["correct"]] . "</strong>";
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <?php if ($afficher_resultats): ?>
            <h2>Votre score : <?php echo "$score / $total"; ?></h2>
            <a href="quiz.php">Recommencer</a>
        <?php else: ?>
            <button type="submit">Valider</button>
        <?php endif; ?>
    </form>
</body>
</html>
