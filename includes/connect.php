<?php
  require_once 'create_tables.php';
  require_once 'insert_data.php';

  $user = 'root';
  $password = 'password';
  $dbname = 'db';

  $db = new PDO('mysql:host=localhost', $user, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $dbname = "`".str_replace("`","``",$dbname)."`";

  //create database if not exists
  $db->exec("CREATE DATABASE IF NOT EXISTS $dbname");
  $db->exec("use $dbname");

  //call frunction to create tables
  create_tables($db);

  //inset basic data
  insert_initial_data($db);

  //insert ids in tables from many-to-many relationships
  $res = $db->query('SELECT COUNT(*) AS num FROM species_pattern');
  foreach($res as $row){
    $num = $row['num'];
  }
  if($num == 0){
    insert_pattern_data($db);
  }

  $res = $db->query('SELECT COUNT(*) AS num FROM species_colour');
  foreach($res as $row){
    $num = $row['num'];
  }
  if($num == 0){
    insert_colour_data($db);
  }

  $res = $db->query('SELECT COUNT(*) AS num FROM species_country');
  foreach($res as $row){
    $num = $row['num'];
  }
  if($num == 0){
    insert_country_data($db);
  }

  //complete species table with corresponding ids
  insert_subfamily_genus($db);
  insert_traits($db);
  insert_type($db);
  insert_size($db);
  insert_status($db);
  insert_genus($db);

?>
