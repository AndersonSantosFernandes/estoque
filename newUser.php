<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("permitions.php");

?>

<div class="container">
    <h1>Cadastrar novo usuário</h1>
    <div class="col-md-10 offset-1 registration">

        <?php if ($perm == 1): ?>

            <form class="form-cad" action="user_process.php" method="post">

                <input type="hidden" name="action" value="create">
                <div>
                    <input class="puts" type="text" name="name" id="" placeholder="Digite um nome">
                </div>
                <div>
                    <input class="puts" type="text" name="lastName" id="" placeholder="Digite um sobrenome">
                </div>
                <div>
                    <input class="puts" type="email" name="email" id="" placeholder="Digite um email">
                </div>
                <div>
                    <input class="puts" type="pssword" name="passsword" id="" placeholder="Digite uma senha">
                </div>
                <div>
                    <input class="puts" type="pssword" name="confirmPasssword" id="" placeholder="Confirme a senha">
                </div>
                <hr>

                <h3 class="tite">Permissões <a href="user_manage.php">Gerenciar permissões</a> </h3>

                <div class="row">

                    <div class="col-md-2 offset-1 permition-check">
                        <label for="admin">Administrador?</label>
                        <input type="checkbox" name="admin" id="">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="create">Criar</label>
                        <input type="checkbox" name="create" id="">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="read">Consultar</label>
                        <input type="checkbox" name="read" id="">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="update">Atualizar</label>
                        <input type="checkbox" name="update" id="">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="delete">Excluir</label>
                        <input type="checkbox" name="delete" id="">
                    </div>

                </div>
                <hr>
                <input class="puts" type="submit" value="Cadastrar">
            <?php else: ?>

                <h1>Só admnistrador pode cadastrar novo usuário</h1>

            <?php endif; ?>


        </form>

    </div>


</div>

<?php include_once("templates/footer.php") ?>