<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("queries.php");
include_once("models/Message.php");

$message = new Message();


$id = filter_input(INPUT_GET,"id");

$stmt = $conn->prepare("SELECT * FROM insumos WHERE id = :id");
$stmt->bindParam(":id",$id);
$stmt->execute();
$registers = $stmt->fetch();



?>

<div class="container ggg">
    <h1>Editar produtos</h1>
    <?php if ($perm == 1 && $permU == 1): ?>
        <form action="user_process.php" method="post">
        <input type="hidden" name="action" value="editar">
        
            <div class="row">
                <div class="col-md-3 offset-2"><label for="id">Número ID:</label></div>
                <div class="col-md-5 "><input class="puts" type="text" name="id" id="id" value="<?= $registers['id'] ?>" readonly></div>
            </div>

            <div class="row">
                <div class="col-md-3 offset-2 "> <label for="name">Descrição:</label> </div>
                <div class="col-md-5 "> <input class="puts" type="text" name="name" id="name" value="<?= $registers['name'] ?>" readonly> </div>
            </div>

            <div class="row">
                <div class="col-md-3 offset-2"> <label for="id">Quantidade:</label> </div>
                <div class="col-md-5 "> <input class="puts" type="text" name="amount" id="amount" value="<?= $registers['amount'] ?>" readonly> </div>
            </div>

            <div class="row">
                <div class="col-md-3 offset-2"> <label for="id">Quem cadastrou:</label> </div>
                <div class="col-md-5 "> <input class="puts" type="text" name="user" id="user" value="<?= $registers['user'] ?>" readonly> </div>
            </div>

            <div class="row">
                <div class="col-md-3 offset-2"> <label for="id">Data cadástro:</label> </div>
                <div class="col-md-5 " > <input class="puts" type="text" name="date" id="date" value="<?= invertDate($registers['inputDate']) ?>" readonly> </div>
            </div>
            <br>
            <div class="col-md-2 offset-5">
            <input class="puts" type="submit" value="Atualizar">
            </div>
            
        


        </form>
    <?php else: ?>

    <h1>Voçê nã tem permissão para editar </h1>

    <?php
     $message->setMessage("Voçê não pode fazer esse tipo de alteração <a href=''> X</a>","fall");
    header("location:stock.php");
    ?>
    
    <?php endif; ?>
</div>
<?php include_once("templates/footer.php") ?>