<?php 

include('registrazione_utente.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link ref="stylesheet" href="/css/styles.css" />  
    <title>Sottoscrivi abbonamento</title>
</head>
<body>
<header><?php include('header.php'); ?></header>
    <div class="container-fluid">
  <h1 class="h1-header">Sottoscrivi Abbonamenti</h1>
  <h4>Registrati gratuitamente per poter accedere ai servizi del sito</h4>
    <form name="form" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="alias" class="col-sm-2 col-form-label">Alias</label>
    <div class="col-sm-10">
      <input type="text" name="alias" class="form-control" id="alias">
    </div>
  </div>
  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Come desideri essere contattato in futuro ?</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="marketing" id="sms" value="sms">
        <label class="form-check-label" for="sms">
          contattato via SMS
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="marketing" id="whatsapp" value="whatsapp">
        <label class="form-check-label" for="whatsapp">
          Contattato via whatsapp
        </label>
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="marketing" id="via-email" value="via-email">
        <label class="form-check-label" for="via-email">
          Contattato via email
        </label>
      </div>
    </div>
  </fieldset>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="privacy" name="privacy" value="privacy">
        <label class="form-check-label" for="privacy">
          Ho letto e preso visione della normativa <a href="privacy.php">Privacy</a>
        </label>
      </div>
    </div>
  </div>
  <input type="hidden" name="register" value="register">
  <button type="submit" name="submit" class="btn btn-primary">Sottoscrivi</button>
</form>
<p><?php echo $alias; ?></p>
    </div>
    <?php include('footer-service.php'); ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>



