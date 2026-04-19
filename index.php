<link rel="stylesheet" href="style.css">

<div class="sidebar">
<h3>🏛️ Système QR</h3>
<a href="dashboard.php">📊 Tableau de bord</a>
<a href="index.php">➕ Ajouter</a>
<a href="list.php">📋 Liste</a>
<a href="qr.php">📱 QR</a>
</div>

<div class="main">

<div class="card" style="max-width:500px;margin:auto;">

<h2>➕ Ajouter un matériel</h2>

<form action="save.php" method="POST">
<input name="nom" placeholder="Nom">
<input name="type" placeholder="Type">
<input name="marque" placeholder="Marque">
<input name="modele" placeholder="Modèle">
<input name="ram" placeholder="RAM">
<input name="processeur" placeholder="Processeur">
<input name="stockage" placeholder="Stockage">
<input name="carte_graphique" placeholder="Carte graphique">
<input name="numero_serie" placeholder="Numéro de série">
<input name="code_inventaire" placeholder="Code inventaire">
<input name="prix" placeholder="Prix">
<input type="date" name="date_achat">
<input name="fournisseur" placeholder="Fournisseur">
<input name="service" placeholder="Service">
<input name="emplacement" placeholder="Emplacement">
<input name="responsable" placeholder="Responsable">
<input name="etat" placeholder="État">
<input name="garantie" placeholder="Garantie">
<button class="button" style="width:100%;margin-top:10px;">🚀 Générer QR</button>
</form>

</div>

</div>