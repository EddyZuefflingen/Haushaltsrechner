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
            <h1>Register</h1>
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
                    'class' => 'InputControl',
					'value'       => $oldUsername
				);

				$PasswordFormSettings = array(
					'name'        => 'password',
					'id'          => 'password',
					'maxlength'   => '100',
					'size'        => '50',
                    'class' => 'InputControl'
				);

				$EmailFormSettings = array(
					'name'        => 'email',
					'id'          => 'email',
					'maxlength'   => '100',
					'size'        => '50',
                    'class' => 'InputControl',
					'value'       => $oldEmail
				);						

				echo "Username: ".form_input($UsernameFormSettings);
				echo "<br><br>";
				echo "Password: ".form_password($PasswordFormSettings);
				echo "<br><br>";
				echo "Email: ".form_input($EmailFormSettings);
				echo "<br><br>";			

				echo form_button('Login','Login', array('onclick' => 'location.href=\'' . base_url() . 'index.php/Login_Controller\';', 'class' => 'BtnControl'));
				echo form_submit('Register', 'Register', array('class' => 'BtnControl'));
				echo form_close();
			?>
		</div>
	</body>
</html>
