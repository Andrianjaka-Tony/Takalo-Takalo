<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="<?php echo site_url("assets/css/reset.css"); ?>">
  <link rel="stylesheet" href="<?php echo site_url("assets/css/login.css"); ?>">

  <script type="module" src="<?php echo site_url("assets/js/message.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/function.js"); ?>" defer></script>
  <script type="module" src="<?php echo site_url("assets/js/login.js"); ?>" defer></script>

</head>
<body>
  
  <form class="connexion form active">

    <h1 class="title">Connexion</h1>
    <div class="input_container">
      <label class="label">E-mail</label>
      <input type="email" class="input" name="email">
    </div>
    <div class="input_container">
      <label class="label">Mot de passe</label>
      <input type="password" class="input" name="mot_de_passe">
    </div>
    <input type="submit" class="button" value="Log in">
    <div class="link">
      <img src="assets/image/google.svg" class="link-logo">
      <p class="link-name">Log in with google</p>
    </div>
    <div class="line"></div>
    <button type="button" class="button-link button">Create an account</button>

  </form>


  <form class="inscription form">

    <h1 class="title">Inscription</h1>
    <div class="input_container">
      <label class="label">Pseudo</label>
      <input type="text" class="input" name="pseudo">
    </div>
    <div class="input_container">
      <label class="label">E-mail</label>
      <input type="email" class="input" name="email">
    </div>
    <div class="input_container">
      <label class="label">Mot de passe</label>
      <input type="password" class="input" name="mot_de_passe">
    </div>
    <input type="submit" class="button" value="Sign up">
    <div class="link">
      <img src="assets/image/google.svg" class="link-logo">
      <p class="link-name">Sign up with google</p>
    </div>
    <div class="line"></div>
    <button type="button" class="button-link button">I have a account</button>

  </form>

</body>
</html>