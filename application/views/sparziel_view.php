<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Sparziel</title>
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
			$this->load->helper('form');
			echo form_open('Sparziel_Controller/anlegen');
			$SparzielNameFormSettings = array(
                'name'        => 'sparziel_name',
				'id'          => 'sparziel_name',
				'placeholder' => 'Sparziel Name',
				'maxlength'   => '100',
				'size'        => '50',
			);
            echo form_input($SparzielNameFormSettings);
			$SparzielBetragFormSettings = array(
                'name'        => 'sparziel_betrag',
				'id'          => 'sparziel_betrag',
				'placeholder' => 'Sparziel Betrag',
				'maxlength'   => '100',
				'size'        => '50',
				'type'	 	  => 'number'	
            );
            echo form_input($SparzielBetragFormSettings);
			echo form_submit('anlegen','Anlegen');
			echo form_close();

			echo '<br><br>';

			if(!empty($sparziele)) {
				$sparziele = json_decode(json_encode($sparziele), true);
				$this->table->set_heading('Sparziel', 'Stand', 'Ziel', '');
				foreach ($sparziele as $key => $value) {
					$this->table->add_row($value['name'], $value['stand'], $value['ziel'],
					form_button('add' . $value['sparziel_id'], '+', 
					[	'class' 	=> 'add',
						'onclick' 	=> 'betragHinzufuegen('.$value['sparziel_id'].')',
						'title'		=> 'Betrag hinzufügen'
					]));
				}
				echo $this->table->generate();
			} else {
				echo 'Keine Sparziele vorhanden';
			}
		?>
		<script>
			function betragHinzufuegen(sparzielId) {
				var betrag = prompt("Betrag eingeben:", 0);
				if(betrag != null) {
					betrag = parseFloat(betrag);
					if(isNaN(betrag)) {
						console.log('Keine Nummer');
					} else {
						console.log(betrag);
					}
				}
			}
		</script>
	</div>
</body>
</html>