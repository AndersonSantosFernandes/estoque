<?php 

require_once("conexao.php");
require_once("queries.php");
require_once("vendor/autoload.php");

$query = filter_input(INPUT_GET,"query");

if(!$query){
header("location:initial.php");
}

use Dompdf\Dompdf;


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
    $html = '<h2>Relatorio de saídas</h2>';
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
        $html .= '<td>'.$out['base'].'  </td>';
        $html .= '<td>'.$out['amount'].'  </td>';
        $html .= '<td>'.invertDate( $out['exit_date']).'  </td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .='<br>';
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
$donpdf->stream('relatorio.pdf',array('Attachment'=>false));

?>