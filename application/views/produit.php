<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello</title>

  <link rel="stylesheet" href="<?php echo site_url("assets/css/reset.css");?>">
  <link rel="stylesheet" href="<?php echo site_url("assets/css/home.css");?>">

  <script type="module" src="<?php echo site_url("assets/js/message.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/function.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/objet.js"); ?>" defer></script>\

</head>
<body>


  
  <nav class="navbar">
    <img src="<?= site_url("assets/image/logo.png"); ?>" alt="" class="logo">
    <div class="list_items">
      <a href="<?= site_url("home/index"); ?>" class="link">Accueil</a>
      <a href="<?= site_url("home/notif"); ?>" class="link">Notifications</a>
      <a href="<?= site_url("home/produit"); ?>" class="link">Produits</a>
    </div>
  </nav>


  <div class="ajouter_produit section">
    <form  class="connexion form active" id="upload_file" enctype="multipart/form-data">

      <h1 class="title">Ajouter</h1>
      <div class="input_container">
        <label class="label">Nom du produit</label>
        <input type="text" class="input" name="designation">
      </div>
      <div class="input_container">
        <label class="label">Description</label>
        <input type="text" class="input" name="description">
      </div>
      <div class="input_container">
        <label class="label">Valeur d'estimation</label>
        <input type="text" class="input number" name="prix">
      </div>
      <div class="input_container file">
        <label for="file" class="label">Photo</label>
        <input type="file" id="file" class="input file" name="files[]" multiple id="">
      </div>
      <div class="input_container">
        <select id="options" name="id_categorie">
          
        </select>
      </div>
      <input type="submit" class="button" value="Ajouter" name="submit">

    </form>
  </div>


  <div class="section">
    <?php
    for ($i=0; $i < count($resultat); $i++) { ?>
      <div class="carte">
        <img src="<?= site_url("assets/image/".$resultat[$i]['source']); ?>" class="iaage">
        <div class="details">
          <p class="nom"><?= $resultat[$i]['designation']; ?></p>
          <p class="desc"><?= $resultat[$i]['description']; ?><p>
          <p class="prix"><?= $resultat[$i]['prix']; ?></p>
          <form action="" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input class="button d" type="submit" value="Supprimer"/>
          </form>
          <form action="" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input class="button" type="submit" value="Details"/>
          </form>
          <form action="<?= base_url("historique"); ?>" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input class="button" type="submit" value="Historique"/>
          </form>
          <form action="<?= base_url("pourcent"); ?>" method="get">
            <input type="hidden" name="prix" value="<?= $resultat[$i]['prix']; ?>">
            <input type="hidden" name="taux" value="10">
            <input class="button" type="submit" value="10%"/>
          </form>
          <form action="<?= base_url("pourcent"); ?>" method="get">
            <input type="hidden" name="prix" value="<?= $resultat[$i]['prix']; ?>">
            <input type="hidden" name="taux" value="20">
            <input class="button" type="submit" value="20%"/>
          </form>
        </div>
      </div>
    <?php } ?>
    </div>
  
</body>
</html>