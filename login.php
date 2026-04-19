<?php
session_start();
include "database.php";

$msg = "";

/* ================= LOGIN ================= */
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){

        $user = $res->fetch_assoc();

        if(password_verify($password,$user['password'])){

            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            header("Location: dashboard.php");
            exit();

        } else {
            $msg = "Mot de passe incorrect";
        }

    } else {
        $msg = "Compte introuvable";
    }
}


/* ================= CHANGE PASSWORD ================= */
if(isset($_POST['change_pass'])){

    $email = $_POST['email'];
    $old = $_POST['old_password'];
    $new = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){

        $user = $res->fetch_assoc();

        if(password_verify($old,$user['password'])){

            $up = $conn->prepare("UPDATE users SET password=? WHERE email=?");
            $up->bind_param("ss",$new,$email);
            $up->execute();

            $msg = "Mot de passe modifié avec succès";

        } else {
            $msg = "Ancien mot de passe incorrect";
        }

    } else {
        $msg = "Compte introuvable";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login System</title>

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

/* BOX */
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
    background:#3b82f6;
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

/* SECTIONS */
#changeBox{
    display:none;
}

.msg{
    color:#ff6b6b;
    margin-bottom:10px;
}
</style>

</head>

<body>

<div class="box">

<?php if($msg!="") echo "<div class='msg'>$msg</div>"; ?>

<!-- ================= LOGIN ================= -->
<div id="loginBox">

<h2>🔐 Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Mot de passe" required>

<button name="login">Se connecter</button>

</form>

<a href="register.php">➕ Créer compte</a>
<a href="#" onclick="showChange()">🔁 Modifier mot de passe</a>

</div>

<!-- ================= CHANGE PASSWORD ================= -->
<div id="changeBox">

<h2>🔁 Modifier mot de passe</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="old_password" placeholder="Ancien mot de passe" required>
<input type="password" name="new_password" placeholder="Nouveau mot de passe" required>

<button name="change_pass">Modifier</button>

</form>

<a href="#" onclick="showLogin()">⬅ Retour Login</a>

</div>

</div>

<script>
function showChange(){
    document.getElementById("loginBox").style.display = "none";
    document.getElementById("changeBox").style.display = "block";
}

function showLogin(){
    document.getElementById("changeBox").style.display = "none";
    document.getElementById("loginBox").style.display = "block";
}
</script>

</body>
</html>