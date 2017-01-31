<?php
  require_once '../includes/connect.php';
  include '../includes/functions.php';
  include '../includes/header.php';

  $sql = 'SELECT species.species_id, species.species_imgurl, species.species_name, species.species_description, status.status_name, size.size_name, type.type_name, genus.genus_name, pattern.pattern_name, colour.colour_name
          FROM species
          INNER JOIN species_pattern ON species.species_id = species_pattern.species_id
          INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
          INNER JOIN species_colour ON species.species_id = species_colour.species_id
          INNER JOIN colour ON species_colour.colour_id = colour.colour_id
          INNER JOIN size ON size.size_id = species.size_id
          INNER JOIN type ON type.type_id = species.type_id
          INNER JOIN genus ON genus.genus_id = species.genus_id
          INNER JOIN status ON status.status_id = species.status_id
          GROUP BY species.species_name';

  $res = $db->query($sql);

  echo '<h1>Cats Database</h1>';

  if(!empty($_POST['sp_id'])){
    deleteSpecies($db, $_POST['sp_id']);
  }

  echo '<table class="table table-striped">';
  echo '<thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Type</th>
            <th>Size</th>
            <th>Colour</th>
            <th>Pattern</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>';
  foreach ($res as $row) {
    echo '<tr>';
    echo '<td>'. $row['species_name'] .'</td>';
    echo '<td>'. $row['species_description'] .'</td>';
    echo '<td>'. $row['status_name'] .'</td>';
    echo '<td>'. $row['type_name'] .'</td>';
    echo '<td>'. $row['size_name'] .'</td>';
    echo '<td>'. $row['colour_name'] .'</td>';
    echo '<td>'. $row['pattern_name'] .'</td >';
    if($row['species_imgurl'] == NULL){
      echo '<td>
              <form action="delete.php" method="post">
              <input type="hidden" name="sp_id" value="'. $row['species_id'] .'" />
              <input type="submit" class="btn btn-danger" value="Delete" />
              </form>
            </td>';
    }else{
      echo '<td><button class="btn btn-danger disabled">Delete</button></td>';
    }
  }
  echo '</tr>';
  echo '</tbody></table>';

  include '../includes/footer.php';?>
