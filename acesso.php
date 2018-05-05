<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Acesso grêmio</title>
</head>

<body>
	<p>
		<?php
    $cod = $_POST['cod'];
    if ($cod != 42)
    {
        ECHO "Código inválido!";
        exit;
    }
    else
    {
        include "connect.php";
        $sql = "SELECT * FROM portal.mensagens";
        $res = pg_query($conecta, $sql);
        $cont = pg_num_rows($res);
        while($cont >= 1)
        {
            $asql = "SELECT nome FROM portal.mensagens WHERE code = $cont";
            $ares = pg_query($conecta, $asql);
            $a = pg_fetch_object($ares);
            $bsql = "SELECT curso FROM portal.mensagens WHERE code = $cont";
            $bres = pg_query($conecta, $bsql);
            $b = pg_fetch_object($bres);
            $csql = "SELECT mensagem FROM portal.mensagens WHERE code = $cont";
            $cres = pg_query($conecta, $csql);
            $c = pg_fetch_object($cres);
            $dsql = "SELECT data FROM portal.mensagens WHERE code = $cont";
            $dres = pg_query($conecta, $dsql);
            $d = pg_fetch_object($dres);
            ECHO "Nome: ".$a->nome."<br>Curso: ".$b->curso."<br>Mensagem: ".$c->mensagem."<br>Data: ".$d->data."<br><hr>";
            $cont--;
        }
    }
    pg_close($conecta);
    ?>
	</p>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Acesso grêmio</title>
</head>

<body>
	<p>
		<?php
		$cod = $_POST['cod'];
		if ($cod != 42)
		{
			ECHO "Código inválido!";
			exit;
		}
		else
		{
			include "connect.php";
			$sql = "SELECT * FROM portal.mensagens";
			$res = pg_query($conecta, $sql);
			$cont = pg_num_rows($res);
			while($cont >= 1)
			{
				$asql = "SELECT nome FROM portal.mensagens WHERE code = $cont";
				$ares = pg_query($conecta, $asql);
				$a = pg_fetch_object($ares);
				$bsql = "SELECT curso FROM portal.mensagens WHERE code = $cont";
				$bres = pg_query($conecta, $bsql);
				$b = pg_fetch_object($bres);
				$csql = "SELECT mensagem FROM portal.mensagens WHERE code = $cont";
				$cres = pg_query($conecta, $csql);
				$c = pg_fetch_object($cres);
				$dsql = "SELECT data FROM portal.mensagens WHERE code = $cont";
				$dres = pg_query($conecta, $dsql);
				$d = pg_fetch_object($dres);
				ECHO "Nome: ".$a->nome."<br>Curso: ".$b->curso."<br>Mensagem: ".$c->mensagem."<br>Data: ".$d->data."<br><hr>";
				$cont--;
			}
		}
		pg_close($conecta);
    ?>
	</p>
</body>

</html>
