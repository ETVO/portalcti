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
    
    function erropost()
    {
        var request = document.createElement("form");
        request.target = "_blank";    
        request.method = "POST";
        request.action = "http://200.145.153.175/marcotoledo/gremiobeta/login/index.php";

        // Create an input
        var requstvar = document.createElement("input");
        requstvar.type = "text";
        requstvar.name = 'mens';
        requstvar.value = "y";

        // Add the input to the form
        request.appendChild(requstvar);

        // Just submit
        request.submit();
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
            ECHO '<script type="text/javascript">erropost();</script>';
            exit;
        }
        $vals = pg_fetch_object($res);
        if ($vals->senha != $senha)
        {
            ECHO "Senha incorreta!";
            ECHO '<script type="text/javascript">erropost();</script>';
            exit;
        }
        if ($vals->excluido != 'n' || $vals->ban != 'n')
        {
            ECHO "Conta indisponível!";
            ECHO '<script type="text/javascript">erropost();</script>';
            exit;
        }
        session_start();
        $_SESSION['ra'] = $ra;
        $_SESSION['senha'] = $senha;
        pg_close($conecta); 
    ?>
</body>

</html>
