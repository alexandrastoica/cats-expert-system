<?php
  try {
    require_once 'connect.php';
  } catch (Exception $e) {
    $e->getMessage();
  }
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Cats Expert System</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link href="../css/reset.min.css" rel="stylesheet" type="text/css">
      <link href="../css/style.css" rel="stylesheet" type="text/css">

      <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Home</a></li>
          <li><a href="expert.php">Cats Expert System</a></li>
          <li><a href="add.php">Add Cat</a></li>
          <li><a href="delete.php">Manage Cats Database</a></li>
        </ul>
      </div>
    </nav>

    <section id="wrapper">
