<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "rocket_league");

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des votes actuels
$result = $conn->query("SELECT mode, COUNT(*) AS votes FROM votes GROUP BY mode");
$votes = [];
while ($row = $result->fetch_assoc()) {
    $votes[$row['mode']] = $row['votes'];
}

// Modes possibles
$modes = ["1v1", "2v2", "3v3", "Rumble", "Dropshot"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocket League Vote</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Vote pour ton mode préféré ! 🚀</h1>
    <div class="vote-container">
        <?php foreach ($modes as $mode) : ?>
            <button class="vote-btn" onclick="vote('<?php echo $mode; ?>')">
                <?php echo $mode; ?> (<?php echo $votes[$mode] ?? 0; ?> votes)
            </button>
        <?php endforeach; ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
