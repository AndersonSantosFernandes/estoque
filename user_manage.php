<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("queries.php");


?>

<div class="container">
    <h1>Gerenciar permissões</h1>

    <div class="col-md-10 offset-1  registration">
        <form class="form-cad" action="user_process.php" method="post">
            <input type="hidden" name="action" value="exit-prod">
            <input type="hidden" name="user" value="<?= $user_name ?>">
           
            <div class="row">
                <div class="col-md-12">

                
                <table>
                 <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>e-mail</th>
                        <th>Admin?</th>
                        <th>Criar</th>
                        <th>Ler</th>
                        <th>Atualizar</th>
                        <th>Deletar</th>
                        <th>Altera perm.</th>
                    </tr>
                 </thead>  
                 <tbody>
                 <?php foreach ($useSelect as $useSel): ?>
                        <?php
                        if($useSel['admin'] == 1){
                            $classe = "green";
                        }else{
                            $classe = "red";
                        }

                        if($useSel['permitionC'] == 1){
                            $classeC = "green";
                        }else{
                            $classeC = "red";
                        }

                        if($useSel['permitionR'] == 1){
                            $classeR = "green";
                        }else{
                            $classeR = "red";
                        }

                        if($useSel['permitionU'] == 1){
                            $classeU = "green";
                        }else{
                            $classeU = "red";
                        }

                        if($useSel['permitionD'] == 1){
                            $classeD = "green";
                        }else{
                            $classeD = "red";
                        }
                        ?>                       
                       
                    <tr>
                        
                        <td><?= $useSel["name"] ?></td>
                        <td><?= $useSel["lastName"] ?></td>
                        <td><?= $useSel["email"] ?></td>

                        <td class="<?= $classe ?>"><?= $useSel["admin"] ?></td>
                        <td class="<?= $classeC ?>" ><?= $useSel["permitionC"] ?></td>
                        <td class="<?= $classeR ?>" ><?= $useSel["permitionR"] ?></td>
                        <td class="<?= $classeU ?>" ><?= $useSel["permitionU"] ?></td>
                        <td class="<?= $classeD ?>" ><?= $useSel["permitionD"] ?></td>
                        <td><a href='permitions_edit.php?email=<?= $useSel["email"] ?>&a=<?= $useSel["admin"] ?>&c=<?= $useSel["permitionC"] ?>&r=<?= $useSel["permitionR"] ?>&u=<?= $useSel["permitionU"] ?>&d=<?= $useSel["permitionD"] ?>'>Alterar</a></td>
                        
                    </tr>
                         
                           <?php endforeach; ?>

                           </tbody>
                </table>
                </div>
            </div>

        </form>

    </div>

</div>

<?php include_once("templates/footer.php") ?>