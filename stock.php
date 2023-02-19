<?php include_once("templates/header.php");

include_once("verify_login.php");
include_once("permitions.php");
include_once("queries.php");

?>

    <div class="container">
        
        <h1>Consultar estoque</h1>

        <div class="col-md-10 offset-1  registration">
            <h3>Saldos gerais no estoque</h3>
            <table>
                 <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Saldo</th>
                        <th>Data</th>
                        <th>Usuário que cadastrou</th>
                       
                    </tr>
                 </thead>  
                 <tbody>
                    <?php foreach ($products as $product): ?>                       
                        <tr>                        
                            <td><?= $product["name"] ?></td>
                            <td><?= $product["amount"] ?></td>
                            <td><?= invertDate( $product["inputDate"]) ?></td>
                            <td><?= $product["user"] ?></td>                      
                        </tr>                         
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once("templates/footer.php") ?>