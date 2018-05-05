<!DOCTYPE html>
<html lang="pt-br">
     <head>
         <meta charset="utf-8" />
     </head>
     <script type="text/javascript">
        window.onload = function espera()
        {
            setTimeout(volta, 1);
        }

        function volta()
        {
            window.history.go(-1);
        }
    </script>
     <body>
     <?php
         include "connect.php";
         session_start();
         $_SESSION = array();
         session_destroy();
         pg_close($conecta);
     ?>
     </body>
</html>