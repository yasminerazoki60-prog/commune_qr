<?php
include "database.php";
include "phpqrcode/qrlib.php";

// استلام البيانات
$nom = $_POST['nom'];
$type = $_POST['type'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$ram = $_POST['ram'];
$processeur = $_POST['processeur'];
$stockage = $_POST['stockage'];
$carte_graphique = $_POST['carte_graphique'];
$numero_serie = $_POST['numero_serie'];
$code_inventaire = $_POST['code_inventaire'];
$prix = $_POST['prix'];
$date_achat = $_POST['date_achat'];
$fournisseur = $_POST['fournisseur'];
$service = $_POST['service'];
$emplacement = $_POST['emplacement'];
$responsable = $_POST['responsable'];
$etat = $_POST['etat'];
$garantie = $_POST['garantie'];

// إدخال البيانات في القاعدة
$sql = "INSERT INTO materiel (nom, type, marque, modele, ram, processeur, stockage, carte_graphique, numero_serie, code_inventaire, prix, date_achat, fournisseur, service, emplacement, responsable, etat, garantie)
VALUES ('$nom', '$type', '$marque', '$modele', '$ram', '$processeur', '$stockage', '$carte_graphique', '$numero_serie', '$code_inventaire', '$prix', '$date_achat', '$fournisseur', '$service', '$emplacement', '$responsable', '$etat', '$garantie')";

if($conn->query($sql)) {
    $id = $conn->insert_id;

    if (!file_exists("uploads")) mkdir("uploads", 0777, true);

    // الرابط الرسمي أونلاين
    $link = "http://communeqr.infinityfreeapp.com/view.php?id=" . $id;

    // توليد الـ QR بجودة عالية
    QRcode::png($link, "uploads/qr_$id.png", QR_ECLEVEL_L, 10);

    header("Location: qr.php");
} else {
    echo "Erreur : " . $conn->error;
}
exit;
?>