<!DOCTYPE html>
<?php
    include "../scripts/connect.php";
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
	<script type="text/javascript" src="../js/auto.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="UTF-8">
	<title>Portal Administrativo - Início</title>
</head>

<body>
	<div class="head">
		<label style="font-weight: bold; font-size: 250%; padding-right: 10px; ">Admin</label><a href="http://www.cti.feb.unesp.br" target="_blank"><img src="../imgs/cti.png" width="100px"></a>
	</div>
	<div class="menu">
		<ul>
			<li><a href="../menuadm/">Início</a></li>
			<li><a href="../mensagens/">Mensagens</a></li>
			<li><a href="">Consulta</a></li>
			<li><a href="../cadastro/" id="active" onmouseover="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#34bff2'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';" onmouseout="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#00adef'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';">Cadastro</a></li>
			<li><a href="">Alteração</a></li>
			<li><a href="">Minha Conta</a></li>
			<li><a href="../index.html" target="_blank">Site</a></li>
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
            <center>
					<div id="frmCadastro">
						<h2>Cadastro de alunos:</h2>
						<form action="" method="post" id="cadastroFrm">
							<table class="frm">
								<tr>
									<td id="frmTxt">
										<label for="msg">RA: </label>
									</td>
									<td>
									    <input type="number" name="ra" id="ra" placeholder="Insira o RA aqui..." width="100%" required>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Usuário: </label>
									</td>
									<td>
									    <input type="text" name="usuario" id="usuario" placeholder="Insira o usuário aqui..." required>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Senha: </label>
									</td>
									<td>
									    <input type="text" name="senha" id="senha" placeholder="Insira a senha aqui..." required>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Nome: </label>
									</td>
									<td>
									    <input type="text" name="nome" id="nome" placeholder="Insira o nome aqui..." required>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">E-mail: </label>
									</td>
									<td>
									    <input type="email" name="email" id="email" placeholder="Insira o email aqui..." width="100%" required>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Curso: </label>
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
										<label for="msg">Excluído: </label>
									</td>
									<td>
									    <select name="exclusao" id="exclusao" required>
									        <option value="n">Não</option>
									        <option value="s">Sim</option>
									    </select>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Banido: </label>
									</td>
									<td>
									    <select name="ban" id="ban" required>
									        <option value="n">Não</option>
									        <option value="s">Sim</option>
									    </select>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Administrador: </label>
									</td>
									<td>
									    <select name="adm" id="adm" required>
									        <option value="n">Não</option>
									        <option value="s">Sim</option>
									    </select>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Editor: </label>
									</td>
									<td>
									    <select name="editor" id="editor" required>
									        <option value="n">Não</option>
									        <option value="s">Sim</option>
									    </select>
									</td>
								</tr>
								<tr>
									<td id="frmTxt">
										<label for="msg">Moderador: </label>
									</td>
									<td>
									    <select name="moderador" id="moderador" required>
									        <option value="n">Não</option>
									        <option value="s">Sim</option>
									    </select>
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
            <center><h1>Você não possui acesso à essa opção de administração!</h1></center>
            <?php
        }
    }
    else
    {
        ?>
        <center><h1>Você precisa estar logado para acessar essa seção!</h1></center>
        <?php
    }
    ?>
	
	<div class="rodape" id="foot"></div>

</body>

</html>
