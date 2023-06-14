<?php 
include_once("templates/header.php");

include_once("verify_login.php");
include_once("permitions.php");
include_once("queries.php");

    if($perm == 1){
        $style = "block";
    }else{
        $style = "none";
    }

?>

    <div class="container">
        
        <h1>Consultar estoque</h1>

        <?php if($permR === 1):?>            
           
        <div class="col-md-10 offset-1  registration">
            <h3>Saldos gerais no estoque</h3>
            <table>
                 <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Saldo</th>
                        <th>Data</th>
                        <th>Usuário que cadastrou</th>
                        <th>Alterar nome</th>
                       
                    </tr>
                 </thead>  
                 <tbody>
                    <?php foreach ($products as $product): ?>                       
                        <tr>                        
                            <td><?= $product["name"] ?></td>
                            <td><?= $product["amount"] ?></td>
                            <td><?= invertDate( $product["inputDate"]) ?></td>
                            <td><?= $product["user"] ?></td>                      
                            <td style="display: <?= $style?> "class="disp"><a href="edit_prod.php?action=edit&id=<?= $product["id"] ?>"> <i class="fas fa-refresh"></i> </a></td>                      
                 
                        </tr>                         
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="relatorio.php?query=insumos">Gerar PDF</a>
        </div>

        <?php else:?>
            
            <h1>Você não tem permissão para trabalhar nessa tela</h1>

            <?php endif;?>
            
    </div>
<?php include_once("templates/footer.php") ?>