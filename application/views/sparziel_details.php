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
    <div id="menu">
		<a href="<?php echo base_url(); ?>index.php/Login_Controller/LoginRegisterSwitch">Input</a>
		<a href="<?php echo base_url(); ?>index.php/Sparziel_Controller">Sparziel</a>
		<a href="<?php echo base_url(); ?>index.php/Logout_Controller">Logout</a>
	</div>
	<div id="container">
        <?php
            echo "Sparziel erfolgreich angelegt: <br>";
            echo $sparziel . "<br>";
            echo $betrag . "<br>";
        ?>
        <a href="<?php echo base_url(); ?>index.php/Sparziel_Controller">Zurück</a>
	</div>
</body>
</html>