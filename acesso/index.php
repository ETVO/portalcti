<!DOCTYPE html>
<html lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Acesso grêmio</title>
</head>

<body>
	<p>
		<?php
    include "../scripts/connect.php";
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
    if ($vals->adm != 's' || $vals->excluido != 'n' || $vals->ban != 'n')
    {
        ECHO "Você não possui permissão para acessar esse site!";
        exit;
    }
    /*else
    {*/
        $sql = "SELECT * FROM portal.mensagens";
        $res = pg_query($conecta, $sql);
        $cont = pg_num_rows($res);
        while($cont >= 1)
        {
            $rsql = "SELECT * FROM portal.mensagens WHERE id = $cont";
            $valores = pg_query($conecta, $rsql);
            $r = pg_fetch_object($valores);
            ECHO '<div class="acessoMsg"><b>Nome: </b>'.$r->nome.'<br><b>Curso: </b>'.$r->curso.'<br><b>Mensagem: </b>'.$r->mensagem.'<br><b>Data: </b>'.$r->data.'<br><b>RA: </b>'.$r->ra.'<br></div>';
            $cont--;
        }
    //}
    pg_close($conecta);
    ?>
	</p>
</body>

</html>
