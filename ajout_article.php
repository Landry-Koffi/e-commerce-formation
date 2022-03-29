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

    <div class="container">
        <h1>Ajout d'article</h1>
        <form action="traitement/ajout_article.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'artcle</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php if(isset($row)){ echo $row['title']; } ?>">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10"> <?php if(isset($row)){ echo $row['content']; } ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" name="price" class="form-control" value="<?php if(isset($row)){ echo $row['price']; } ?>" id="price">
            </div>
            <div class="mb-3">
                <input type="file" name="image" class="form-control">
            </div>
            <input type="hidden" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>" name="id">
            <div class="mb-3">
            <?php if(isset($row)){ ?>
                <input type="submit" name="modif" class="btn btn-primary" value="Modifier">
            <?php }else{ ?>
                <input type="submit" name="submit" class="btn btn-primary" value="Enregistrer">
           <?php } ?>
            </div>
        </form>
        
    </div>

    
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>