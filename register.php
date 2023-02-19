<?php include_once("templates/header.php");

include_once("verify_login.php");
include_once("permitions.php");

?>

<div class="container">
    <h1>Cadastrar produto</h1>
    <div class="col-md-10 offset-1  registration">
        <form class="form-cad" action="user_process.php" method="post">
        <?php if($permC == 1):?>

            <input  type="hidden" name="action" value="register-product">
            <input  type="hidden" name="user" value="<?= $user_name?>">
           
            <div>
            <input class="puts" type="text" name="name" id="" placeholder="Nome do produto">
            </div>
            <div>
            <input class="puts" type="number" name="amount" id=""  readonly placeholder="Inserir quantidade em repor estoque">
            </div>
            <input class="puts" type="submit" value="Cadasrtrar">


        <?php else:?>
            
            <h1>Você não tem permissão para incluir produtos </h1>

            <?php endif;?> 

                    </form>

    </div>


</div>

<?php include_once("templates/footer.php") ?>