<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserção SQL</title>
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
        $mensagem = $_POST['mens'];
        $data = date('Y/m/d H:i:s');

        $sql = "INSERT INTO testegremio (code, nome, curso, mensagem, data) VALUES (nextval('teste_gremio_code'::regclass), '$nome', '$curso', '$mensagem', '$data')";
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