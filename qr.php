<?php
include "database.php";

$link = "";

if (!file_exists("uploads")) mkdir("uploads");

$res = $conn->query("SELECT * FROM materiel ORDER BY id DESC");

?>

<link rel="stylesheet" href="style.css">

<div class="sidebar">
<h3>🏛️ Système QR</h3>
<a href="dashboard.php">📊 Tableau de bord</a>
<a href="index.php">➕ Ajouter</a>
<a href="list.php">📋 Liste</a>
<a href="qr.php">📱 QR</a>
</div>

<div class="main">

<h2>📱 Centre QR</h2>

<div class="qr-container">

<?php
while($row=$res->fetch_assoc()){
?>

<div class="card" style="text-align:center;">

<h3><?= htmlspecialchars($row['nom']) ?></h3>

<img src="uploads/qr_<?= $row['id'] ?>.png" width="150" onclick="openModal(this.src)" style="cursor:pointer;border-radius:10px;">

<br><br>

<a class="button" href="view.php?id=<?= $row['id'] ?>">Voir</a>

</div>

<?php } ?>

</div>

</div>

<div class="modal" id="modal" onclick="closeModal()">
<img id="modalImg">
</div>

<script>
function openModal(src) {
  document.getElementById('modal').style.display = 'block';
  document.getElementById('modalImg').src = src;
}
function closeModal() {
  document.getElementById('modal').style.display = 'none';
}
</script>
