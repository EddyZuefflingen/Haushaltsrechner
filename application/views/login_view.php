<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_view.css">
    </head>
    <body>
        <div>
            <?php
                $this->load->helper('form');
                echo form_open('Login_Controller/LoginRegisterSwitch');

                //Control Settings
                $UsernameFormSettings = array(
                    'name' => 'username',
                    'id' => 'username',
                    'maxlength' => '100',
                );

                $PasswordFormSettings = array(
                    'name' => 'password',
                    'id' => 'password',
                    'maxlength' => '100',
                );

                $LoginFormSubmit = array(
                    'name' => 'login',
                    'id' => 'login',
                    'value' => "Login",
                );

                $RegisterFormSubmit = array(
                    'name' => 'register',
                    'id' => 'register',
                    'value' => "Register",
                );

                $InputFormSubmit = array(
                    'name' => 'Test',
                    'id' => 'input',
                    'value' => "Input",
                );


                echo "Username: " . form_input($UsernameFormSettings);
                echo "<br><br>";
                echo "Password: " . form_password($PasswordFormSettings);
                echo "<br><br>";

                echo form_submit($LoginFormSubmit);
                echo form_submit($RegisterFormSubmit);
                echo form_submit($InputFormSubmit);
                echo form_close();
            ?>
        </div>
    </body>
</html>
