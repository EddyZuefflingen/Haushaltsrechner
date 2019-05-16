<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inputting</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/input_view.css">
</head>
<body>
<div id="menu">
	<a href="<?php echo base_url(); ?>index.php/Input_Controller">Input</a>
	<a href="<?php echo base_url(); ?>index.php/Sparziel_Controller">Sparziel</a>
	<a href="<?php echo base_url(); ?>index.php/Logout_Controller">Logout</a>
</div>
<div id="container">
<?php
	$this->load->helper('form');
	echo form_open('Input_Controller/ButtonSwitch');	

	$choice = array(
		'einnahmen' => 'Einnahmen',
		'ausgaben' => 'Ausgaben'
	);

	$amount = array(
	'name' => 'amount',
	'id' => 'amount',
	'value' => '0',
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
	echo form_submit("KategorieDetails","Kategorie Bearbeiten!");
	// art des Buttons form_submit (Button ID/Name, Button Value);
	echo "<br><br>";
	echo "Kontostand: " .$kontostand."€";
	echo "<br><br>";
	?>
	<table>
		<tr>
			<th>Kategorie</th>
			<th>Menge</th>
			<th>Datum</th>
		</tr>
		<?php
		if(max(array('count',$transactionKategories)) > 0){
		foreach($transactionKategories as $row)
		{
			echo "<tr>";
				echo "<td>";
					echo $row["kate"];
				echo "</td>";
				echo "<td>";
					echo $row["menge"];
				echo "</td>";
				echo "<td>";
					echo $row["datum"];
				echo "</td>";
			echo "</tr>";
		}
	}
		?>
		</table>
	</div>
</body>
</html>