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

</head>
<body>


  
  <nav class="navbar">
    <img src="<?= site_url("assets/image/logo.png"); ?>" alt="" class="logo">
    <div class="list_items">
      <a href="<?= site_url("home/index"); ?>" class="link">Accueil</a>
      <a href="#" class="link">Notifications</a>
      <a href="<?= site_url("home/produit"); ?>" class="link">Produits</a>
    </div>
  </nav>

  <header class="header">
    <div class="title">Echangez ceci</div>
  </header>

  <section class="section">
    <?php
    for ($i=0; $i < count($echange); $i++) { ?>
      <div class="carte">
        <img src="<?= site_url("assets/image/".$echange[$i]['source']); ?>" class="iaage">
        <div class="details">
          <p class="nom"><?= $echange[$i]['designation']; ?></p>
          <p class="desc"><?= $echange[$i]['description']; ?><p>
          <p class="prix"><?= $echange[$i]['prix']; ?></p>
        </div>
      </div>
    <?php } ?>
  </section>

  <header class="header header2">
    <div class="title">contre</div>
  </header>

  <section class="section">
    <?php
    for ($i=0; $i < count($resultat); $i++) { ?>
      <div class="carte">
        <img src="<?= site_url("assets/image/".$resultat[$i]['source']); ?>" class="iaage">
        <div class="details">
          <p class="nom"><?= $resultat[$i]['designation']; ?></p>
          <p class="desc"><?= $resultat[$i]['description']; ?><p>
          <p class="prix"><?= $resultat[$i]['prix']; ?></p>
          <form action="<?php echo base_url("echange/index"); ?>" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input type="hidden" name="id_objet_e" value="<?= $echange[0]["id_objet"]; ?>">
            <input type="hidden" name="id_client" value="<?= $client[0]["id_client"]; ?>">
            <input class="button" type="submit" value="Ceci"/>
          </form>
        </div>
      </div>
    <?php } ?>
  </section>
  
</body>
</html>