<?php
  include '../includes/header.php';
  if ($db) {
    include '../includes/functions.php';

    //if no answer, ask first question
    if(empty($_POST['size']) && empty($_POST['pattern']) && empty($_POST['trait']) && empty($_POST['country']) && empty($_POST['colour']) && empty($_POST['type']) && empty($_POST['genus'])) {

      echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
      echo '<label for="size"><h1>What\'s the size?</h1></label>
            <div class="custom-controls-stacked">';
      //generate available options
      $result = $db->query("SELECT size_name FROM size");
      //echo them
      foreach($result as $row){
        echo '<input type="radio" name="size" value="' . $row['size_name'] . '" />  ' . $row['size_name'] .'<br />';
      }
      echo '</div></div><input type="submit" class="btn btn-success"/></form>';

    } elseif(!empty($_POST['size']) && empty($_POST['pattern']) && empty($_POST['trait']) && empty($_POST['country']) && empty($_POST['colour']) && empty($_POST['type']) && empty($_POST['genus'])){

      //if only size, store it into variable
      $size = $_POST['size'];
      //if user selected large, ask next question
      if($size == 'large'){
        echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
        echo '<label for="pattern"><h1>What\'s the pattern?</h1></label>
              <div class="custom-controls-stacked">';
        //generate available options
        $result = getPatternBySize($db, $size);
        //echo options
        foreach($result as $row){
          echo '<input type="radio" name="pattern" value="'. $row['pattern_name'] .'" />   ' . $row['pattern_name'] .'<br />';
        }
        //store previous answers in hidden inputs and add submit button
        echo '<input type="hidden" name="size" value="'. $size . '"/>';
        echo '</div></div><input type="submit" class="btn btn-success"/></form>';

      } elseif($size == 'medium'){
        echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
        echo '<label for="trait"><h1>Does it have tufted ears?</h1></label>
              <div class="custom-controls-stacked">';
        //generate available options
        echo '<input type="radio" name="trait" value="tufted ears" /> Yes <br />';
        echo '<input type="radio" name="trait" value="false_ears" /> No <br />';
        //store previous answers in hidden inputs and add submit button
        echo '<input type="hidden" name="size" value="'. $size . '"/>
              <input type="hidden" name="exclude_trait" value="tufted ears"/>
              </div></div><input type="submit" class="btn btn-success"/></form>';

      } elseif($size == 'small'){
        echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
        echo '<label for="type"><h1>Is it domestic or wild?</h1></label>
              <div class="custom-controls-stacked">';
        //get available options
        $result = getTypeBySize($db, $size);

        //echo options
        foreach($result as $row){
          echo '<input type="radio" name="type" value="'. $row['type_name'] .'" />  ' . $row['type_name'] .'<br />';
        }
          echo '<input type="radio" name="type" value="unsure_wild" /> Not sure <br />';

        //store previous answers in hidden inputs and add submit button
        echo '<input type="hidden" name="size" value="'. $size . '"/>
              </div></div><input type="submit" class="btn btn-success"/></form>';
      }

    } elseif((!empty($_POST['size']) && $_POST['size'] == 'large') && !empty($_POST['pattern']) && empty($_POST['trait']) && empty($_POST['country']) && empty($_POST['colour']) && empty($_POST['genus'])){

        //get size and pattern
        $size = $_POST['size'];
        $pattern = $_POST['pattern'];

        if($pattern == 'spots'){
          //ask next question
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="colour"><h1>What\'s the colour?</h1></label>
                <div class="custom-controls-stacked">';

          //get available answers
          $result = getColourBySizePattern($db, $size, $pattern);

          //echo options
          foreach($result as $row){
            echo '<input type="radio" name="colour" value="' . $row['colour_name'] . '" />  ' . $row['colour_name'] .'<br />';
          }
          //store previous answers in hidden inputs and add submit button
          echo '<input type="hidden" name="size" value="'. $size . '"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern . '"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } elseif($pattern == 'plain'){
          //ask next question
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="colour"><h1>Is it black?</h1></label>
                <div class="custom-controls-stacked">';

          //echo options
          echo '<input type="radio" name="colour" value="black" /> Yes <br />';
          echo '<input type="radio" name="colour" value="false_black" /> No <br />';

          //store previous answers in hidden inputs and add submit button
          echo '<input type="hidden" name="size" value="'. $size . '"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern . '"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } elseif($pattern == 'stripes'){
          $result = getBySizePattern($db, $size, $pattern);
          echo resultHtml($result);
        }

    } elseif($_POST['size'] == 'large' && $_POST['pattern'] == 'spots' && !empty($_POST['colour']) && empty($_POST['trait'])){
        $size = $_POST['size'];
        $pattern = $_POST['pattern'];
        $colour = $_POST['colour'];

        if($colour == 'yellow'){
          //ask next question
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="trait"><h1>Does it have full black spots?</h1></label>
                <div class="custom-controls-stacked">';
          //echo options
          echo '<input type="radio" name="trait" value="full black spots" /> Yes <br />';
          echo '<input type="radio" name="trait" value="false_blacksp" /> No <br />';

          //store previous answers in hidden inputs and add submit button
          echo '<input type="hidden" name="size" value="'. $size . '"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern . '"/>';
          echo '<input type="hidden" name="colour" value="'. $colour . '"/>';
          //store value to exclude from species if answer is no
          echo '<input type="hidden" name="exclude_trait_1" value="full black spots"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } elseif($colour == 'grey' || $colour == 'golden'){
          $result = getByColourSizePattern($db, $colour, $size, $pattern);
          echo resultHtml($result);

        }

    } elseif($_POST['size'] == 'large' && $_POST['pattern'] == 'spots' && $_POST['colour'] == 'yellow' && !empty($_POST['trait'])){

        $size = $_POST['size'];
        $pattern = $_POST['pattern'];
        $colour = $_POST['colour'];
        $trait = $_POST['trait'];

        if($trait == 'full black spots' || $trait == 'less muscular' || $trait == 'spots inside rosettes'){
          $result = getBySizePatternColourTrait($db, $size, $pattern, $colour, $trait);
          echo resultHtml($result);

        } elseif($trait == 'false_blacksp'){

          $exclude_trait_1 = $_POST['exclude_trait_1'];
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="trait"><h1>Is it less muscular?</h1></label>
                <div class="custom-controls-stacked">';
          //echo options
          echo '<input type="radio" name="trait" value="less muscular" /> Yes <br />';
          echo '<input type="radio" name="trait" value="false_lessmuscular" /> No <br />';
          echo '<input type="radio" name="trait" value="unsure_muscular" /> Not sure <br />';

          //store previous answers in hidden inputs and add submit button
          echo '<input type="hidden" name="size" value="'. $size . '"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern . '"/>';
          echo '<input type="hidden" name="colour" value="'. $colour . '"/>';
          //store value to exclude it if the answer is no
          echo '<input type="hidden" name="exclude_trait_1" value="'. $exclude_trait_1 .'"/>';
          echo '<input type="hidden" name="exclude_trait_2" value="less muscular"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } elseif($trait == 'false_lessmuscular'){

          $exclude_trait_1 = $_POST['exclude_trait_1'];
          $exclude_trait_2 = $_POST['exclude_trait_2'];

          $result = getBySizePatternColourEx($db, $size, $pattern, $colour, $exclude_trait_1, $exclude_trait_2);
          echo resultHtml($result);

        } elseif($trait == 'unsure_muscular'){

          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="trait"><h1>Do the rosettes have spots inside them?</h1></label>
                <div class="custom-controls-stacked">';
          //echo options
          echo '<input type="radio" name="trait" value="spots inside rosettes" /> Yes <br />';
          echo '<input type="radio" name="trait" value="false_rosettes" /> No <br />';
          echo '<input type="radio" name="trait" value="unsure_rosettes" /> Not sure <br />';

          //store previous answers in hidden inputs and add submit button
          echo '<input type="hidden" name="size" value="'. $size . '"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern . '"/>';
          echo '<input type="hidden" name="colour" value="'. $colour . '"/>';
          //store value to exclude it if the answer is no
          echo '<input type="hidden" name="exclude_trait_1" value="full black spots"/>';
          echo '<input type="hidden" name="exclude_trait_2" value="spots inside rosettes"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } elseif($trait == 'false_rosettes'){
          $exclude_trait_1 = $_POST['exclude_trait_1'];
          $exclude_trait_2 = $_POST['exclude_trait_2'];

          $result = getBySizePatternColourEx($db, $size, $pattern, $colour, $exclude_trait_1, $exclude_trait_2);
          echo resultHtml($result);

        } elseif($trait == 'unsure_rosettes' && empty($_POST['country'])){

          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="country"><h1>What\'s its origin?</h1></label>
                <div class="custom-controls-stacked">';
          $exclude_trait = $_POST['exclude_trait_1'];
          $opt1 = '';
          $opt2 = '';

          //get options
          $result = getCountryBySizePatternColour($db, $size, $pattern, $colour, $exclude_trait);

          foreach($result as $row){
            if($row['species_name'] == 'Jaguar'){
              $opt1 .= $row['country_name'] . " ";
              $result1 = $row['species_name'];
            } else {
              $opt2 .= $row['country_name'] . " ";
              $result2 = $row['species_name'];
            }
          }
          echo '<input type="radio" name="country" value="'. $result1 .'" /> ' . $opt1 .'<br />';
          echo '<input type="radio" name="country" value="'. $result2 .'" /> ' . $opt2 .'<br />';

          //store previous answers in hidden inputs and add submit button
          echo '<input type="hidden" name="size" value="'. $size . '"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern . '"/>';
          echo '<input type="hidden" name="colour" value="'. $colour . '"/>';
          echo '<input type="hidden" name="trait" value="'. $trait . '"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } else if(!empty($_POST['country'])){
          $result = $_POST['country'];
          $sql = 'SELECT species.species_name, species.species_description, species.species_imgurl
                  FROM species WHERE species_name = "'. $result .'"';

          $result = $db->query($sql);
          echo resultHtml($result);
        }

    } elseif($_POST['size'] == 'medium' && !empty($_POST['trait']) && empty($_POST['pattern'])){
        $size = $_POST['size'];
        $trait = $_POST['trait'];

        if($trait == 'tufted ears'){
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="pattern"><h1>Does it have spots?</h1></label>
                <div class="custom-controls-stacked">';
          //echo options
          echo '<input type="radio" name="pattern" value="spots" /> Yes <br />';
          echo '<input type="radio" name="pattern" value="plain" /> No <br />';

          //store previous answers
          echo '<input type="hidden" name="size" value="'. $size .'"/>';
          echo '<input type="hidden" name="trait" value="'. $trait .'"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        } elseif($trait == 'false_ears'){
          $exclude_trait = $_POST['exclude_trait'];
          $result = excludeTrait($db, $size, $exclude_trait);
          echo resultHtml($result);

        }

    } elseif($_POST['size'] == 'medium' && !empty($_POST['trait']) && !empty($_POST['pattern'])){
        $size = $_POST['size'];
        $trait = $_POST['trait'];
        $pattern = $_POST['pattern'];

        $result = getBySizePatternTrait($db, $size, $pattern, $trait);
        echo resultHtml($result);

    } elseif($_POST['size'] == 'small' && !empty($_POST['type']) && empty($_POST['trait'])){
        $size = $_POST['size'];
        $type = $_POST['type'];

        if($type == 'wild' || $type == 'domestic'){
          $result = getBySizeType($db, $size, $type);
          echo resultHtml($result);

        } elseif($type == 'unsure_wild'){
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="trait"><h1>Does it have a long tail?</h1></label>
                <div class="custom-controls-stacked">';
          //echo options
          echo '<input type="radio" name="trait" value="long tail" /> Yes <br />';
          echo '<input type="radio" name="trait" value="false_longtail" /> No <br />';

          //store previous answers
          echo '<input type="hidden" name="size" value="'. $size .'"/>';
          echo '<input type="hidden" name="type" value="'. $type .'"/>';
          echo '<input type="hidden" name="exclude_trait" value="long tail"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';
        }

    } elseif($_POST['size'] == 'small' && !empty($_POST['type']) && !empty($_POST['trait'])){
        $size = $_POST['size'];
        $type = $_POST['type'];
        $trait = $_POST['trait'];
        $exclude_trait = $_POST['exclude_trait'];

        if($trait == 'long tail'){
          $result = getBySizeTrait($db, $size, $trait);
          echo resultHtml($result);

        } else if($trait = 'false_longtail'){
          $result = getBySizeTraitEx($db, $size, $exclude_trait);
          echo resultHtml($result);

        }

    } elseif($_POST['size'] == 'large' && $_POST['pattern'] == 'plain' && !empty($_POST['colour']) && empty($_POST['trait']) && empty($_POST['genus'])){
        $size = $_POST['size'];
        $colour = $_POST['colour'];
        $pattern = $_POST['pattern'];

        if($colour == 'black'){
          $result = getByColourSizePattern($db, $colour, $size, $pattern);
          echo resultHtml($result);

        } elseif($colour == 'false_black'){
          echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
          echo '<label for="trait"><h1>Does the male species have a mane?</h1></label>
                <div class="custom-controls-stacked">';
          //echo options
          echo '<input type="radio" name="trait" value="mane" /> Yes <br />';
          echo '<input type="radio" name="trait" value="false_mane" /> No <br />';
          echo '<input type="radio" name="trait" value="unsure_mane" /> Not sure <br />';

          //store previous answers
          echo '<input type="hidden" name="size" value="'. $size .'"/>';
          echo '<input type="hidden" name="pattern" value="'. $pattern .'"/>';
          echo '<input type="hidden" name="exclude_trait" value="mane"/>';
          echo '<input type="hidden" name="exclude_option" value="jaguar"/>';
          echo '</div></div><input type="submit" class="btn btn-success"/></form>';

        }
      } elseif($_POST['size'] == 'large' && $_POST['pattern'] == 'plain' && empty($_POST['colour']) && !empty($_POST['trait']) && empty($_POST['genus'])){
          $size = $_POST['size'];
          $pattern = $_POST['pattern'];
          $trait = $_POST['trait'];

          if($trait == 'mane'){
            $result = getBySizePatternTrait($db, $size, $pattern, $trait);
            echo resultHtml($result);

          } elseif($trait == 'false_mane'){
            $exclude_trait = $_POST['exclude_trait'];
            $exclude_option = $_POST['exclude_option'];

            $result = getBySizePatternEx($db, $size, $pattern, $exclude_trait, $exclude_option);
            echo resultHtml($result);

          } elseif($trait == 'unsure_mane'){
            echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
            echo '<label for="genus"><h1>What\'s its genus?</h1></label>
                  <div class="custom-controls-stacked">';

            $result = getGenusBySizePattern($db, $size, $pattern);
            foreach($result as $row){
              echo '<input type="radio" name="genus" value="' . $row['genus_name'] . '" /> ' . $row['genus_name'] .'<br />';
            }
            echo '<input type="radio" name="genus" value="unsure_genus" /> Not sure <br />';
            //store previous answers
            echo '<input type="hidden" name="size" value="'. $size .'"/>';
            echo '<input type="hidden" name="pattern" value="'. $pattern .'"/>';
            echo '<input type="hidden" name="exclude_option" value="jaguar"/>';
            echo '</div></div><input type="submit" class="btn btn-success"/></form>';
          }
        } elseif($_POST['size'] == 'large' && $_POST['pattern'] == 'plain' && empty($_POST['colour']) && empty($_POST['trait']) && !empty($_POST['genus'])){

          $size = $_POST['size'];
          $pattern = $_POST['pattern'];
          $genus = $_POST['genus'];
          $exclude_option = $_POST['exclude_option'];

          if($genus == 'panthera' || $genus == 'puma'){
            $result = getBySizePatternGenusEx($db, $size, $pattern, $genus, $exclude_option);
            echo resultHtml($result);

          } elseif($genus == 'unsure_genus'){
            echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
            echo '<label for="colour"><h1>Is it silvery-grey or reddish rather than yellow?</h1></label>
                  <div class="custom-controls-stacked">';

            //echo options
            echo '<input type="radio" name="colour" value="silvery-grey" /> Yes <br />';
            echo '<input type="radio" name="colour" value="yellow" /> No <br />';
            //store previous answers
            echo '<input type="hidden" name="size" value="'. $size .'"/>';
            echo '<input type="hidden" name="pattern" value="'. $pattern .'"/>';
            echo '<input type="hidden" name="genus" value="'. $genus .'"/>';
            echo '<input type="hidden" name="exclude_option" value="jaguar"/>';
            echo '</div></div><input type="submit" class="btn btn-success"/></form>';
          }

        } elseif($_POST['size'] == 'large' && $_POST['pattern'] == 'plain' && !empty($_POST['colour']) && empty($_POST['trait']) && !empty($_POST['genus'])){
          $size = $_POST['size'];
          $pattern = $_POST['pattern'];
          $colour = $_POST['colour'];
          $exclude_option = $_POST['exclude_option'];

          if($colour == 'silvery-grey'){
            $result = getByColourSizePattern($db, $colour, $size, $pattern);
            echo resultHtml($result);

          } elseif($colour == 'yellow') {
            $result = getByColourSizePatternEx($db, $colour, $size, $pattern, $exclude_option);
            echo resultHtml($result);
          }
    }

} elseif (isset($error)) {
    echo '<form action="expert.php" class="exp" method="post"><div class="form-group">';
    echo "<p>$error</p>";
}
?>

<?php
  include '../includes/footer.php';
?>
