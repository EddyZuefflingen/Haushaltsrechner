<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Sparziel angelegt</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sparziel_view.css">
</head>
<body>
	<div id="container">
        <?php
            echo "Sparziel erfolgreich angelegt: <br>";
            echo $sparziel . "<br>";
            echo $betrag . "<br>";
        ?>
        <a href="<?php echo base_url(); ?>/index.php/Sparziel_Controller">Zurück</a>
	</div>
</body>
</html>