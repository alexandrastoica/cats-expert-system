<?php
    function insert_initial_data($db){

      $sql = "INSERT IGNORE INTO size (size_name) VALUES ('large'), ('medium'), ('small');
      INSERT IGNORE INTO type (type_name) VALUES ('wild'), ('domestic');
      INSERT IGNORE INTO habitat (habitat_name) VALUES ('savannahs'), ('swamps'), ('forest'), ('rainforest'), ('beech forest'), ('semi-deserts'), ('rocky areas');
      INSERT IGNORE INTO country (country_name) VALUES ('Europe'), ('Asia'), ('North America'), ('South America'), ('India'), ('Mexico'), ('Paraguay'), ('Argentina'), ('Central Asia'), ('Africa');
      INSERT IGNORE INTO subfamily (subfamily_name) VALUES ('Pantherinae'), ('Felinae');
      INSERT IGNORE INTO pattern (pattern_name) VALUES ('stripes'), ('spots'), ('plain');
      INSERT IGNORE INTO status (status_name) VALUES ('endangered'), ('vulnerable'), ('least concern');
      INSERT IGNORE INTO trait (trait_name) VALUES ('mane'), ('long-legged'), ('long tail'), ('tall'), ('pet'), ('tufted ears'), ('less muscular'), ('spots inside rosettes'), ('full black spots');
      INSERT IGNORE INTO colour (colour_name) VALUES ('yellow'), ('black'), ('golden'), ('reddish'), ('grey'), ('ginger'), ('sandy'), ('white'), ('silvery-grey'), ('orange');
      INSERT IGNORE INTO genus (genus_name) VALUES ('panthera'), ('caracal'), ('lynx'), ('puma'), ('acinonyx'), ('felis');
      INSERT IGNORE INTO species (species_name, species_description, species_imgurl)
        VALUES ('Tiger', 'The tiger (Panthera tigris) is the largest cat species, most recognisable for their pattern of dark vertical stripes on reddish-orange fur with a lighter underside. The species is classified in the genus Panthera with the lion, leopard, jaguar and snow leopard. Tigers are apex predators, primarily preying on ungulates such as deer and bovids. They are territorial and generally solitary but social animals, often requiring large contiguous areas of habitat that support their prey requirements. This, coupled with the fact that they are indigenous to some of the more densely populated places on Earth, has caused significant conflicts with humans.', 'https://upload.wikimedia.org/wikipedia/commons/4/49/Panthera_tigris_tigris.jpg'),
        ('Lion', 'The lion (Panthera leo) is one of the big cats in the genus Panthera and a member of the family Felidae. The commonly used term African lion collectively denotes the several subspecies in Africa. With some males exceeding 250 kg (550 lb) in weight, it is the second-largest living cat after the tiger. Wild lions currently exist in sub-Saharan Africa and in India (where an endangered remnant population resides in Gir Forest National Park). In ancient historic times, their range was in most of Africa, including North Africa, and across Eurasia from Greece and southeastern Europe to India. In the late Pleistocene, about 10,000 years ago, the lion was the most widespread large land mammal after humans: Panthera leo spelaea lived in northern and western Europe and Panthera leo atrox lived in the Americas from the Yukon to Peru. The lion is classified as a vulnerable species by the International Union for Conservation of Nature (IUCN), having seen a major population decline in its African range of 30–50% over two decades during the second half of the twentieth century. Lion populations are untenable outside designated reserves and national parks. Although the cause of the decline is not fully understood, habitat loss and conflicts with humans are the greatest causes of concern. Within Africa, the West African lion population is particularly endangered.', 'https://upload.wikimedia.org/wikipedia/commons/7/73/Lion_waiting_in_Namibia.jpg'),
        ('Jaguar', 'The jaguar (Panthera onca) is a big cat, a feline in the Panthera genus, and is the only extant Panthera species native to the Americas. The jaguar is the third-largest feline after the tiger and the lion, and the largest in the Americas. The jaguar\'s present range extends from Southwestern United States and Mexico across much of Central America and south to Paraguay and northern Argentina. Apart from a known and possibly breeding population in Arizona (southeast of Tucson) and the bootheel of New Mexico, the cat has largely been extirpated from the United States since the early 20th century.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Junior-Jaguar-Belize-Zoo.jpg/1024px-Junior-Jaguar-Belize-Zoo.jpg'),
        ('Leopard', 'The leopard (Panthera pardus) is one of the five big cats in the genus Panthera. It is a member of the family Felidae with a wide range in sub-Saharan Africa and parts of Asia. Fossil records found in Italy suggest that in the Pleistocene it ranged as far as Europe and Japan. Compared to other members of Felidae, the leopard has relatively short legs and a long body with a large skull. It is similar in appearance to the jaguar, but has a smaller, lighter physique. Its fur is marked with rosettes similar to those of the jaguar, but the leopard\'s rosettes are smaller and more densely packed, and do not usually have central spots as the jaguar\'s do. Both leopards and jaguars that are melanistic are known as black panthers.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/African_Leopard_5.JPG/440px-African_Leopard_5.JPG'),
        ('Caracal', 'The caracal (Caracal caracal) is a medium-sized wild cat that lives in Africa, the Middle East, Persia and the Indian subcontinent. It reaches 40–50 cm (16–20 in) at the shoulder, and weighs 8–18 kg (18–40 lb). The coat is uniformly reddish tan or sandy, while the ventral parts are lighter with small reddish markings. The caracal is characterised by a robust build, long legs, a short face, long tufted ears, and long canine teeth. It was first described by German naturalist Johann Christian Daniel von Schreber in 1777. Eight subspecies are recognised.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Caracl_%2801%29%2C_Paris%2C_décembre_2013.jpg/440px-Caracl_%2801%29%2C_Paris%2C_décembre_2013.jpg'),
        ('Cougar', 'The cougar (Puma concolor), also commonly known as the mountain lion, puma, panther, or catamount, is a large felid of the subfamily Felinae native to the Americas. Its range, from the Canadian Yukon to the southern Andes of South America, is the greatest of any large wild terrestrial mammal in the Western Hemisphere. An adaptable, generalist species, the cougar is found in most American habitat types. It is the second-heaviest cat in the New World, after the jaguar. Secretive and largely solitary by nature, the cougar is properly considered both nocturnal and crepuscular, although there are daytime sightings. The cougar is more closely related to smaller felines, including the domestic cat (subfamily Felinae), than to any species of subfamily Pantherinae, of which only the jaguar is native to the Americas.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Cougar_25.jpg/440px-Cougar_25.jpg'),
        ('Lynx', 'The Eurasian lynx (Lynx lynx) is a medium-sized cat native to Siberia, Central, East, and Southern Asia, North, Central and Eastern Europe. It has been listed as Least Concern on the IUCN Red List since 2008 as it is widely distributed, and most populations are considered stable. Eurasian lynx have been re-introduced to several forested mountainous areas in Central and Southeastern Europe; these re-introduced subpopulations are small, less than 200 animals.', 'https://upload.wikimedia.org/wikipedia/commons/6/63/Lynx_lynx2.jpg'),
        ('Cheetah', 'The cheetah (Acinonyx jubatus) is a large felid of the subfamily Felinae that occurs mainly in eastern and southern Africa and a few parts of Iran. The only extant member of the genus Acinonyx, the cheetah was first described by Johann Christian Daniel von Schreber in 1775. The cheetah is characterised by a slender body, deep chest, spotted coat, a small rounded head, black tear-like streaks on the face, long thin legs and a long spotted tail. Its lightly built, slender form is in sharp contrast with the robust build of the big cats, making it more similar to the cougar. The cheetah reaches nearly 70 to 90 cm (28 to 35 in) at the shoulder, and weighs 21–72 kg (46–159 lb). Though taller than the leopard, it is notably smaller than the lion. Basically yellowish tan or rufous to greyish white, the coat is uniformly covered with nearly 2,000 solid black spots.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Cheetah_%28Acinonyx_jubatus%29_female_2.jpg/1920px-Cheetah_%28Acinonyx_jubatus%29_female_2.jpg'),
        ('Domestic Cat', 'The domestic cat (Latin: Felis catus) is a small, typically furry, carnivorous mammal. They are often called house cats when kept as indoor pets or simply cats when there is no need to distinguish them from other felids and felines. Cats are often valued by humans for companionship and for their ability to hunt vermin. There are more than 70 cat breeds; different associations proclaim different numbers according to their standards.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Cat_poster_1.jpg/1920px-Cat_poster_1.jpg'),
        ('Jungle Cat', 'The jungle cat (Felis chaus), also called reed cat or swamp cat is a medium-sized cat found in China, the Indian subcontinent, the Middle East and central and southeastern Asia. A member of the genus Felis, that consists of small cats, the jungle cat was first described by naturalist Johann Anton Güldenstädt in 1776; however, naturalist Johann Christian Daniel von Schreber, who gave the cat its present binomial name, is generally considered to be the binomial authority. 10 subspecies are recognised. The jungle cat is a large, long-legged cat; it stands nearly 36 cm (14 in) at shoulder and weighs 2–16 kg (4.4–35.3 lb). The coat, sandy, reddish brown or grey, is uniformly coloured and lacks spots; melanistic and albino individuals are also known. Moults occur biannually.', 'http://www.animalspot.net/wp-content/uploads/2012/09/Jungle-Cat-Images.jpg'),
        ('Wild Cat', 'The wildcat (Felis silvestris) is a small cat native to most of Africa, Europe, and Southwest and Central Asia into India, western China, and Mongolia. Because of its wide range it is assessed as Least Concern on the IUCN Red List since 2002. However, crossbreeding of wildcat and domestic cat (Felis silvestris catus) occurs in particular in Europe and is considered a potential threat for the preservation of the wild species.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Felis_silvestris_silvestris_Luc_Viatour.jpg/440px-Felis_silvestris_silvestris_Luc_Viatour.jpg');";

      $db->exec($sql);// or die(print_r($db->errorInfo(), true));

    }

    function insert_colour_data($db){
      //store speciesid
      $tiger = getSpeciesIdByName($db, 'Tiger');
      $lion = getSpeciesIdByName($db, 'Lion');
      $jaguar = getSpeciesIdByName($db, 'Jaguar');
      $leopard = getSpeciesIdByName($db, 'Leopard');
      $caracal = getSpeciesIdByName($db, 'Caracal');
      $cougar = getSpeciesIdByName($db, 'Cougar');
      $lynx = getSpeciesIdByName($db, 'Lynx');
      $cheetah = getSpeciesIdByName($db, 'Cheetah');
      $domestic = getSpeciesIdByName($db, 'Domestic cat');
      $wildcat = getSpeciesIdByName($db, 'Wild cat');
      $junglecat = getSpeciesIdByName($db, 'Jungle cat');

      //store colours id
      $orange = getColourIdByName($db, 'orange');
      $yellow = getColourIdByName($db, 'yellow');
      $black = getColourIdByName($db, 'black');
      $sandy = getColourIdByName($db, 'sandy');
      $silvery = getColourIdByName($db, 'silvery-grey');
      $golden = getColourIdByName($db, 'golden');
      $ginger = getColourIdByName($db, 'ginger');
      $grey = getColourIdByName($db, 'grey');
      $white = getColourIdByName($db, 'white');
      $reddish = getColourIdByName($db, 'reddish');

      $data = array(
        array(
          'species_id' => $tiger,
          'colour_id' => $orange
        ),
        array(
          'species_id' => $lion,
          'colour_id' => $yellow
        ),
        array(
          'species_id' => $jaguar,
          'colour_id' => $yellow
        ),
        array(
          'species_id' => $leopard,
          'colour_id' => $yellow
        ),
        array(
          'species_id' => $caracal,
          'colour_id' => $yellow
        ),
        array(
          'species_id' => $cheetah,
          'colour_id' => $yellow
        ),
        array(
          'species_id' => $domestic,
          'colour_id' => $yellow
        ),
        array(
          'species_id' => $cougar,
          'colour_id' => $reddish
        ),
        array(
          'species_id' => $lynx,
          'colour_id' => $reddish
        ),
        array(
          'species_id' => $junglecat,
          'colour_id' => $reddish
        ),
        array(
          'species_id' => $junglecat,
          'colour_id' => $sandy
        ),
        array(
          'species_id' => $junglecat,
          'colour_id' => $grey
        ),
        array(
          'species_id' => $wildcat,
          'colour_id' => $grey
        ),
        array(
          'species_id' => $cheetah,
          'colour_id' => $grey
        ),
        array(
          'species_id' => $domestic,
          'colour_id' => $grey
        ),
        array(
          'species_id' => $leopard,
          'colour_id' => $golden
        ),
        array(
          'species_id' => $caracal,
          'colour_id' => $golden
        ),
        array(
          'species_id' => $domestic,
          'colour_id' => $black
        ),
        array(
          'species_id' => $jaguar,
          'colour_id' => $black
        ),
        array(
          'species_id' => $domestic,
          'colour_id' => $ginger
        ),
        array(
          'species_id' => $cougar,
          'colour_id' => $silvery
        )
      );

      $res = $db->prepare("INSERT IGNORE INTO species_colour (species_id, colour_id) VALUES (:species_id, :colour_id)");
      foreach ($data as $obj) {
          try {
            $res->execute($obj);
          } catch (PDOException $e) {
            $e->getMessage();
          }
      }
    }

    function insert_pattern_data($db){
      //store speciesid
      $tiger = getSpeciesIdByName($db, 'Tiger');
      $lion = getSpeciesIdByName($db, 'Lion');
      $jaguar = getSpeciesIdByName($db, 'Jaguar');
      $leopard = getSpeciesIdByName($db, 'Leopard');
      $caracal = getSpeciesIdByName($db, 'Caracal');
      $cougar = getSpeciesIdByName($db, 'Cougar');
      $lynx = getSpeciesIdByName($db, 'Lynx');
      $cheetah = getSpeciesIdByName($db, 'Cheetah');
      $domestic = getSpeciesIdByName($db, 'Domestic cat');
      $wildcat = getSpeciesIdByName($db, 'Wild cat');
      $junglecat = getSpeciesIdByName($db, 'Jungle cat');

      //store patterns id
      $plain = getPatternIdByName($db, 'plain');
      $spots = getPatternIdByName($db, 'spots');
      $stripes = getPatternIdByName($db, 'stripes');

      //data
      $data = array(
        array(
          'species_id' => $tiger,
          'pattern_id' => $stripes
        ),
        array(
          'species_id' => $lion,
          'pattern_id' => $plain
        ),
        array(
          'species_id' => $jaguar,
          'pattern_id' => $plain
        ),
        array(
          'species_id' => $cougar,
          'pattern_id' => $plain
        ),
        array(
          'species_id' => $caracal,
          'pattern_id' => $plain
        ),
        array(
          'species_id' => $domestic,
          'pattern_id' => $plain
        ),
        array(
          'species_id' => $junglecat,
          'pattern_id' => $plain
        ),
        array(
          'species_id' => $jaguar,
          'pattern_id' => $spots
        ),
        array(
          'species_id' => $leopard,
          'pattern_id' => $spots
        ),
        array(
          'species_id' => $lynx,
          'pattern_id' => $spots
        ),
        array(
          'species_id' => $cheetah,
          'pattern_id' => $spots
        ),
        array(
          'species_id' => $wildcat,
          'pattern_id' => $spots
        ),
        array(
          'species_id' => $domestic,
          'pattern_id' => $spots
        )
      );

      $res = $db->prepare("INSERT IGNORE INTO species_pattern (species_id, pattern_id) VALUES (:species_id, :pattern_id)");
      foreach ($data as $obj) {
          try {
            $res->execute($obj);
          } catch (PDOException $e) {
            $e->getMessage();
          }
      }
    }

    function insert_country_data($db){
      //store speciesid
      $tiger = getSpeciesIdByName($db, 'Tiger');
      $lion = getSpeciesIdByName($db, 'Lion');
      $jaguar = getSpeciesIdByName($db, 'Jaguar');
      $leopard = getSpeciesIdByName($db, 'Leopard');
      $caracal = getSpeciesIdByName($db, 'Caracal');
      $cougar = getSpeciesIdByName($db, 'Cougar');
      $lynx = getSpeciesIdByName($db, 'Lynx');
      $cheetah = getSpeciesIdByName($db, 'Cheetah');
      $domestic = getSpeciesIdByName($db, 'Domestic cat');
      $wildcat = getSpeciesIdByName($db, 'Wild cat');
      $junglecat = getSpeciesIdByName($db, 'Jungle cat');

      //store country id
      $asia = getCountryIdByName($db, 'Asia');
      $africa = getCountryIdByName($db, 'Africa');
      $europe = getCountryIdByName($db, 'Europe');
      $na = getCountryIdByName($db, 'North America');
      $sa = getCountryIdByName($db, 'South America');
      $mexico = getCountryIdByName($db, 'Mexico');
      $paraguay = getCountryIdByName($db, 'Paraguay');

      $data = array(
        array(
          'species_id' => $jaguar,
          'country_id' => $paraguay
        ),
        array(
          'species_id' => $jaguar,
          'country_id' => $mexico
        ),
        array(
          'species_id' => $jaguar,
          'country_id' => $na
        ),
        array(
          'species_id' => $leopard,
          'country_id' => $asia
        ),
        array(
          'species_id' => $leopard,
          'country_id' => $africa
        ),
        array(
          'species_id' => $lion,
          'country_id' => $africa
        ),
        array(
          'species_id' => $caracal,
          'country_id' => $africa
        ),
        array(
          'species_id' => $cougar,
          'country_id' => $na
        ),
        array(
          'species_id' => $cougar,
          'country_id' => $sa
        ),
        array(
          'species_id' => $cougar,
          'country_id' => $europe
        )
      );

      $res = $db->prepare("INSERT IGNORE INTO species_country (species_id, country_id) VALUES (:species_id, :country_id)");
      foreach ($data as $obj) {
          try {
            $res->execute($obj);
          } catch (PDOException $e) {
            echo $e->getMessage();
          }
      }
    }

    function insert_subfamily_genus($db){
      $pantherinae = getSubfamIdByName($db, 'Pantherinae');
      $felinae = getSubfamIdByName($db, 'Felinae');

      $panthera = getGenusIdByName($db, 'Panthera');
      $caracal = getGenusIdByName($db, 'Caracal');
      $lynx = getGenusIdByName($db, 'Lynx');
      $puma = getGenusIdByName($db, 'Puma');
      $acinonyx = getGenusIdByName($db, 'Acinonyx');
      $felis = getGenusIdByName($db, 'felis');

      $data = array(
        array(
          'subfamily_id' => $pantherinae,
          'genus_id' => $panthera
        ),
        array(
          'subfamily_id' => $felinae,
          'genus_id' => $caracal
        ),
        array(
          'subfamily_id' => $felinae,
          'genus_id' => $lynx
        ),
        array(
          'subfamily_id' => $felinae,
          'genus_id' => $puma
        ),
        array(
          'subfamily_id' => $felinae,
          'genus_id' => $acinonyx
        ),
        array(
          'subfamily_id' => $felinae,
          'genus_id' => $felis
        )
      );

      $res = $db->prepare("UPDATE genus SET subfamily_id = :subfamily_id WHERE genus_id = :genus_id");
      foreach ($data as $obj) {
          try {
            $res->execute($obj);
          } catch (PDOException $e) {
            echo $e->getMessage();
          }
      }
    }

    function insert_traits($db){
      $mane = getTraitIdByName($db, 'mane');
      $fullsp = getTraitIdByName($db, 'full black spots');
      $longtail = getTraitIdByName($db, 'long tail');
      $longleg = getTraitIdByName($db, 'long-legged');
      $pet = getTraitIdByName($db, 'pet');
      $lessmusc = getTraitIdByName($db, 'less muscular');
      $tuftedears = getTraitIdByName($db, 'tufted ears');
      $tall = getTraitIdByName($db, 'tall');
      $rosettes = getTraitIdByName($db, 'spots inside rosettes');

      $res = $db->query('UPDATE species SET trait_id = "'. $mane .'" WHERE species_name = "lion"');
      $res = $db->query('UPDATE species SET trait_id = "'. $rosettes .'" WHERE species_name = "jaguar"');
      $res = $db->query('UPDATE species SET trait_id = "'. $lessmusc .'" WHERE species_name = "leopard"');
      $res = $db->query('UPDATE species SET trait_id = "'. $tuftedears .'" WHERE species_name = "caracal"');
      $res = $db->query('UPDATE species SET trait_id = "'. $tuftedears .'" WHERE species_name = "lynx"');
      $res = $db->query('UPDATE species SET trait_id = "'. $tall .'" WHERE species_name = "cougar"');
      $res = $db->query('UPDATE species SET trait_id = "'. $fullsp .'" WHERE species_name = "cheetah"');
      $res = $db->query('UPDATE species SET trait_id = "'. $pet .'" WHERE species_name = "domestic cat"');
      $res = $db->query('UPDATE species SET trait_id = "'. $longtail .'" WHERE species_name = "wild cat"');
      $res = $db->query('UPDATE species SET trait_id = "'. $longleg .'" WHERE species_name = "jungle cat"');

    }

    function insert_type($db){
      $domestic = getTypeIdByName($db, 'domestic');
      $wild = getTypeIdByName($db, 'wild');

      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "tiger"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "lion"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "jaguar"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "leopard"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "caracal"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "lynx"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "cougar"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "cheetah"');
      $res = $db->query('UPDATE species SET type_id = "'. $domestic .'" WHERE species_name = "domestic cat"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "wild cat"');
      $res = $db->query('UPDATE species SET type_id = "'. $wild .'" WHERE species_name = "jungle cat"');

    }

    function insert_size($db){
      $large = getSizeIdByName($db, 'large');
      $medium = getSizeIdByName($db, 'medium');
      $small = getSizeIdByName($db, 'small');

      $res = $db->query('UPDATE species SET size_id = "'. $large .'" WHERE species_name = "tiger"');
      $res = $db->query('UPDATE species SET size_id = "'. $large .'" WHERE species_name = "lion"');
      $res = $db->query('UPDATE species SET size_id = "'. $large .'" WHERE species_name = "jaguar"');
      $res = $db->query('UPDATE species SET size_id = "'. $large .'" WHERE species_name = "leopard"');
      $res = $db->query('UPDATE species SET size_id = "'. $medium .'" WHERE species_name = "caracal"');
      $res = $db->query('UPDATE species SET size_id = "'. $medium .'" WHERE species_name = "lynx"');
      $res = $db->query('UPDATE species SET size_id = "'. $large .'" WHERE species_name = "cougar"');
      $res = $db->query('UPDATE species SET size_id = "'. $large .'" WHERE species_name = "cheetah"');
      $res = $db->query('UPDATE species SET size_id = "'. $small .'" WHERE species_name = "domestic cat"');
      $res = $db->query('UPDATE species SET size_id = "'. $small .'" WHERE species_name = "wild cat"');
      $res = $db->query('UPDATE species SET size_id = "'. $medium .'" WHERE species_name = "jungle cat"');

    }

    function insert_status($db){
      $lc = getStatusIdByName($db, 'least concern');
      $e = getStatusIdByName($db, 'endangered');
      $v = getStatusIdByName($db, 'vulnerable');

      $res = $db->query('UPDATE species SET status_id = "'. $e .'" WHERE species_name = "tiger"');
      $res = $db->query('UPDATE species SET status_id = "'. $v .'" WHERE species_name = "lion"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "jaguar"');
      $res = $db->query('UPDATE species SET status_id = "'. $v .'" WHERE species_name = "leopard"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "caracal"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "lynx"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "cougar"');
      $res = $db->query('UPDATE species SET status_id = "'. $v .'" WHERE species_name = "cheetah"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "domestic cat"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "wild cat"');
      $res = $db->query('UPDATE species SET status_id = "'. $lc .'" WHERE species_name = "jungle cat"');

    }

    function insert_genus($db){
      $panthera = getGenusIdByName($db, 'Panthera');
      $caracal = getGenusIdByName($db, 'Caracal');
      $lynx = getGenusIdByName($db, 'Lynx');
      $puma = getGenusIdByName($db, 'Puma');
      $acinonyx = getGenusIdByName($db, 'Acinonyx');
      $felis = getGenusIdByName($db, 'felis');

      $res = $db->query('UPDATE species SET genus_id = "'. $panthera .'" WHERE species_name = "tiger"');
      $res = $db->query('UPDATE species SET genus_id = "'. $panthera .'" WHERE species_name = "lion"');
      $res = $db->query('UPDATE species SET genus_id = "'. $panthera .'" WHERE species_name = "jaguar"');
      $res = $db->query('UPDATE species SET genus_id = "'. $panthera .'" WHERE species_name = "leopard"');
      $res = $db->query('UPDATE species SET genus_id = "'. $caracal .'" WHERE species_name = "caracal"');
      $res = $db->query('UPDATE species SET genus_id = "'. $lynx .'" WHERE species_name = "lynx"');
      $res = $db->query('UPDATE species SET genus_id = "'. $puma .'" WHERE species_name = "cougar"');
      $res = $db->query('UPDATE species SET genus_id = "'. $acinonyx .'" WHERE species_name = "cheetah"');
      $res = $db->query('UPDATE species SET genus_id = "'. $felis .'" WHERE species_name = "domestic cat"');
      $res = $db->query('UPDATE species SET genus_id = "'. $felis .'" WHERE species_name = "wild cat"');
      $res = $db->query('UPDATE species SET genus_id = "'. $felis .'" WHERE species_name = "jungle cat"');

    }

    function getPatternIdByName($db, $pattern_name){
      $res = $db->query('SELECT pattern_id FROM pattern WHERE pattern_name ="'.$pattern_name.'"');
      foreach($res as $row){
        $id = $row['pattern_id'];
      }
      return $id;
    }

    function getColourIdByName($db, $colour_name){
      $res = $db->query('SELECT colour_id FROM colour WHERE colour_name ="'.$colour_name.'"');
      foreach($res as $row){
        $id = $row['colour_id'];
      }
      return $id;
    }

    function getHabitatIdByName($db, $habitat_name){
      $res = $db->query('SELECT habitat_id FROM habitat WHERE habitat_name ="'.$habitat_name.'"');
      foreach($res as $row){
        $id = $row['habitat_id'];
      }
      return $id;
    }

    function getCountryIdByName($db, $country_name){
      $res = $db->query('SELECT country_id FROM country WHERE country_name ="'.$country_name.'"');
      foreach($res as $row){
        $id = $row['country_id'];
      }
      return $id;
    }

    function getGenusIdByName($db, $genus_name){
      $res = $db->query('SELECT genus_id FROM genus WHERE genus_name ="'.$genus_name.'"');
      foreach($res as $row){
        $id = $row['genus_id'];
      }
      return $id;
    }

    function getSubfamIdByName($db, $subfamily_name){
      $res = $db->query('SELECT subfamily_id FROM subfamily WHERE subfamily_name ="'.$subfamily_name.'"');
      foreach($res as $row){
        $id = $row['subfamily_id'];
      }
      return $id;
    }

    function getSpeciesIdByName($db, $species_name){
      $res = $db->query('SELECT species_id FROM species WHERE species_name ="'.$species_name.'"');
      foreach($res as $row){
        $id = $row['species_id'];
      }
      return $id;
    }

    function getTraitIdByName($db, $trait_name){
      $res = $db->query('SELECT trait_id FROM trait WHERE trait_name ="'.$trait_name.'"');
      foreach($res as $row){
        $id = $row['trait_id'];
      }
      return $id;
    }

    function getTypeIdByName($db, $type_name){
      $res = $db->query('SELECT type_id FROM type WHERE type_name ="'.$type_name.'"');
      foreach($res as $row){
        $id = $row['type_id'];
      }
      return $id;
    }

    function getSizeIdByName($db, $size_name){
      $res = $db->query('SELECT size_id FROM size WHERE size_name ="'.$size_name.'"');
      foreach($res as $row){
        $id = $row['size_id'];
      }
      return $id;
    }

    function getStatusIdByName($db, $status_name){
      $res = $db->query('SELECT status_id FROM status WHERE status_name ="'.$status_name.'"');
      foreach($res as $row){
        $id = $row['status_id'];
      }
      return $id;
    }

?>
