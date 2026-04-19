<?php
include "database.php";

$msg = "";

/* RESET PASSWORD */
if(isset($_POST['reset'])){

    $email = $_POST['email'];
    $new = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){

        $up = $conn->prepare("UPDATE users SET password=? WHERE email=?");
        $up->bind_param("ss",$new,$email);
        $up->execute();

        $msg = "Mot de passe modifié avec succès";

    } else {
        $msg = "Compte introuvable";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Modifier mot de passe</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="auth-container">

<div class="auth-card">

<h2>🔁 Modifier mot de passe</h2>

<?php if($msg!="") echo "<p style='color:lightgreen'>$msg</p>"; ?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="new_password" placeholder="Nouveau mot de passe" required>

<button name="reset">Modifier</button>

</form>

<a href="login.php">⬅ Retour login</a>

</div>

</div>

</body>
</html>