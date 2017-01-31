<?php

    function create_tables($db){
      // sql to CREATE TABLE IF NOT EXISTSs
      // use exec() because no results are returned

      $sql = "CREATE TABLE IF NOT EXISTS status(
        status_id INT(2) UNSIGNED AUTO_INCREMENT,
        status_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (status_id),
        UNIQUE KEY (status_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS size(
        size_id INT(2) UNSIGNED AUTO_INCREMENT,
        size_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (size_id),
        UNIQUE KEY (size_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS type(
        type_id INT(2) UNSIGNED AUTO_INCREMENT,
        type_name VARCHAR(30) NOT NULL,
        CONSTRAINT PRIMARY KEY (type_id),
        UNIQUE KEY (type_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS trait(
        trait_id INT(2) UNSIGNED AUTO_INCREMENT,
        trait_name VARCHAR(30) NOT NULL,
        CONSTRAINT PRIMARY KEY (trait_id),
        UNIQUE KEY (trait_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS habitat(
        habitat_id INT(2) UNSIGNED AUTO_INCREMENT,
        habitat_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (habitat_id),
        UNIQUE KEY (habitat_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS pattern(
        pattern_id INT(2) UNSIGNED AUTO_INCREMENT,
        pattern_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (pattern_id),
        UNIQUE KEY (pattern_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS colour(
        colour_id INT(2) UNSIGNED AUTO_INCREMENT,
        colour_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (colour_id),
        UNIQUE KEY (colour_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS country(
        country_id INT(2) UNSIGNED AUTO_INCREMENT,
        country_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (country_id),
        UNIQUE KEY (country_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS subfamily(
        subfamily_id INT(2) UNSIGNED AUTO_INCREMENT,
        subfamily_name VARCHAR(25) NOT NULL,
        CONSTRAINT PRIMARY KEY (subfamily_id),
        UNIQUE KEY (subfamily_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS genus(
        genus_id INT(2) UNSIGNED AUTO_INCREMENT,
        genus_name VARCHAR(25) NOT NULL,
        subfamily_id INT(2) UNSIGNED,
        CONSTRAINT PRIMARY KEY (genus_id),
        CONSTRAINT FOREIGN KEY (subfamily_id) REFERENCES subfamily(subfamily_id),
        UNIQUE KEY (genus_name)
      ) ENGINE=INNODB;

      CREATE TABLE IF NOT EXISTS species(
          species_id INT(2) UNSIGNED AUTO_INCREMENT,
          species_name VARCHAR(25),
          species_description VARCHAR(700) NOT NULL,
          species_imgurl VARCHAR(255) NOT NULL,
          status_id INT(2) UNSIGNED,
          type_id INT(2) UNSIGNED,
          trait_id INT(2) UNSIGNED,
          size_id INT(2) UNSIGNED,
          genus_id INT(2) UNSIGNED,
          CONSTRAINT PRIMARY KEY (species_id),
          CONSTRAINT FOREIGN KEY (status_id) REFERENCES status(status_id),
          CONSTRAINT FOREIGN KEY (type_id) REFERENCES type(type_id),
          CONSTRAINT FOREIGN KEY (trait_id) REFERENCES trait(trait_id),
          CONSTRAINT FOREIGN KEY (size_id) REFERENCES size(size_id),
          CONSTRAINT FOREIGN KEY (genus_id) REFERENCES genus(genus_id),
          UNIQUE KEY (species_name),
          UNIQUE KEY (species_description),
          UNIQUE KEY (species_imgurl)
        ) ENGINE=INNODB;

        CREATE TABLE IF NOT EXISTS species_pattern(
          speciespattern_id INT(2) UNSIGNED AUTO_INCREMENT,
          species_id INT(2) UNSIGNED,
          pattern_id INT(2) UNSIGNED,
          CONSTRAINT PRIMARY KEY (speciespattern_id),
          CONSTRAINT FOREIGN KEY (species_id) REFERENCES species(species_id),
          CONSTRAINT FOREIGN KEY (pattern_id) REFERENCES pattern(pattern_id)
        ) ENGINE=INNODB;

        CREATE TABLE IF NOT EXISTS species_colour(
          speciescolour_id INT(2) UNSIGNED AUTO_INCREMENT,
          species_id INT(2) UNSIGNED,
          colour_id INT(2) UNSIGNED,
          CONSTRAINT PRIMARY KEY (speciescolour_id),
          CONSTRAINT FOREIGN KEY (species_id) REFERENCES species(species_id),
          CONSTRAINT FOREIGN KEY (colour_id) REFERENCES colour(colour_id)
        ) ENGINE=INNODB;

        CREATE TABLE IF NOT EXISTS species_country(
          speciescountry_id INT(2) UNSIGNED AUTO_INCREMENT,
          species_id INT(2) UNSIGNED,
          country_id INT(2) UNSIGNED,
          CONSTRAINT PRIMARY KEY (speciescountry_id),
          CONSTRAINT FOREIGN KEY (species_id) REFERENCES species(species_id),
          CONSTRAINT FOREIGN KEY (country_id) REFERENCES country(country_id)
        ) ENGINE=INNODB;

        CREATE TABLE IF NOT EXISTS species_habitat(
          specieshabitat_id INT(2) UNSIGNED AUTO_INCREMENT,
          species_id INT(2) UNSIGNED,
          habitat_id INT(2) UNSIGNED,
          CONSTRAINT PRIMARY KEY (specieshabitat_id),
          CONSTRAINT FOREIGN KEY (species_id) REFERENCES species(species_id),
          CONSTRAINT FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id)
        ) ENGINE=INNODB";

        $db->exec($sql); //or die(print_r($db->errorInfo(), true));
    }

?>
