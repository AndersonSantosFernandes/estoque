<?php include_once("templates/header.php");
include_once("verify_login.php");
include_once("permitions.php");
include_once("queries.php");

$cabecalho = ["nome","entrou","saiu","saldo"];

//abrir o arquivo
$arquivo = fopen("file.csv","w");


//escrever o cabecalho
fputcsv($arquivo, $cabecalho, ";");



//fechar arquivo
fclose($arquivo);


?>

<div class="container ggg">
    <h1>Controle de Estoque</h1>
        <table>
            
        <tr>
            <td>Nome</td>
            <td>Entrou</td>
            <td>Saiu</td>
            <td>Saldo</td>
            </tr>
    <?php foreach ($products as $product): ?>     

        <?php
           
        $stmt2 = $conn->prepare("SELECT SUM(amount) FROM replace_items WHERE name = :name");
        $stmt2->bindParam(":name", $product["name"]);
        $stmt2->execute();
        $montante2 = $stmt2->fetch();
        

        $stmt = $conn->prepare("SELECT SUM(amount) FROM exit_items WHERE product = :name");
        $stmt->bindParam(":name", $product["name"]);
        $stmt->execute();
        $montante = $stmt->fetch();
        

        $stmt3 = $conn->prepare("SELECT * FROM insumos WHERE name = :name");
        $stmt3->bindParam(":name",$product["name"]);
        $stmt3->execute();
        $products3 = $stmt3->fetch();       

        echo' 
           <tr>
            <td>'. $product["name"] .'</td>
            <td>'. $montante2[0].'</td>
            <td>'.$montante[0] .'</td>
            <td>'. $products3[2].'</td>
            </tr>';
        ?>
        
    <?php endforeach; ?>
    </table>
    <a href="relatorio.php?query=estok">Gerar PDF</a>
    <a href="csv.php?query=estok">Gerar CSV</a>
</div>

<?php 

?>


<?php include_once("templates/footer.php") ?>