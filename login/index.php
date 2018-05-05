<!DOCTYPE html>
<?php
    include "../scripts/connect.php";
    session_start();
?>
	<html lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
		<meta charset="UTF-8">
		<title>Portal Estudantil - Início</title>
	</head>

	<body>
		<div class="head">
			<label style="font-weight: bold; font-size: 250%; padding-right: 10px;">Portal</label><a href="http://www.cti.feb.unesp.br" target="_blank"><img src="../imgs/cti.png" width="100px"></a>
		</div>
		<div class="menu">
			<ul>
				<li><a href="../">Início</a></li>
				<li><a href="">Notícias</a></li>
				<li><a href="../gremio/">Grêmio</a></li>
				<li><a href="../info/">Informações</a></li>
				<li><a href="http://www.cti.feb.unesp.br" target="_blank">CTI</a></li>
				<li><a href="../login/" id="active">Minha Conta</a></li>
			</ul>
		</div>

		<br><br><br>
		<h1 align="center">Minha Conta</h1>
		<?php
			if (empty($_SESSION['ra'])) 
			{
		?>
			<center>
				<div id="frmAcesso">
					<form action="../scripts/sessao.php" method="post">
						<h3>Faça seu login:</h3>
						<table class="frm">
							<tr>
								<td>
									<label for="ra">RA: </label>
								</td>
								<td>
									<input type="text" id="ra" name="ra" required>
								</td>
							</tr>
							<tr>
								<td>
									<label for="senha">Senha: </label>
								</td>
								<td>
									<input type="password" id="senha" name="senha" required>
								</td>
							</tr>

							<tr>
								<td style="text-align: right;">
									<input type="submit" class="btn" value="Entrar">
								</td>

								<td style="text-align: left;">
									<input type="reset" class="btn" value="Limpar">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</center>
			<?php
			}
			else
			{
				$ra = $_SESSION['ra'];
				$rsql = "SELECT * FROM portal.users WHERE ra = $ra";
				$valores = pg_query($conecta, $rsql);
				$r = pg_fetch_object($valores);
				ECHO "<h3 style='text-align: center;'>.$r->nome.\"<br>.$r->curso.\"<br>.$r->email.\"</h3>";
		?>

				<center>
					<input type="button" class="btn" value="Encerrar sessão" onclick="window.open('http://200.145.153.175/marcotoledo/gremio/end.php','_self')">
				</center>
				<?php
			}
		?>
				<div class="rodape">
					@ 2018,<br>por Estevão Rolim e Marco Antônio de Toledo.
				</div>
	</body>

	</html>
