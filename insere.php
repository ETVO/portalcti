<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Enviando sua mensagem...</title>
</head>
<script type="text/javascript">
    window.onload = function espera()
    {
        setTimeout(volta, 3000);
    }
    
    function volta()
    {
        window.history.go(-1);
    }
</script>
<body>
    <?php
        include "connect.php";
        $nome = $_POST['nome'];
        $curso = $_POST['curso'];
        $mensagem = $_POST['msg'];
        $data = date('Y/m/d H:i:s');

        $sql = "INSERT INTO portal.mensagens (nome, curso, mensagem) VALUES ('$nome', '$curso', '$mensagem')";
        $resultado = pg_query($conecta, $sql);
        $linhas = pg_affected_rows($resultado);
        if ($linhas > 0)
            echo "Mensagem enviada!<br>Redirecionando...";
        else
            echo "Erro no envio da mensagem!<br><br>";
        // Fecha a conexão com o PostgreSQL
        pg_close($conecta); 
    ?>
</body>
</html>