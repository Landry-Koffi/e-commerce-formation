<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php require_once 'includes/header.php'; 
    require_once 'includes/db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $req = $db->prepare('SELECT * FROM articles WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch();
    }
    ?>

    <div class="container mt-5">
        <p>
            <img src="https://place-hold.it/300x200" class="card-img-top" alt="...">
        </p>
        <p><?= $row['price']; ?> XOF</p>
        <h3><?= $row['title']; ?></h3>
        <p><?= $row['content']; ?></p>
        <p><?= $row['created_at']; ?></p>
        <p></p>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>