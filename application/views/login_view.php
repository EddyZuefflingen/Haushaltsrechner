<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_view.css">
        <script type='text/javascript' src="<?php echo base_url(); ?>js/login_view.js"></script>
    </head>
    <body>
        <div id = "LoginDiv">
            <?php
                $this->load->helper('form');
                echo form_open('Login_Controller/LoginRegisterSwitch');

                //Labels
                $UsernameLabelSettings = array('class' => 'LabelControl');
                $PasswordLabelSettings = array( 'class' => 'LabelControl');                

                //Inputs
                $UsernameFormSettings = array(
                    'name' => 'Username',
                    'id' => 'Username',
                    'maxlength' => '100',
                    'class' => 'InputControl'
                );

                $PasswordFormSettings = array(
                    'name' => 'Password',
                    'id' => 'Password',
                    'maxlength' => '100',
                    'class' => 'InputControl'
                );

                //Checkboxes
                $KeepUsernameCheckboxSettings = array(
                    'name' => 'KeepUsername',
                    'id' => 'KeepUsername',
                    'class' => 'CheckboxControl',
                    'OnChange' => 'javascrip_t:KeepUsernameOnchange()'
                );                

                //Buttons
                $LoginButtonSubmit = array(
                    'name' => 'Login',
                    'id' => 'Login',
                    'value' => "Login",
                    'class' => 'BtnControl'
                );

                $RegisterButtonSubmit = array(
                    'name' => 'Register',
                    'id' => 'Register',
                    'value' => "Register",
                    'class' => 'BtnControl'
                );

                echo form_label("Username: ", "UsernameLabel", $UsernameLabelSettings).form_input($UsernameFormSettings);
                echo "<br><br>";
                 echo form_label("Password: ", "PasswordLabel", $PasswordLabelSettings).form_password($PasswordFormSettings);
                echo "<br><br>";

                echo form_checkbox($KeepUsernameCheckboxSettings).form_label("Username merken ?", "KeepUsernameLabel");
                echo form_submit($LoginButtonSubmit);
                echo form_submit($RegisterButtonSubmit);
                echo form_close();
            ?>
        </div>
    </body>
</html>
