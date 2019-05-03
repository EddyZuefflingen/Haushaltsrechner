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
        <div id="container">
            <h1>Login</h1>
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
                    'class' => 'BtnControl',
                    'onclick' => 'test()'
                );

                $RegisterButtonSubmit = array(
                    'name' => 'Register',
                    'id' => 'Register',
                    'value' => "Register",
                    'class' => 'BtnControl'
                );

                echo form_label("Username: ", "Username", $UsernameLabelSettings).form_input($UsernameFormSettings);
                echo "<br><br>";
                echo form_label("Password: ", "Password", $PasswordLabelSettings).form_password($PasswordFormSettings);
                echo "<br><br>";

                echo form_checkbox($KeepUsernameCheckboxSettings).form_label("Username merken ?", "KeepUsername");
                echo "<br><br>";
                echo form_submit($LoginButtonSubmit);
                echo form_submit($RegisterButtonSubmit);
                echo form_close();
            ?>
        </div>
        <script>

            // function test() {
            //     event.preventDefault();

            //     var xhr = new XMLHttpRequest();
            //     xhr.open('POST', '<?php //echo base_url(); ?>index.php/Login_Controller/test');
            //     xhr.onload = function() {
            //         if (xhr.status === 200) {
            //             alert('User\'s name is ' + xhr.responseText);
            //         }
            //         else {
            //             alert('Request failed.  Returned status of ' + xhr.status);
            //         }
            //     };
            //     xhr.send();

            //     console.log(1);
            // }
        
        </script>
    </body>
</html>
