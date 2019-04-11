<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<?php
	$this->load->helper('form');
    echo form_open('Kategorie_Controller/ButtonSwitch');	

    $KategorieName = array(
        'name' => 'KategorieName',
        'id' => 'KategorieName',
        'maxlength' => '100',
    );
    
	/*echo form_dropdown('auswahl', $choice, 'ausgaben');
	echo "Betrag: ".form_input($amount);
	echo "<br><br>";
	echo "Kategorie: ".form_dropdown('Kategorien',$kategories,'0');
    echo "<br><br>"; */
    echo "Kategorie: ".form_dropdown('kategories',$kategories);
    echo "<br><br>";
    echo "Neuer Name/Kategorie: ".form_input($KategorieName);
    echo "<br><br>";
    echo form_submit("add","Kategorie Hinzufügen!");
	echo form_submit("rename","Kategorie Umbenennen!");
    echo form_submit("delete","Kategorie Löschen!");
    echo "<br><br><br><br><br>";
    echo "TODO: Neu zu ordnen von Ausgaben/einnahmen zu Keine Angaben wenn Kategorie gelöscht / Umbenannt wurde."
    echo "<br>";
    echo "TODO: Kategorie Umbennen"
	// art des Buttons form_submit (Button ID/Name, Button Value);
	?>
</body>
</html>