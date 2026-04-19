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

<div class="overlay">

<h2>📊 Tableau de bord</h2>

<div class="card">
<?php
$total = $conn->query("SELECT COUNT(*) as t FROM materiel")->fetch_assoc()['t'];
echo "📦 Total des matériels : ".$total;
?>
</div>

</div>

</div>