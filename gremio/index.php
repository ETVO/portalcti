<!DOCTYPE html>
<?php
    include "../scripts/connect.php";
    session_start();
    if(isset($_POST['envia']))
    {
        $mensagem = htmlspecialchars($_POST['msg']);
        $data = date('Y/m/d H:i:s');
        $ra = $_SESSION['ra'];
    
        $rsql = "SELECT * FROM portal.users WHERE ra = $ra";
        $valores = pg_query($conecta, $rsql);
        $r = pg_fetch_object($valores);
        $nome = $r->nome;
        $curso = $r->curso;

        $sql = "INSERT INTO portal.mensagens (nome, curso, mensagem, ra) VALUES ('$nome', '$curso', '$mensagem', $ra)";
        $resultado = pg_query($conecta, $sql);
        $linhas = pg_affected_rows($resultado);
        if ($linhas > 0)
        {
        ?>
	<script>
		alert("Mensagem enviada com sucesso!");
		document.getElementById("msgFrm").reset();

	</script>
	<?php
        }
        else
        {
        ?>
		<script>
			alert("Erro no envio da mensagem! Tente novamente.");

		</script>
		<?php
        }
    }
?>
			<html lang="pt-br">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<head>
				<script type="text/javascript" src="../js/auto.js"></script>
				<link rel="stylesheet" type="text/css" href="../style.css">
				<meta charset="UTF-8">
				<title>Portal Estudantil - Grêmio</title>
			</head>

			<body>
				<div class="head">
					<label style="font-weight: bold; font-size: 250%; padding-right: 10px;">Portal</label><a href="http://www.cti.feb.unesp.br" target="_blank"><img src="../imgs/cti.png" width="100px"></a>
				</div>
				<div class="menu">
					<ul>
						<li><a href="../">Início</a></li>
						<li><a href="">Notícias</a></li>
						<li><a href="../gremio/" id="active" onmouseover="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#34bff2'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';" onmouseout="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#00adef'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';">Grêmio</a></li>
						<li><a href="../info/">Informações</a></li>
						<li><a href="http://www.cti.feb.unesp.br" target="_blank">CTI</a></li>
						<li><a href="../login/">Minha Conta</a></li>
					</ul>
				</div>

				<div align="center">
					<h1>Grêmio Estudantil</h1>
					<p>A representação discente, por discentes.</p>
				</div>

				<center>
					<h2>Quem são?</h2>
					<div class="integrantesgremio">
						<ul>
							<li>
								<ul>
									<li>
										<img src="" alt="Presidente - Estevão Rolim">
									</li>
									<li>
										<p><b>Presidente</b></p>
									</li>
									<li>
										<p>Estevão P. Rolim</p>
									</li>
								</ul>
								<ul>
									<li>
										<img src="" alt="Vice-Presidente - Marco Toledo">
									</li>
									<li>
										<p><b>Vice-Presidente</b></p>
									</li>
									<li>
										<p>Marco Antônio R. de Toledo</p>
									</li>
								</ul>
								<ul>
									<li>
										<img src="" alt="Tesoureiro - Victor Martins">
									</li>
									<li>
										<p><b>Tesoureiro</b></p>
									</li>
									<li>
										<p>Victor Manoel J. P. Martins</p>
									</li>
								</ul>
								<ul>
									<li>
										<img src="" alt="Secretária - Alesxya Soares">
									</li>
									<li>
										<p><b>Secretária</b></p>
									</li>
									<li>
										<p>Alesxya Soares da Silva</p>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</center>
				<?php
        if (empty($_SESSION['ra'])) 
                {
    ?>
					<center>
						<div id="frmMsg">
							<h3>Deseja enviar mensagens ao Grêmio?</h3>
							<h4><a href="../login/" class="link">Clique aqui para fazer login!</a></h4>
						</div>
					</center>
					<?php
        }
        else 
        {
    ?>
						<center>
							<div id="frmMsg">
								<h2>Deixe sua proposta ao grêmio!</h2>
								<form action="" method="post">
									<table class="frm">
										<tr>
											<td id="frmTxt">
												<label for="msg">Mensagem: </label>
											</td>
											<td>
												<textarea name="msg" id="msg" cols="10" rows="10" placeholder="Insira sua mensagem..." required></textarea>
											</td>
										</tr>
										<tr>
											<td id="obs" colspan="2">
												<input type="submit" name="envia" value="Enviar" class="btn"> &nbsp; &nbsp; <input type="reset" name="limpa" value="Limpar" class="btn">
											</td>
										</tr>
									</table>
								</form>
							</div>
						</center>
						<?php
        }
    ?>
							<div class="rodape" id="foot"></div>
			</body>
