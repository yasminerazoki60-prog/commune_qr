<?php
include "database.php";

if(!isset($_GET['id'])){
    die("ID missing");
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM materiel WHERE id=$id");

if($result->num_rows == 0){
    die("Aucun matériel trouvé");
}

$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Détails Matériel</title>
</head>
<body>
<div class="main" style="margin-left:0; padding:20px;">
    <div class="card" style="max-width:600px; margin:auto; text-align:center;">
        <h2>🏛️ Détails du matériel</h2>
        <hr>
        <div style="text-align:left; display:inline-block;">
            <p><b>Nom :</b> <?= htmlspecialchars($row['nom']) ?></p>
            <p><b>Type :</b> <?= htmlspecialchars($row['type']) ?></p>
            <p><b>Marque :</b> <?= htmlspecialchars($row['marque']) ?></p>
            <p><b>Modèle :</b> <?= htmlspecialchars($row['modele']) ?></p>
            <p><b>RAM :</b> <?= htmlspecialchars($row['ram']) ?></p>
            <p><b>Processeur :</b> <?= htmlspecialchars($row['processeur']) ?></p>
            <p><b>Stockage :</b> <?= htmlspecialchars($row['stockage']) ?></p>
            <p><b>Service :</b> <?= htmlspecialchars($row['service']) ?></p>
            <p><b>État :</b> <?= htmlspecialchars($row['etat']) ?></p>
        </div>
        <br><br>
        <img src="uploads/qr_<?= $row['id'] ?>.png" width="150" style="border:2px solid #fff; border-radius:10px;">
        <br>
        <button class="button" onclick="window.print()">🖨️ Imprimer la fiche</button>
    </div>
</div>
</body>
</html>