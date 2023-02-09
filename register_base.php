<?php include_once("templates/header.php");

include_once("verify_login.php");
include_once("permitions.php");

?>

<div class="container">
    <h1>Cadastrar bases</h1>
    <div class="col-md-10 offset-1  registration">
        <form class="form-cad" action="user_process.php" method="post">
        <?php if($permC == 1):?>

            <input  type="hidden" name="action" value="register-base">
                       
            <div>
            <input class="puts" type="text" name="base" id="" placeholder="Nome da base" autofocus>
            </div>
            
            <input class="puts" type="submit" value="Cadasrtrar">


        <?php else:?>
            
            <h1>Você não tem permissão para incluir novas bases </h1>

            <?php endif;?> 

                    </form>

    </div>


</div>

<?php include_once("templates/footer.php") ?>