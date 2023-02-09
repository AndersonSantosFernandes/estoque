<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("queries.php");
?>

<div class="container">
    <h1>Controle de Estoque</h1>

    <div class="col-md-10 offset-1  registration">
        <form class="form-cad" action="user_process.php" method="post">
            <input type="hidden" name="action" value="exit-prod">
            <input type="hidden" name="user" value="<?= $user_name ?>">
            <?php if ($permC == 1): ?>
            <?php else: ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <label for="item">Insumo</label>
                    </div>

                    <select class="puts" name="item" id="insum">
                        <option value="">Selecione</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product["name"] ?>"><?= $product["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <br>
                    <div>
                        <label for="qt_exit">Quantidade</label>
                    </div>
                    <div>
                        <input class="puts" type="number" name="qt_exit" id="" placeholder="Quantidade" min="1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <label for="base">Base</label>
                    </div>

                    <select class="puts" name="base" id="bases">
                    <option value="">Selecione</option>
                        <?php foreach ($bases as $base): ?>
                            <option value="<?= $base["base_name"] ?>"><?= $base["base_name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <br>
                    <div>
                        <label for="tipo">Envio/consumo</label>
                    </div>
                    <select class="puts" name="tipo" id="tipo">
                        <option value="00">Selecione</option>
                        <option value="Envio">Envio</option>
                        <option value="Consumo">Consumo</option>

                    </select>

                </div>
                <hr>
                <div class="col-md-10 offset-1">
                    <label for="coment">Observações</label>
                    <textarea name="coment" id="" cols="auto" rows="3"
                        placeholder="Comentário opcional até 200 caracteres" maxlength="200"></textarea>
                    <hr>
                    <input class="puts" type="submit" value="Salvar">
                </div>

            </div>

        </form>

    </div>

</div>

<?php include_once("templates/footer.php") ?>