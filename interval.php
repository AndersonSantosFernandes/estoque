<?php
include_once("templates/header.php");
include_once("verify_login.php");
include_once("permitions.php");
include_once("queries.php");
include_once("models/Message.php");
$message = new Message();
$acao = filter_input(INPUT_GET, "acao");
$acao1 = filter_input(INPUT_POST, "action");
$item = isset($_POST['item']) ? $_POST['item'] : "";
$dtInicio = isset($_POST['dtInicio']) ? $_POST['dtInicio'] : "";
$dtFinal = isset($_POST['dtFinal']) ? $_POST['dtFinal'] : "";
$localMessage = null;
$registers = [];
if ($acao1 === "enter") {
    if ($item && $dtInicio && $dtFinal) {
        if ($dtInicio > $dtFinal) {
            $message->setMessage("Adata inicial não pode sesr maior que a final", "fall");
            header("location:in_out.php");
        } else {
            $stmt = $conn->prepare("SELECT * FROM replace_items WHERE name = :name AND replaceDate BETWEEN :initial AND :final");
            $stmt->bindParam(":name", $item);
            $stmt->bindParam(":initial", $dtInicio);
            $stmt->bindParam(":final", $dtFinal);
            $stmt->execute();
            $registers = $stmt->fetchAll();
            $lines = $stmt->rowCount();
            if ($lines == 0) {
                $localMessage = "Nenhum resultado entre " . invertDate($dtInicio) . " e " . invertDate($dtFinal) . "";
            }
        }
    } else {
        $message->setMessage("Preencha todos os campos", "fall");
        header("location:in_out.php");
    }
} elseif ($acao1 === "out") {
    if ($item && $dtInicio && $dtFinal) {
        if ($dtInicio > $dtFinal) {
            $message->setMessage("Adata inicial não pode sesr maior que a final", "fall");
            header("location:in_out.php");
        } else {
            $stmt = $conn->prepare("SELECT * FROM exit_items WHERE product = :name AND exit_date BETWEEN :initial AND :final");
            $stmt->bindParam(":name", $item);
            $stmt->bindParam(":initial", $dtInicio);
            $stmt->bindParam(":final", $dtFinal);
            $stmt->execute();
            $registers = $stmt->fetchAll();
            $lines = $stmt->rowCount();
            if ($lines == 0) {
                $localMessage = "Nenhum resultado entre " . invertDate($dtInicio) . " e " . invertDate($dtFinal) . "";
            }
        }
    } else {
        $message->setMessage("Preencha todos os campos", "fall");
        header("location:in_out.php");
    }
}
?>
<div class="container ggg">
    <h1>Filtragem por intervalo</h1>
    <?php if ($acao == "enter"): ?>
        <form action="" method="post">
            <input type="hidden" name="action" value="enter">
            <div class="row">
                <div class="col-md-12 center">
                    <h4>Digite um intervalo de datas para entradas</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 center">
                    <input class="puts" type="date" name="dtInicio" id="">
                </div>
                <div class="col-md-2 center">
                    <h1>Até</h1>
                </div>
                <div class="col-md-5 center">
                    <input class="puts" type="date" name="dtFinal" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 center">
                    <select class="puts" name="item" id="insum">
                        <option value="">Selecione</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product["name"] ?>"><?= $product["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-5 center">
                    <input class="puts" type="submit" value="Pesquisar">
                </div>
            </div>
        </form>
        <center>
            <h1>
                <?= $localMessage ?>
            </h1>
        </center>
        <div class="row">
            <div class="col-md-3">
                <h4>INSUMO</h4>
            </div>
            <div class="col-md-2">
                <h4>QT</h4>
            </div>
            <div class="col-md-5">
                <h4>USUÁRIO</h4>
                <hr>
            </div>
            <div class="col-md-2">
                <h4>DATA</h4>
                <hr>
            </div>
        </div>
        <?php foreach ($registers as $registro): ?>
            <div class="row">
                <div class="col-md-3">
                    <h4>
                        <?= $registro['name'] ?>
                    </h4>
                </div>
                <div class="col-md-2">
                    <h4>
                        <?= $registro['amount'] ?>
                    </h4>
                </div>
                <div class="col-md-5">
                    <h4>
                        <?= $registro['user'] ?>
                    </h4>
                    <hr>
                </div>
                <div class="col-md-2">
                    <h4>
                        <?= invertDate($registro['replaceDate']) ?>
                    </h4>
                </div>
            </div>
        <?php endforeach; ?>
    <?php elseif ($acao == "out"): ?>
        <form action="" method="post">
            <input type="hidden" name="action" value="out">
            <div class="row">
                <div class="col-md-12 center">
                    <h4>Digite um intervalo de datas para saídas</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 center">
                    <input class="puts" type="date" name="dtInicio" id="">
                </div>
                <div class="col-md-2 center">
                    <h1>Até</h1>
                </div>
                <div class="col-md-5 center">
                    <input class="puts" type="date" name="dtFinal" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 center">
                    <select class="puts" name="item" id="insum">
                        <option value="">Selecione</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product["name"] ?>"><?= $product["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-5 center">
                    <input class="puts" type="submit" value="Pesquisar">
                </div>
            </div>
        </form>
        <center>
            <h1>
                <?= $localMessage ?>
            </h1>
        </center>
        <div class="row">
            <div class="col-md-2">
                <h4>INSUMO</h4>
            </div>
            <div class="col-md-1">
                <h4>QT</h4>
            </div>
            <div class="col-md-3">
                <h4>USUÁRIO</h4>
                <hr>
            </div>
            <div class="col-md-4">
                <h4>BASE/CORNER</h4>
                <hr>
            </div>
            <div class="col-md-1">
                <h4>DATA</h4>
            </div>
        </div>
        <?php foreach ($registers as $registro): ?>
            <div class="row">
                <div class="col-md-2">
                    <h4>
                        <?= $registro['product'] ?>
                    </h4>
                </div>
                <div class="col-md-1">
                    <h4>
                        <?= $registro['amount'] ?>
                    </h4>
                </div>
                <div class="col-md-3">
                    <h4>
                        <?= $registro['user'] ?>
                    </h4>
                    <hr>
                </div>
                <div class="col-md-4">
                    <h4>
                        <?= $registro['base'] ?>
                    </h4>
                    <hr>
                </div>
                <div class="col-md-1">
                    <h4>
                        <?= invertDate($registro['exit_date']) ?>
                    </h4>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include_once("templates/footer.php") ?>