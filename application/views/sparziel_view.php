<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Sparziel</title>
</head>
<body>
	<div>
		<?php 
			echo isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
			
			$this->load->helper('form');
			echo form_open('Sparziel_Controller');
			$SparzielNameFormSettings = array(
                'name'        => 'sparziel_name',
				'id'          => 'sparziel_name',
				'placeholder' => 'Neues Sparziel anlegen',
				'maxlength'   => '100',
				'size'        => '50',
				'style'       => 'width:25%',
			);
            echo form_input($SparzielNameFormSettings);
			$SparzielBetragFormSettings = array(
                'name'        => 'sparziel_betrag',
				'id'          => 'sparziel_betrag',
				'placeholder' => 'Sparziel Betrag',
				'maxlength'   => '100',
				'size'        => '50',
				'style'       => 'width:25%',
				'type'	 	  => 'number'	
            );
            echo form_input($SparzielBetragFormSettings);
			echo form_submit('anlegen','Anlegen');
			echo form_close();

			echo '<br><br>';

			if(!empty($sparziele)) {
				$sparziele = json_decode(json_encode($sparziele), true);
				$this->table->set_heading('Sparziel', 'Stand', 'Ziel');
				foreach ($sparziele as $key => $value) {
					$this->table->add_row($value['name'], $value['stand'], $value['ziel']);
				}
				echo $this->table->generate();
			} else {
				echo 'Keine Sparziele vorhanden';
			}
		?>
	</div>
</body>
</html>