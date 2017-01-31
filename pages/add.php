<?php
  require_once '../includes/connect.php';
  include '../includes/functions.php';
  include '../includes/header.php';

  $sql = 'SELECT genus_id, genus_name FROM genus';
  $genus = $db->query($sql);

  $sql = 'SELECT status_id, status_name FROM status';
  $status = $db->query($sql);

  $sql = 'SELECT colour_id, colour_name FROM colour';
  $colour = $db->query($sql);

  $sql = 'SELECT pattern_id, pattern_name FROM pattern';
  $pattern = $db->query($sql);

  $sql = 'SELECT size_id, size_name FROM size';
  $size = $db->query($sql);

  $sql = 'SELECT type_id, type_name FROM type';
  $type = $db->query($sql);

  echo '<h1>Add a cat</h1>';

  if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['genus']) && !empty($_POST['status']) && !empty($_POST['colour'])  && !empty($_POST['pattern']) && !empty($_POST['type'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $genus = $_POST['genus'];
    $size = $_POST['size'];
    $status = $_POST['status'];
    $colour = $_POST['colour'];
    $pattern = $_POST['pattern'];
    $type = $_POST['type'];

    addSpecies($db, $name, $description, $size, $status, $colour, $pattern, $genus, $type);
    echo '<h1>The form has been submitted!</h1>';

  } else { ?>
    <p>All fields are required.</p>
    
    <form action="add.php" method="post">
      <div class="form-group">
        <label for="name">*Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Name" required/>

        <label for="description">*Description:</label>
        <textarea name="description" class="form-control" placeholder="description" max="700" required></textarea>

        <label for="genus">*Genus:</label>
        <div class="custom-controls-stacked">
          <?php
            foreach ($genus as $row) {
              echo '<input type="radio" name="genus" value="'. $row['genus_id'] .'"/>  '. $row['genus_name'] . '<br />';
            }
          ?>
        </div>

        <label for="size">*Size:</label>
        <div class="custom-controls-stacked">
          <?php
            foreach ($size as $row) {
              echo '<input type="radio" name="size" value="'. $row['size_id'] .'"/>  '. $row['size_name'] . '<br />';
            }
          ?>
        </div>

        <label for="type">*Type:</label>
        <div class="custom-controls-stacked">
          <?php
            foreach ($type as $row) {
              echo '<input type="radio" name="type" value="'. $row['type_id'] .'"/>  '. $row['type_name'] . '<br />';
            }
          ?>
        </div>

        <label for="colour">*Colour:</label>
        <div class="custom-controls-stacked">
          <?php
            foreach ($colour as $row) {
              echo '<input type="radio" name="colour" value="'. $row['colour_id'] .'"/>  '. $row['colour_name'] . '<br />';
            }
          ?>
        </div>

        <label for="pattern">*Pattern:</label>
        <div class="custom-controls-stacked">
          <?php
            foreach ($pattern as $row) {
              echo '<input type="radio" name="pattern" value="'. $row['pattern_id'] .'"/>  '. $row['pattern_name'] . '<br />';
            }
          ?>
        </div>

        <label for="status">*Status:</label>
        <div class="custom-controls-stacked">
          <?php
            foreach ($status as $row) {
              echo '<input type="radio" name="status" value="'. $row['status_id'] .'"/>  '. $row['status_name'] . '<br />';
            }
          ?>
        </div>

      </div>

      <input type="submit" class="btn btn-default"/>
    </form>

<?php }
include '../includes/footer.php'; ?>
