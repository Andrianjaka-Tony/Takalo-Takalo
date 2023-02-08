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
  <script type="module" src="<?php echo site_url("assets/js/objet.js"); ?>" defer></script>

</head>
<body>

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
  
</body>
</html>