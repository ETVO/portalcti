<!DOCTYPE html>
<html lang="pt-br">
     <head>
         <meta charset="utf-8" />
         <title>Conecta com BD PostgreSQL</title>
     </head>
     <body>
     <?php
         //Conecta com o PostgreSQL
         $conecta = pg_connect("host=127.0.0.1 port=5432 dbname=cinema_72a
         user=alunocti password=alunocti");
        if (!$conecta)
        {
            echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
            exit;
        }
     ?>
     </body>
</html>