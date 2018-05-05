<!DOCTYPE html>
<html lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Realizando login...</title>
</head>
<script type="text/javascript">
	window.onload = function espera() {
		setTimeout(volta, 1);
	}

	function volta() {
		window.history.go(-1);
	}

</script>

<body>
	<?php
        include "connect.php";
        $ra = $_POST['ra'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM portal.users WHERE ra = $ra";
        $res = pg_query($conecta, $sql);
        if ($res == NULL)
        {
            ECHO "RA inexistente!";
            exit;
        }
        $vals = pg_fetch_object($res);
            //ECHO $vals->senha."/fdp/".$senha;
        if ($vals->senha != $senha)
        {
            ECHO "Senha incorreta!";
            exit;
        }
        if ($vals->excluido != 'n' || $vals->ban != 'n')
        {
            ECHO "Você não possui permissão para acessar esse site!";
            exit;
        }
        session_start();
        $_SESSION['ra'] = $ra;
        $_SESSION['senha'] = $senha;
        pg_close($conecta); 
    ?>
</body>

</html>
