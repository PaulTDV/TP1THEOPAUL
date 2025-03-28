<?php
$conn = new mysqli("localhost", "root", "", "rocket_league");

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer le mode envoyé par AJAX
$mode = $_POST['mode'] ?? '';

// Vérifier que le mode est valide
$modes = ["1v1", "2v2", "3v3", "Rumble", "Dropshot"];
if (in_array($mode, $modes)) {
    $stmt = $conn->prepare("INSERT INTO votes (mode) VALUES (?)");
    $stmt->bind_param("s", $mode);
    $stmt->execute();
}

// Renvoyer les votes mis à jour
$result = $conn->query("SELECT mode, COUNT(*) AS votes FROM votes GROUP BY mode");
$votes = [];
while ($row = $result->fetch_assoc()) {
    $votes[$row['mode']] = $row['votes'];
}
echo json_encode($votes);
