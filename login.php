<!DOCTYPE html>
<?php
    include "connect.php";
    session_start();
?>
<html lang="pt-br">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <head>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
      <meta charset="UTF-8">
      <title>Portal Estudantil - Início</title>
   </head>

   <body>
      <div class="head">
         <label style="font-weight: bold; font-size: 250%; padding-right: 10px; ">Portal</label><a href="http://www.cti.feb.unesp.br" target="_blank"><img src="cti.png" width="15%"></a>
      </div>
      <div class="menu">
         <ul>
            <li><a href="index.html">Início</a></li>
            <li><a href="">Notícias</a></li>
            <li><a href="gremio.html">Grêmio</a></li>
            <li><a href="info.html">Informações</a></li>
            <li><a href="http://www.cti.feb.unesp.br" target="_blank">CTI</a></li>
            <li><a href="login.php" id="active">Minha Conta</a></li>
         </ul>
      </div>
      
      <br><br><br>
      <h1 align="center">Login:</h1>
      <?php
      if (empty($_SESSION['ra'])) 
      {
      ?>
      <form action="sessao.php" method="post">
      <table class="frm">
				<tr>
					<td colspan="2">
					    <input type="text" id="user" name="ra" placeholder="RA..." required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
						<input type="password" id="cod" name="senha" placeholder="Senha..." required>
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
      <?php
      }
      else
      {
          $ra = $_SESSION['ra'];
          $rsql = "SELECT * FROM portal.users WHERE ra = $ra";
          $valores = pg_query($conecta, $rsql);
          $r = pg_fetch_object($valores);
          ECHO "<h3 style='text-align: center;'>Nome: ".$r->nome."<br>Curso: ".$r->curso."<br>email: ".$r->email."</h3>";
      ?>
          <center><input type="button" class="btn" value="Encerrar sessão" onclick="window.open('http://200.145.153.175/marcotoledo/gremio/end.php','_self')"></center>
      <?php
      }
      ?>
      <div style="padding-top: 20px;">
		  <div class="rodape">
			@ 2018,<br>por Estevão Rolim e Marco Antônio de Toledo.
		  </div>
      </div>
   </body>
</html>