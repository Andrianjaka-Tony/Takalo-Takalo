<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?php echo site_url("assets/css/reset.css");?>">

  <style>
    h1.title {
      font-size: 2.2rem;
      margin: 10px;
    }
  </style>

</head>
<body>
  
  <h1 class="title">Nombre d'echanges éfféctués: <?= $echanges ?></h1>
  <h1 class="title">Nombre de clients inscrits: <?= $clients ?></h1>

  <form method="get" action="admin/insert">
    <input type="text" name="nom"/>
    <input type="submit" value="Inserer" />
  </form>

</body>
</html>