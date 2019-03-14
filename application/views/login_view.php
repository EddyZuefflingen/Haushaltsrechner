<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
        <div>
            <?php
                $this->load->helper('form');
                echo form_open('Login_Controller/LoginRegisterSwitch');
                $UsernameFormSettings = array(
                    'name' => 'username',
                    'id' => 'username',
                    'maxlength' => '100',
                    'size' => '50',
                    'style' => 'width:50%',
                );

                $PasswordFormSettings = array(
                    'name' => 'password',
                    'id' => 'password',
                    'maxlength' => '100',
                    'size' => '50',
                    'style' => 'width:50%',
                );

                echo "Username: " . form_input($UsernameFormSettings);
                echo "<br><br>";
                echo "Password: " . form_password($PasswordFormSettings);
                echo "<br><br>";

                echo form_submit('Login', 'Login');
                echo form_submit('Register', 'Register', 'Register');
                echo form_submit('Test', 'MarvinsButton');
                echo form_close();
            ?>
        </div>
    </body>
</html>
