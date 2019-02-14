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
			$this->load->helper('form');
			echo form_open('Login_Controller/LoginRegisterSwitch');
			$UsernameFormSettings = array(
                'name'        => 'username',
                'id'          => 'username',
				'maxlength'   => '100',
				'size'        => '50',
				'style'       => 'width:50%',
            );
            echo "Username: ".form_input($UsernameFormSettings);
			echo form_submit('Test','Test Text');
			echo form_close();
		?>
	</div>
</body>
</html>