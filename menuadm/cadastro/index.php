<!DOCTYPE html>
<?php
    include "../../scripts/connect.php";
    session_start();
    if(isset($_POST['envia']))
    {
        $rau = htmlspecialchars($_POST['ra']);
        $usuario = htmlspecialchars($_POST['usuario']);
        $senha = htmlspecialchars($_POST['senha']);
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $curso = htmlspecialchars($_POST['curso']);
        $excluido = htmlspecialchars($_POST['excluido']);
        $ban = htmlspecialchars($_POST['ban']);
        $adm = htmlspecialchars($_POST['adm']);
        $editor = htmlspecialchars($_POST['editor']);
        $moderador = htmlspecialchars($_POST['moderador']);

        $sql = "INSERT INTO portal.users (ra, usuario, senha, nome, email, curso, excluido, ban, adm, editor, moderador) VALUES ($rau, '$usuario', '$senha', '$nome', '$email', '$curso', '$excluido', '$ban', '$adm', '$editor', '$moderador')";
        $resultado = pg_query($conecta, $sql);
        $linhas = pg_affected_rows($resultado);
        if ($linhas > 0)
        {
        ?>
	<script>
		alert("Cadastro realizado com sucesso!");
		document.getElementById("cadastroFrm").reset();

	</script>
	<?php
        }
        else
        {
        ?>
		<script>
			alert("Erro no cadastro! Tente novamente.");

		</script>
		<?php
        }
    }
?>
			<html lang="pt-br">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<head>
				<script type="text/javascript" src="../../js/auto.js"></script>
				<link rel="stylesheet" type="text/css" href="../../style.css">
				<meta charset="UTF-8">
				<title>Portal Administrativo - Início</title>
			</head>

			<body>
				<div class="head">
					<label style="font-weight: bold; font-size: 250%; padding-right: 10px; ">Admin</label><a href="http://www.cti.feb.unesp.br" target="_blank"><img src="../../imgs/cti.png" width="100px"></a>
				</div>
				<div class="menu">
					<ul>
						<li><a href="../">Início</a></li>
						<li><a href="../mensagens/">Mensagens</a></li>
						<li><a href="">Consulta</a></li>
						<li><a href="" id="active" onmouseover="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#34bff2'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';" onmouseout="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#00adef'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';">Cadastro</a></li>
						<li><a href="">Alteração</a></li>
						<li><a href="../conta/">Minha Conta</a></li>
						<li><a href="../../" target="_blank">Site</a></li>
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
            ?>
					<div align="center">
						<h1>Cadastro de Alunos</h1>
						<p>
							Preencha o formulário abaixo para realizar o cadastro.
						</p>
					</div>
					<center>
						<div id="frmCadastro">
							<form action="" method="post">
								<table class="frm">
									<tr>
										<td id="frmTxt">
											<label for="ra">RA: </label>
										</td>
										<td>
											<input type="number" name="ra" id="ra" placeholder="Insira o RA aqui..." width="100%" required>
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="usuario">Usuário: </label>
										</td>
										<td>
											<input type="text" name="usuario" id="usuario" placeholder="Insira o usuário aqui..." required>
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="senha">Senha: </label>
										</td>
										<td>
											<input type="text" name="senha" id="senha" placeholder="Insira a senha aqui..." required>
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="nome">Nome: </label>
										</td>
										<td>
											<input type="text" name="nome" id="nome" placeholder="Insira o nome aqui..." required>
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="email">E-mail: </label>
										</td>
										<td>
											<input type="email" name="email" id="email" placeholder="Insira o email aqui..." width="100%" required>
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="curso">Curso: </label>
										</td>
										<td>
											<select name="curso" id="curso" required>
									        <option value="Informática">Informática</option>
									        <option value="Mecânica">Mecânica</option>
									        <option value="Eletrônica">Eletrônica</option>
									    </select>
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="exclusao">Excluído: </label>
										</td>
										<td id="frmRadio">
											<input type="radio" name="exclusao" id="exclusao" value="n" checked> Não
											<input type="radio" name="exclusao" id="exclusao" value="s"> Sim
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="ban">Banido: </label>
										</td>
										<td id="frmRadio">
											<input type="radio" name="ban" id="ban" value="n" checked> Não
											<input type="radio" name="ban" id="ban" value="s"> Sim
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="adm">Administrador: </label>
										</td>
										<td id="frmRadio">
											<input type="radio" name="adm" id="adm" value="n" checked> Não
											<input type="radio" name="adm" id="adm" value="s"> Sim
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="editor">Editor: </label>
										</td>
										<td id="frmRadio">
											<input type="radio" name="editor" id="editor" value="n" checked> Não
											<input type="radio" name="editor" id="editor" value="s"> Sim
										</td>
									</tr>
									<tr>
										<td id="frmTxt">
											<label for="moderador">Moderador: </label>
										</td>
										<td id="frmRadio">
											<input type="radio" name="moderador" id="moderador" value="n" checked> Não
											<input type="radio" name="moderador" id="moderador" value="s"> Sim
										</td>
									</tr>

									<tr>
										<td id="obs" colspan="2">
											<input type="submit" name="envia" value="Cadastrar" class="btn"> &nbsp; &nbsp; <input type="reset" name="limpa" value="Limpar" class="btn">
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
