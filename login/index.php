<!DOCTYPE html>
<?php
    include "../scripts/connect.php";
    session_start();
    if(isset($_POST['encerraB'])){
        $_SESSION = array();
        session_destroy();
        pg_close($conecta);
        ECHO '<script type="text/javascript">window.open("http://200.145.153.175/marcotoledo/gremio/login","_self")</script>';
    }
    if(isset($_POST['subB'])){
        $ra = $_POST['ra'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM portal.users WHERE ra = $ra";
        $res = pg_query($conecta, $sql);
        if ($res == NULL)
        {
            ?>
                <script>
                    alert("Esse RA não está cadastrado no servidor! Redigite por favor."); 
                    document.getElementById("ra").reset();
                </script>
            <?php
        }
        else
        {
            $vals = pg_fetch_object($res);
            if ($vals->senha != $senha)
            {
                ?>
                    <script> 
                        alert("Senha incorreta! Redigite por favor."); 
                        document.getElementById("senha").reset();
                    </script>
                <?php
            }
            else 
            {
                if ($vals->excluido != 'n' || $vals->ban != 'n')
                {
                    ?>
                        <script> 
                            alert("Seu acesso à conta foi negado! Se isso parece errado, contate um admin.");
                            document.getElementById("ra").reset();
                            document.getElementById("senha").reset();
                        </script>
                    <?php
                }
                else
                {
                    session_start();
                    $_SESSION['ra'] = $ra;
                    $_SESSION['senha'] = $senha;
                    pg_close($conecta); 
                    ECHO '<script type="text/javascript">window.open("http://200.145.153.175/marcotoledo/gremio/login","_self")</script>';
                }
            }
        }
    }    
?>
	<html lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<head>
        <script type="text/javascript" src="../js/auto.js"></script>
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
				<li><a href="../login/" id="active" onmouseover="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#34bff2'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';" onmouseout="document.getElementsByClassName('menu')[0].style.borderBottomColor = '#00adef'; document.getElementsByClassName('menu')[0].style.transition = '0.3s';">Minha Conta</a></li>
			</ul>
		</div>

		<br>
		<h1 align="center">Minha Conta</h1>
		<?php
			if (empty($_SESSION['ra'])) 
			{
		?>
			<center>
				<div id="frmAcesso">
						<h3>Faça seu login:</h3>
					<form action="" method="post" id="formulario">
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
								<td id="obs" colspan="2">
									<input type="submit" class="btn" value="Entrar" name="subB"> &nbsp; &nbsp; <input type="reset" class="btn" value="Limpar">
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
				ECHO "<h3 style='text-align: center;'>".$r->nome."<br>".$r->curso."<br>".$r->email."</h3>";
		?>

				<div style="margin-bottom: 1em;">
				    <center>
                        <form action="" method="post">
                            <input type="submit" class="btn" value="Encerrar sessão" name="encerraB">
                        </form>
                    </center>
				</div>
				<?php
			}
		?>
				<div class="rodape" id="foot"></div>
	</body>

	</html>
