window.onload = function auto()
{
    document.getElementById("foot").innerHTML = '@ 2018,<br>por Estevão Rolim e Marco Antônio de Toledo.';
}

function msgEnviada()
{
    alert("Mensagem enviada com sucesso!");
    document.getElementById("msgFrm").reset();
}

function msgErro()
{
    alert("Erro no envio da mensagem! Tente novamente.");
}