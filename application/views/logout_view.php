<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_view.css">
    </head>
    <body>
        <div id="container">
            <h1>Erfolgreich ausgeloggt.</h1>
            Sie werden in 3 Sekunden auf die Login Seite weitergeleitet.
        </div>
        <script>
            setTimeout(function(){
                window.location.href = '<?php echo base_url(); ?>index.php/';
            }, 3000);
        </script>
    </body>
</html>
