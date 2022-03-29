<?php
require_once '../includes/db.php';
if (isset($_POST['submit']))
{
    $title = htmlentities(trim($_POST['title']));
    $content = htmlentities(trim($_POST['content']));
    $price = htmlentities(trim($_POST['price']));
    $dates = date('d-m-Y H:i:s');

    if($title && $content && $price){

        $insert = $db->prepare('INSERT INTO articles(title, content, price, created_at) VALUES(:title, :content, :price, :created_at)');
        $insert->execute(array(':title' => $title, ':content' => $content, ':price' => $price, ':created_at' => $dates));

        header('Location: ../admin.php');
    }else{
        echo "Veuillez renseigner tous les champs !";
    }
}elseif(isset($_POST['modif'])){
    $title = htmlentities(trim($_POST['title']));
    $content = htmlentities(trim($_POST['content']));
    $price = htmlentities(trim($_POST['price']));
    $id = htmlentities(trim($_POST['id']));

    if($title && $content && $price){

        $update = $db->prepare('UPDATE articles SET title=:title, content=:content, price=:price WHERE id=:id');
        $update->execute(array(':title' => $title, ':content' => $content, ':price' => $price, ':id' => $id));

        header('Location: ../admin.php');
    }else{
        echo "Veuillez renseigner tous les champs !";
    }
}