<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<div id="container">
<?php
	echo isset($_SESSION['userid']) ? $_SESSION['userid'] : '';

	$this->load->helper('form');
	echo form_open('Input_Controller/ButtonSwitch');	

	$choice = array(
		'einnahmen' => 'Einnahmen',
		'ausgaben' => 'Ausgaben'
	);

	$amount = array(
	'name' => 'amount',
	'id' => 'amount',
	'value' => '200',
	'maxlength' => '100',
	'size' => '50',
	'style' => 'width:50%'
	);

	echo form_dropdown('auswahl', $choice, 'ausgaben');
	echo "Betrag: ".form_input($amount);
	echo "<br><br>";
	echo "Kategorie: ".form_dropdown('kategories',$kategories,'0');
	echo "<br><br>";

	echo form_submit("save","Eintrag Speichern!");
	echo form_submit("show","Daten Anzeigen!");
	echo "<br><br><br><br>";
	echo form_submit("KategorieDetails","Kategorie Bearbeiten!");
	// art des Buttons form_submit (Button ID/Name, Button Value);
	?>
	</div>
</body>
</html>