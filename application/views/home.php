<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello</title>

  <link rel="stylesheet" href="<?php echo site_url("assets/css/reset.css");?>">
  <link rel="stylesheet" href="<?php echo site_url("assets/css/home.css");?>">
  <link rel="stylesheet" href="<?php echo site_url("assets/css/style.css"); ?>"> 
  <link rel="stylesheet" href="<?php echo site_url("assets/css/font-awesome-4.7.0/css/font-awesome.min.css") ?>">

  <script type="module" src="<?php echo site_url("assets/js/message.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/function.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/objet.js"); ?>" defer></script>

</head>
<body>
  
  <nav class="navbar">
    <img src="<?= site_url("assets/image/logo.png"); ?>" alt="" class="logo">
    <div class="list_items">
      <a href="<?= site_url("home/index"); ?>" class="link">Accueil</a>
      <a href="<?= site_url("home/notif"); ?>" class="link">Notifications</a>
      <a href="<?= site_url("home/produit"); ?>" class="link">Produits</a>
      <a href="<?= site_url("admin/"); ?>" class="link">Admin</a>
    </div>
  </nav>

  <header class="header">
    <div class="title">Cherchez votre objet</div>
    <form action="<?= base_url("search") ?>" method="get" class="fff">
      <input type="text" name="titre">
      <select name="id_categorie" id="options">

      </select>
      <input type="submit" value="Chercher">
    </form>
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
          <form action="" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input class="button" type="submit" value="Detail"/>
          </form>
          <form action="<?= site_url("home/echanger"); ?>" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input class="button" type="submit" value="Echanger"/>
          </form>
          <form action="<?= base_url("historique"); ?>" method="get">
            <input type="hidden" name="id_objet" value="<?= $resultat[$i]["id_objet"]; ?>">
            <input class="button" type="submit" value="Historique"/>
          </form>
        </div>
      </div>
    <?php } ?>
  </section>

  <footer>
        <div class="footer">
        <div class="row"><a href="#"><img src="<?= site_url("assets/image/logo.png") ?>" alt="x" style="width:60px; height:50px" class="img-logo"></a></div>
        <div class="row">
            <b style="font-family: sans-serif; color:rgba(251, 32, 255, 0.704); font-style:italic">ABOUT US</b>
            <p>RANAIVOARIMANANA Fitahiana Roland ETU001853</p>
            <p>ANDRIANJAKATSIHOARANA Tony Rakotondrazaka ETU001853</p>
            <p>RAHARITSALAMA Maurino ETU001809</p>
        </div>
        <div class="row">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
        
        <div class="row" >
        <ul>
        <li><a class="footer-menue" style="color:#fff">Home</a></li>
        <li><a class="footer-menue" style="color:#fff">Les Objets</a></li>
        <li><a class="footer-menue" style="color:#fff">Privacy Policy</a></li>
        <li><a class="footer-menue" style="color:#fff">Contact us</a></li>
        </ul>
        </div>
        
        <div class="row">
        INFER Copyright © 2023 Information - All rights reserved || Designed By: TFMau 
        </div>
        </div>
    </footer>
  
</body>
</html>