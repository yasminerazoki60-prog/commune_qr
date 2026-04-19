<?php include "database.php"; ?>

<link rel="stylesheet" href="style.css">

<div class="sidebar">
<h3>🏛️ Système QR</h3>
<a href="dashboard.php">📊 Tableau de bord</a>
<a href="index.php">➕ Ajouter</a>
<a href="list.php">📋 Liste</a>
<a href="qr.php">📱 QR</a>
</div>

<div class="main">

<h2>📋 Liste des matériels</h2>

<?php
$res = $conn->query("SELECT * FROM materiel ORDER BY id DESC");

while($row=$res->fetch_assoc()){
?>

<div class="card" style="display:flex;justify-content:space-between;align-items:center;">

<div>
<h3><?= $row['nom'] ?></h3>
<p><?= $row['type'] ?> | <?= $row['marque'] ?> | <?= $row['modele'] ?> | <?= $row['ram'] ?> | <?= $row['stockage'] ?></p>
</div>

<div>
<a class="button" href="view.php?id=<?= $row['id'] ?>">👁️ Voir</a>
<a class="button" href="uploads/qr_<?= $row['id'] ?>.png" download>📥 QR</a>
</div>

</div>

<?php } ?>

</div>