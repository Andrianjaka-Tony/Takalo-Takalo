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
      <a href="<?= site_url("home/notif"); ?>" class="link">Notifications</a>
      <a href="<?= site_url("home/produit"); ?>" class="link">Produits</a>
    </div>
  </nav>

  <header class="header">
    <div class="title">Demandes d'echange</div>
  </header>

  <?php
  for ($i=0; $i < count($echange); $i++) { ?>
    <form action="<?= base_url('echange/accepter'); ?>" method="get">
      <span><?= $echange[$i]["desi1"]." a une valeur estimee a: ".$echange[$i]["p1"]. "Ar propose par le client ".$echange[$i]["id_sender"]." contre votre" ?></span>
      <span><?= $echange[$i]["desi2"]." a une valeur estimee a: ".$echange[$i]["p2"]. "Ar"?></span>
      <input type="hidden" name="id_sender" value="<?= $echange[$i]["id_sender"] ?>">
      <input type="hidden" name="objet_sender" value="<?= $echange[$i]["objet_sender"] ?>">
      <input type="hidden" name="objet_receiver" value="<?= $echange[$i]["objet_receiver"] ?>">
      <input type="submit" value="Accepter">
    </form>
  <?php } ?>

</body>
</html>