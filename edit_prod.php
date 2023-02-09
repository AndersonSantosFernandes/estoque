<?php
include_once("templates/header.php");
include_once("queries.php");

?>

<div class="container">
    <h1>Editar produtos</h1>
    <div class="col-md-10 offset-1 registration">
        <div class="row">
            <div class="col-md-3 editcol">
                <form action="user_process.php" method="post">
                    <input type="hidden" name="action" value="edit_price">
                    <input type="submit" class="edit" value="Editar Preço">
                </form>
            </div>
            <div class="col-md-3 editcol">
                <form action="user_process.php" method="post">
                    <input type="hidden" name="action" value="edit_name">
                    <input type="submit" class="edit" value="Editar nome">
                </form>
            </div>
            <div class="col-md-3 editcol">
                <form action="user_process.php" method="post">
                    <input type="hidden" name="action" value="delete_prod">
                    <input type="submit" class="edit" value="Deletar Ítem">
                </form>
            </div>
            <div class="col-md-3 editcol">
                <form action="user_process.php" method="post">
                    <input type="hidden" name="action" value="edit_price">
                    <input type="submit" class="edit" value="Botão 1">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <select class="puts" name="item" id="insum">
                        <option value="">Selecione</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product["name"] ?>"><?= $product["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
            <div class="col-md-6">
                <form action="" method="post">
                    <select class="puts" name="item" id="insum">
                        <option value="">Selecione</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product["name"] ?>"><?= $product["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include_once("templates/footer.php") ?>