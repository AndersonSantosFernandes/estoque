<?php 
include_once("lista.php");
include_once("models/Message.php");
$msg = new Message();
$tabela = "insumos";

$diferenca = strtotime(" -5 hours ");
$datedate = date("dmYHis", $diferenca);

echo "<br>";
echo"Testando csv";

$cabecalho = ["ID","NOME","BASE","QUANTIDADE","DATA_SAIDA","COMENTARIO","ENVIO/CONSUMO","USUARIO"];

//abrir o arquivo
$arquivo = fopen("../../../Users/Anderson/Downloads/".$tabela."_".$datedate.".csv","w");

//escrever o cabecalho
fputcsv($arquivo,$cabecalho, ";");

//escrever os dados
foreach($showInsumos as  $insumos){

    fputcsv($arquivo , mb_convert_encoding($insumos,"ISO-8859-1","UTF-8"), ";" );

}

//fechar arquivo
fclose($arquivo);
$msg->setMessage("Arquivo salvo em Downloads".$tabela."_".$datedate.".csv","win");
// header("location:geral.php");

?>
<!-- <a href="lista.php">Lista</a> -->