<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register_view.css">
	</head>
	<body>
		<div id="container">
			<?php
				$oldUsername = "";
				 if (isset($username))
					$oldUsername = $username;

					$oldEmail = "";
					if (isset($mail))
					   $oldEmail = $mail;

				$this->load->helper('form');
				echo form_open('Register_Controller/Registration');
				$UsernameFormSettings = array(
					'name'        => 'username',
					'id'          => 'username',
					'maxlength'   => '100',
					'size'        => '50',
					'style'       => 'width:50%',
					'value'       => $oldUsername,
				);

				$PasswordFormSettings = array(
					'name'        => 'password',
					'id'          => 'password',
					'maxlength'   => '100',
					'size'        => '50',
					'style'       => 'width:50%',
				);

				$EmailFormSettings = array(
					'name'        => 'email',
					'id'          => 'email',
					'maxlength'   => '100',
					'size'        => '50',
					'style'       => 'width:50%',
					'value'       => $oldEmail,
				);						

				echo "Username: ".form_input($UsernameFormSettings);
				echo "<br><br>";
				echo "Password: ".form_password($PasswordFormSettings);
				echo "<br><br>";
				echo "Email: ".form_input($EmailFormSettings);
				echo "<br><br>";			

				echo form_submit('Register','Register','Register');
				echo form_close();
			?>
		</div>
	</body>
</html>
