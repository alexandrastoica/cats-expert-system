<?php
function getBySizePattern($db, $size, $pattern){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND species.species_imgurl IS NOT NULL';

    return $db->query($sql);
  }

  function getPatternBySize($db, $size){
    $sql = 'SELECT pattern.pattern_name
            FROM pattern INNER JOIN species_pattern
            ON pattern.pattern_id = species_pattern.pattern_id
            INNER JOIN species ON species.species_id = species_pattern.species_id
            INNER JOIN size ON size.size_id = species.size_id
            WHERE size.size_name = "' . $size . '"
            GROUP BY pattern.pattern_name';

    return $db->query($sql);
  }

  function getTypeBySize($db, $size){
    $sql = 'SELECT type.type_name
            FROM type
            INNER JOIN species ON species.type_id = type.type_id
            GROUP BY type.type_name';
    return $db->query($sql);
  }

  function getColourBySizePattern($db, $size, $pattern){
    $sql = 'SELECT colour.colour_name FROM colour
            INNER JOIN species_colour ON species_colour.colour_id = colour.colour_id
            INNER JOIN species ON species.species_id = species_colour.species_id
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            WHERE size.size_name = "' . $size . '"
            AND pattern.pattern_name = "' . $pattern . '"
            AND colour.colour_name != "black"
            GROUP BY colour.colour_name';
    return $db->query($sql);
  }

  function getByColourSizePattern($db, $colour, $size, $pattern){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND colour.colour_name = "'. $colour .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getByColourSizePatternEx($db, $colour, $size, $pattern, $exclude_option){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND colour.colour_name = "'. $colour .'"
            AND species.species_name != "'. $exclude_option .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizePatternColourTrait($db, $size, $pattern, $colour, $trait){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            INNER JOIN trait ON species.trait_id = trait.trait_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND colour.colour_name = "'. $colour .'"
            AND trait.trait_name = "'. $trait .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizePatternColourEx($db, $size, $pattern, $colour, $exclude_trait_1, $exclude_trait_2){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            INNER JOIN trait ON species.trait_id = trait.trait_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND colour.colour_name = "'. $colour .'"
            AND trait.trait_name != "'. $exclude_trait_1 .'"
            AND trait.trait_name != "'. $exclude_trait_2 .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizePatternEx($db, $size, $pattern, $exclude_trait, $exclude_option){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            INNER JOIN trait ON trait.trait_id = species.trait_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND trait.trait_name != "'. $exclude_trait .'"
            AND species.species_name != "'. $exclude_option .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getCountryBySizePatternColour($db, $size, $pattern, $colour, $exclude_trait){
    $sql = 'SELECT species.species_name, country.country_name
            FROM country
            INNER JOIN species_country ON country.country_id = species_country.country_id
            INNER JOIN species ON species.species_id = species_country.species_id
            INNER JOIN size ON species.size_id = size.size_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON pattern.pattern_id = species_pattern.pattern_id
            INNER JOIN trait ON species.trait_id = trait.trait_id
            WHERE colour_name = "'. $colour .'"
            AND size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND trait.trait_name != "'. $exclude_trait .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY country.country_name
            ORDER BY `species`.`species_name`';
    return $db->query($sql);
  }

  function excludeTrait($db, $size, $exclude_trait){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN trait ON species.trait_id = trait.trait_id
            INNER JOIN size ON species.size_id = size.size_id
            WHERE trait.trait_name != "'. $exclude_trait .'"
            AND size.size_name = "'. $size .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizePatternTrait($db, $size, $pattern, $trait){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN trait ON species.trait_id = trait.trait_id
            INNER JOIN size ON species.size_id = size.size_id
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON pattern.pattern_id = species_pattern.pattern_id
            WHERE trait.trait_name = "'. $trait .'"
            AND size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizeType($db, $size, $type){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN type ON species.type_id = type.type_id
            INNER JOIN size ON species.size_id = size.size_id
            WHERE type.type_name = "'. $type .'"
            AND size.size_name = "'. $size .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizeTrait($db, $size, $trait){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN size ON species.size_id = size.size_id
            INNER JOIN trait ON species.trait_id = trait.trait_id
            AND size.size_name = "'. $size .'"
            AND trait.trait_name = "'. $trait .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function getBySizeTraitEx($db, $size, $trait){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN size ON species.size_id = size.size_id
            INNER JOIN trait ON species.trait_id = trait.trait_id
            AND size.size_name = "'. $size .'"
            AND trait.trait_name != "'. $trait .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }


  function getGenusBySizePattern($db, $size, $pattern){
    $sql = 'SELECT genus.genus_name FROM genus
            INNER JOIN species ON species.genus_id = genus.genus_id
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN size ON size.size_id = species.size_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            GROUP BY genus.genus_name';
    return $db->query($sql);
  }

  function getBySizePatternGenusEx($db, $size, $pattern, $genus, $exclude_option){
    $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
            FROM species
            INNER JOIN genus ON species.genus_id = genus.genus_id
            INNER JOIN species_pattern ON species_pattern.species_id = species.species_id
            INNER JOIN pattern ON species_pattern.pattern_id = pattern.pattern_id
            INNER JOIN species_colour ON species_colour.species_id = species.species_id
            INNER JOIN colour ON colour.colour_id = species_colour.colour_id
            INNER JOIN size ON size.size_id = species.size_id
            WHERE size.size_name = "'. $size .'"
            AND pattern.pattern_name = "'. $pattern .'"
            AND genus.genus_name = "'. $genus .'"
            AND species.species_name != "'. $exclude_option .'"
            AND species.species_imgurl IS NOT NULL
            GROUP BY species.species_name';
    return $db->query($sql);
  }

  function addSpecies($db, $name, $desc, $size_id, $status_id, $colour_id, $pattern_id, $genus_id, $type_id){
      $data = array(
          'species_name' => $name,
          'species_description' => $desc,
          'size_id' => $size_id,
          'status_id' => $status_id,
          'genus_id' => $genus_id,
          'type_id' => $type_id
      );

      $sql = 'INSERT IGNORE INTO species (species_name, species_description, size_id, status_id, genus_id, type_id)
              VALUES (:species_name, :species_description, :size_id, :status_id, :genus_id, :type_id)';
      $res = $db->prepare($sql);
      try{
        $res->execute($data);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      $id = $db->lastInsertId(); //get species_id

      $data = array(
        'species_id' => $id,
        'colour_id' => $colour_id
      );
      $sql = 'INSERT IGNORE INTO species_colour (species_id, colour_id)
              VALUES (:species_id, :colour_id)';
      $res = $db->prepare($sql);
      $res->execute($data);

      $data = array(
        'species_id' => $id,
        'pattern_id' => $pattern_id
      );
      $sql = 'INSERT IGNORE INTO species_pattern (species_id, pattern_id)
              VALUES (:species_id, :pattern_id)';
      $res = $db->prepare($sql);
      $res->execute($data);
  }

  function deleteSpecies($db, $species_id){
    $sql = 'DELETE FROM species_pattern WHERE species_id = "'. $species_id .'";';
    $sql .= 'DELETE FROM species_colour WHERE species_id = "'. $species_id .'";';
    $sql .= 'DELETE FROM species WHERE species_id = "'. $species_id .'"';
    $db->query($sql);
  }

  function resultHtml($result){
    $html = '<div class="media">
              <div class="media-left media-middle">';
    foreach($result as $row){
      $html .= '<img src="'. $row['species_imgurl'] .'" alt="'. $row['species_name'] .'" class="media-object"/>';
      $html .= '</div><div class="media-body">';
      $html .= '<h4 class="media-heading">'. $row['species_name'] .'</h4>';
      $html .= '<p>'. $row['species_description'] .'</p>';
    }
    $html .= '</div></div>';
    return $html;
  }
?>
