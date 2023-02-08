<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello</title>

  <link rel="stylesheet" href="<?php echo site_url("assets/css/reset.css");?>">
  <link rel="stylesheet" href="<?php echo site_url("assets/css/home.css");?>">
  <link rel="stylesheet" href="<?php echo site_url("assets/css/historique.css");?>">

  <script type="module" src="<?php echo site_url("assets/js/message.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/function.js"); ?>" defer></script>

</head>
<body>
  
  <div class="title">Historique</div>
  <table class="table">
    <tr class="h-title">
      <td>Date</td>
      <!-- <td>Nom</td>
      <td>Description</td>
      <td>Prix</td> -->
      <td>Possesseur</td>
    </tr>
    
  <?php
  for ($i=0; $i < count($histoire); $i++) { ?>
    <tr>
      <td><?= $histoire[$i]["date"]; ?></td>
      <td><?= $histoire[$i]["pseudo"]; ?></td>
    </tr>
  <?php }
  ?>
  </table>
  
</body>
</html>