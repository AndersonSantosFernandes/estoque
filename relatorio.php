<?php 

require_once("conexao.php");
require_once("queries.php");
require_once("vendor/autoload.php");

$query = filter_input(INPUT_GET,"query");

if(!$query){
header("location:initial.php");
}

use Dompdf\Dompdf;
$html = '<!DOCTYPE html>';
$html .= '<html lang="pt-br">';
$html .= '<head>';
$html .= '<meta charset="UTF-8">';
$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
$html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$html .= '<link rel="stylesheet" href="css/style.css">';
$html .= '<title>Relatório geral</title>';
$html .= '</head>';
$html .='
<style>
table{
    width:100%
    border: 1px solid black;
    font-size: 14px;
    border-collapse:collapse;
  }
  table td{
    border: 1px solid black;
    padding: 1px 3px
  }
 
  
  </style>
';

if($query == 'bases'){
    $html = '<h2>Lista de todas as bases e agencias</h2>';
    foreach($bases as $base){
        $html .=$base['base_name'].'<br>';
    }    
}elseif($query == 'insumos'){
    $html = '<h2>Lista de todos os insumos</h2>';
    foreach($products as $produto){
        $html .=$produto['name'].'<hr>';
    }    
}elseif($query == 'estok'){
   
    $html .= '<h2>Relatorio de saídas</h2>';
    $html .= '<table>';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td> Produto </td>';
    $html .= '<td> Base </td>';
    $html .= '<td> Quantidade </td>';
    $html .= '<td> Dt saída </td>';
    $html .= '</tr>';
    $html .= '</thead>';
    foreach($outSelect as $out){
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$out['product'].'</td>';
        $html .= '<td>'.$out['base'].'</td>';
        $html .= '<td>'.$out['amount'].'</td>';
        $html .= '<td>'.invertDate( $out['exit_date']).'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        
    }    
    $html .='</table>';
}
$codigo4 = false;
if($codigo4){
    $html = '<h2>Lista de todas as bases e agencias</h2>';
    foreach($bases as $base){
        $html .=$base['base_name'].'<br>';
    }    
}




$donpdf = new Dompdf;
$donpdf->loadHtml($html);
$donpdf->setPaper('A4','portrait');
$donpdf->render();
// Attachment = true abre o dialogo do navegador para baixar o arquivo
// Attachment = false abre o pdf direto no navegador
$donpdf->stream('relatorio.pdf',array('Attachment'=>false));

$html .= '</body>';
$html .= '</html>';

?>