<?php session_start();
if (isset($_POST['submit']))
{
    require_once '../includes/db.php';

    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));

    $req = $db->prepare('SELECT * FROM users WHERE email=:email');
    $req->bindValue(':email', $email, PDO::PARAM_STR);

    $req->execute();

    $row = $req->fetch();

    if ($row['email']) {
        if (password_verify($password, $row['password'])) {
           $_SESSION['email'] = $email;

           header('Location: ../admin.php');
        }else{
            echo "Identifiant incorrect";
        }
    }else{
        echo "Vous n'êtes pas un membre";
    }
}