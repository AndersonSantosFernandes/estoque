<?php include_once("templates/header.php");

include_once("verify_login.php");

?>

<div class="container">
    <h1>Alterar senha</h1>
    <div class="col-md-10 offset-1  registration">
        <form class="form-cad" action="user_process.php" method="post">
            <input  type="hidden" name="action" value="update-pass">
            <input type="hidden" name="email" value="<?php echo $user_log;?>">
            <div>
                <input class="puts" type="pssword" name="passsword" id="" placeholder="Digite uma senha">
            </div>
            <div>
                <input class="puts" type="pssword" name="confirmPasssword" id="" placeholder="Confirme a senha">
            </div>

            <input type="submit" value="Alterar senha">
        </form>

    </div>

</div>

<?php include_once("templates/footer.php") ?>