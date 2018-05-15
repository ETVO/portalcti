<!DOCTYPE html>
<html lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
	<meta charset="utf-8" />
</head>

<body>
	<?php
         //Conecta com o PostgreSQL
         $conecta = pg_connect("host=127.0.0.1 port=5432 dbname=meteoro
         user=meteoro password=");
        if (!$conecta)
        {
            echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
            exit;
        }
     ?>
</body>

</html>
