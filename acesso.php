<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Acesso grêmio</title>
</head>
<body>
    <p>
    <?php
    include "connect.php";
    $ra = $_POST['ra'];
    $senha = $_POST['senha'];
        
    $sql = "SELECT * FROM portal.users WHERE ra = $ra";
    $res = pg_query($conecta, $sql);
    if ($res == NULL)
    {
        ECHO "RA inexistente!";
        exit;
    }
    $vals = pg_fetch_object($res);
        //ECHO $vals->senha."/fdp/".$senha;
    if ($vals->senha != $senha)
    {
        ECHO "Senha incorreta!";
        exit;
    }
    if ($vals->adm != 's' || $vals->excluido != 'n' || $vals->ban != 'n')
    {
        ECHO "Você não possui permissão para acessar esse site!";
        exit;
    }
    /*else
    {*/
        $sql = "SELECT * FROM portal.mensagens";
        $res = pg_query($conecta, $sql);
        $cont = pg_num_rows($res);
        while($cont >= 1)
        {
            $rsql = "SELECT * FROM portal.mensagens WHERE id = $cont";
            $valores = pg_query($conecta, $rsql);
            $r = pg_fetch_object($valores);
            ECHO "Nome: ".$r->nome."<br>Curso: ".$r->curso."<br>Mensagem: ".$r->mensagem."<br>Data: ".$r->data."<br><hr>";
            $cont--;
        }
    //}
    pg_close($conecta);
    ?>
    </p>
</body>
</html>