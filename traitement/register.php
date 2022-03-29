<?php
if (isset($_POST['submit']))
{
    require_once '../includes/db.php';

    $name = htmlentities(trim($_POST['name']));
    $lastname = htmlentities(trim($_POST['lastname']));
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
    $password1 = htmlentities(trim($_POST['password1']));

    if($name && $lastname && $email && $password && $password1){
        if ($password === $password1){
            if(strlen($password)>= 8){

                $password = password_hash($password, PASSWORD_DEFAULT);
                $insert = $db->prepare('INSERT INTO users(name, lastname, email, password) VALUES(:name, :lastname, :email, :password)');
                $insert->execute(array(':name' => $name, ':lastname' => $lastname, ':email' => $email, ':password' => $password));
    
                echo "Inscription effectuée avec succès !";

            }else{
                echo "Votre mot de passe doit atteindre au moins 8 caractères";
            }
        }else{
            echo "Les deux mot de passe ne sont pas identiques";
        }
    }else{
        echo "Veuillez renseigner tous les champs !";
    }
}