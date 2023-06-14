<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("queries.php");
?>

<div class="container">
    <h1>Reposição de estoque</h1>

    <div class="col-md-10 offset-1  registration">

    <?php if($permU == 1):?>

        <form class="form-cad" action="user_process.php" method="post">
            <input type="hidden" name="action" value="replacement-prod">
            <input type="hidden" name="user" value="<?= $user_name ?>">
            <?php if ($permC == 1): ?>
            <?php else: ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <label for="item">Insumo</label>
                    </div>

                    <select class="puts" name="item" id="insum">
                        <option value="">Selecione</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product["name"] ?>"><?= $product["name"] ?> - Qt:<?= $product["amount"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <br>
                    <div>
                        <label for="qt_exit">Quantidade</label>
                    </div>
                    <div>
                        <input class="puts" type="number" name="qt_exit" id="" placeholder="Quantidade para reposição" min="1">
                    </div>
                </div>
                
                <hr>
                <br>
                <div class="col-md-10 offset-1">
                   
                    <input class="puts" type="submit" value="Salvar">
                </div>

            </div>

        </form>
        <?php else:?>
        
            <h1>Você não pode fazer alterações nesta tela</h1>
            <?php endif;?>
        

    </div>

</div>

<?php include_once("templates/footer.php") ?>