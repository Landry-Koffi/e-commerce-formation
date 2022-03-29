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
    if (!isset($_SESSION['email'])) {
        header('Location: index.php');
    }
    
        require_once 'includes/db.php';

        $req = $db->prepare('SELECT * FROM articles');
        $req->execute();
        $rows = $req->fetchAll();
    ?>

    <div class="container">
        <h1>Administration</h1>
        <p class="text-end"><a href="ajout_article.php" class="btn btn-primary">Ajoutez un article</a></p>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Date d'ajout</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                foreach($rows as $value){ ?>
                    <tr>
                        <th><?= $value['id'] ?></th>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['content'] ?></td>
                        <td><?= $value['price'] ?></td>
                        <td><?= $value['created_at'] ?></td>
                        <td>
                            <p class="btn btn-danger">
                                <a href="delete.php?id=<?= $value['id'] ?>" class="text-light">Delete</a>
                            </p>
                            <p class="btn btn-warning">
                                <a href="ajout_article.php?id=<?= $value['id'] ?>" class="text-light">Update</a>
                            </p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>