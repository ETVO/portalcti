<!DOCTYPE html>
<?php
    include "../../scripts/connect.php";
    session_start();
?>
	<html lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<head>
		<script type="text/javascript" src="../../js/auto.js"></script>
		<link rel="stylesheet" type="text/css" href="../../style.css">
		<meta charset="UTF-8">
		<title>Seção Administrativa - Mensagens</title>
	</head>

	<body>
		<div class="head">
			<label style="font-weight: bold; font-size: 250%; padding-right: 10px; ">Admin</label><a href="http://www.cti.feb.unesp.br" target="_blank"><img src="../../imgs/cti.png" width="100px"></a>
		</div>
		<div class="menu">
			<ul>
				<li><a href="../">Início</a></li>
				<li><a href="" id="active" onmouseover="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#34bff2'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';" onmouseout="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#00adef'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';">Mensagens</a></li>
				<li><a href="">Consulta</a></li>
				<li><a href="../cadastro/">Cadastro</a></li>
				<li><a href="">Alteração</a></li>
				<li><a href="../conta/">Minha Conta</a></li>
				<li><a href="../../" target="_blank">Portal</a></li>
			</ul>
		</div>

		<?php
		if(!empty($_SESSION['ra']))
		{
			$ra = $_SESSION['ra'];
			$sql = "SELECT * FROM portal.users WHERE ra = $ra";
			$res = pg_query($conecta, $sql);
			$vals = pg_fetch_object($res);
			if($vals->adm == 's')
			{
				$msql = "SELECT * FROM portal.mensagens";
				$mres = pg_query($conecta, $msql);
				$cont = pg_num_rows($mres);
				while($cont >= 1)
				{
					$rsql = "SELECT * FROM portal.mensagens WHERE id = $cont";
					$valores = pg_query($conecta, $rsql);
					$r = pg_fetch_object($valores);
					ECHO '<div align="center"><h1>Mensagens</h1><p>Estas foram as mensagens enviadas para o Grêmio Estudantil:</p></div>'
					ECHO '<div class="acessoMsg"><b>Nome: </b>'.$r->nome.'<br><b>Curso: </b>'.$r->curso.'<br><b>Mensagem: </b>'.$r->mensagem.'<br><b>Data: </b>'.$r->data.'<br><b>RA: </b>'.$r->ra.'<br></div>';
					$cont--;
				}
			}
			else
			{
				?>
			<div align="center">
				<h1>Você não tem permissão para acessar esta página!</h1>
				<p>
					Se isto parece errado, contate um administrador ou tente novamente mais tarde!
				</p>
			</div>
			<?php
			}
		}
		else
		{
			?>
			<div align="center">
				<h1>Você precisa fazer login para acessar a Seção Administrativa!</h1>
				<p>
					Volte ao <a href="../" class="link">Portal</a> e entre em sua conta de administrador!
				</p>
			</div>
			<?php
		}
		?>

			<div class="rodape" id="foot"></div>

	</body>

	</html>
