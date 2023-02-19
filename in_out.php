<?php
 include_once("templates/header.php");
include_once("verify_login.php");
include_once("permitions.php");
include_once("queries.php");

$view = $viewSelect['action1']

?>

<div class="container ggg">
    <h1>Entradas e saídas</h1>
    <form class="form-cad" action="" method="post">
        <input type="hidden" name="action" value="change_list">
             <!-- #region -->
        <div class="row">
            <div class="col-md-6 list-in" >
                <button type="submit" class="puts" > <a href="user_process.php?change=out&action=change_list">Relatório de saídas</a> </button>
            </div>
            <div class="col-md-6 list-in">
                 <button type="submit" class="puts"> <a href="user_process.php?change=in&action=change_list">Relatório de entradas</a> </button>
            </div>
        </div>

           
       
            <div class="row">
            <div class="col-md-12 list-in">

                <?php if($view == "in"):?>
                    
                <!-- Tabela lista de entradas -->
                <div class="row list-in">
                    <div class="col-md-6 ">
                        <h4>Relatório de entradas</h4>
                    </div>
                    <div class="col-md-6">
                        <button class="puts"><a href="interval.php?acao=enter">Entre datas</a></button>
                    </div>
                </div>

                <table>
                 <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Adicionado</th>                       
                        <th>Data</th>
                        <th>Usuário</th>                        
                    </tr>
                 </thead>  
                 <tbody>
                 <?php foreach ($inSelect as $inSel): ?>                      
                        
                    <tr>                        
                        <td><?= $inSel["name"] ?></td>
                        <td><?= $inSel["amount"] ?></td>
                        <td><?= invertDate($inSel["replaceDate"]) ?></td>
                        <td><?= $inSel["user"] ?></td>                        
                    </tr>                         
                           <?php endforeach; ?>
                           </tbody>
                </table>

                    <?php elseif($view == "out"):?>

                <!-- Tabela lista de saídas -->
                
                <div class="row list-in">
                    <div class="col-md-6 ">
                        <h4>Relatório de Saídas</h4>
                    </div>
                    <div class="col-md-6">
                    <button class="puts"><a href="interval.php?acao=out">Entre datas</a></button>
                  
                    </div>
                </div>
              
                
                <table>
                 <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Destino</th>
                        <th>Quantidade</th>                        
                        <th>Observação</th>
                        <th>Tipo ação</th>
                        <th>Usuário</th>
                        <th>Data</th>
                        
                    </tr>
                 </thead>  
                 <tbody>
                 <?php foreach ($outSelect as $outSel): ?>                                       
                       
                    <tr>                        
                        <td><?= $outSel["product"] ?></td>
                        <td><?= $outSel["base"] ?></td>
                        <td><?= $outSel["amount"] ?></td>                        
                        <td><?= $outSel["coment"] ?></td>
                        <td><?= $outSel["int_out"] ?></td>
                        <td><?= $outSel["user"] ?></td>
                        <td><?= invertDate( $outSel["exit_date"]) ?></td>                      
                    </tr>
                         
                           <?php endforeach; ?>
                           </tbody>
                </table>

                <?php endif;?>

             </div>       
        </div>
    </form>
    

</div>

<?php include_once("templates/footer.php") ?>