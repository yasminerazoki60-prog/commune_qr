<?php
include "database.php";

$msg = "";

/* CREATE ACCOUNT */
if(isset($_POST['register'])){

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check if exists
    $check = $conn->prepare("SELECT * FROM users WHERE email=?");
    $check->bind_param("s",$email);
    $check->execute();
    $res = $check->get_result();

    if($res->num_rows > 0){
        $msg = "Compte déjà existe";
    } else {

        $stmt = $conn->prepare("INSERT INTO users(email,password,role) VALUES(?,?, 'user')");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();

        $msg = "Compte créé avec succès";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Créer compte</title>

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    font-family:Arial;
}

/* BOX CENTER */
.box{
    width:380px;
    padding:30px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    border-radius:15px;
    text-align:center;
    color:white;
    box-shadow:0 10px 30px rgba(0,0,0,0.5);
}

/* INPUT */
input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:10px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:#10b981;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
}

/* LINKS */
a{
    display:block;
    margin-top:10px;
    color:#38bdf8;
    text-decoration:none;
}

.msg{
    margin-bottom:10px;
    color:lightgreen;
}
</style>

</head>

<body>

<div class="box">

<h2>📝 Créer compte</h2>

<?php if($msg!="") echo "<div class='msg'>$msg</div>"; ?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Mot de passe" required>

<button name="register">Créer compte</button>

</form>

<a href="login.php">⬅ Retour login</a>

</div>

</body>
</html>