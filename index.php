<?php
include ('functions.php');

$title = "Abbonamenti";


echo $title; 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link ref="stylesheet" href="./css/styles.css" />  
<title>Abbonamenti <?php $keys; ?></title>
</head>
<body>
<header><?php include('header.php'); ?></header>
    <div class="blocco_nav_title">
        <h1 class="sub-title"><i class="bi bi-alarm"></i></i>Abbonamenti Stagione <?php $data = Date('Y'); echo $data; ?></h1>
    </div>
    <div class="container">
  
</div>


    </div>
    </div>
    <button onclick="dimensioneWindow();">Dimensione</button>

    <div class="container">
  <div class="row">
    <div class="col-sm"><p id="card">Cards Profilo</p>
    <div class="cards-profile"><?php include('card-profile.php'); ?></div> </div>
    <div class="col-sm"> <p id="card">Cards Profilo</p>
    <div class="cards-profile"><?php include('card-profile.php'); ?></div></div>
    <div class="col-sm"><p id="card">Cards Profilo</p>
    <div class="cards-profile"><?php include('card-profile.php'); ?></div></div>
  </div>

  <div class="row">
    <div class="col-sm"><p id="card">Cards Profilo</p>
    <div class="cards-profile"><?php include('card-profile.php'); ?></div> </div>
    <div class="col-sm"> <p id="card">Cards Profilo</p>
    <div class="cards-profile"><?php include('card-profile.php'); ?></div></div>
    <div class="col-sm"><p id="card">Cards Profilo</p>
    <div class="cards-profile"><?php include('card-profile.php'); ?></div></div>
  </div>
</div>

 <?php include('footer-service.php'); ?>
<!-- JavaScript Bundle with Popper -->
<script src="./js/functions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>