<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Conexão com BD PostgreSQL</title>
</head>

<body>
	<?php
         //Conecta com o PostgreSQL
         $conecta = pg_connect("host=127.0.0.1 port=5432 dbname=meteoro
         user=meteoro password=CTImeteorologia2018");
        if (!$conecta)
        {
            echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
            exit;
        }
     ?>
</body>

</html>
