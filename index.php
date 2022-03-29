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

    $req = $db->prepare('SELECT * FROM articles');
    $req->execute();
    $rows = $req->fetchAll();
    ?>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">


            <?php foreach($rows as $value){ ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="https://place-hold.it/300x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $value['title']; ?>
                            </h5>
                            <p class="text-danger">
                                <?= $value['price']; ?> XOF
                            </p>
                        </div>
                        <div class="card-foot">
                            <a href="details.php?id=<?= $value['id']; ?> " class="btn btn-primary">Voir plus...</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>