<?php 
if ($_GET['id']){
    require_once 'includes/db.php';

    $id = $_GET['id'];

    $del = $db->prepare('DELETE FROM articles WHERE id=:id');
    $del->bindValue(':id', $id, PDO::PARAM_INT);
    $del->execute();
    header('Location: admin.php');
}else{
    header("Location: admin.php");
}