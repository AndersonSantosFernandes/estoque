<?php 
include_once("templates/header.php");
include_once("conexao.php");
include_once("permitions.php");

if($_GET['a'] == 1){
    $admin = "checked";
   
}else{
    $admin = "";
}
if($_GET['c'] == 1){
    $create = "checked";
      
}else{
    $create = "";
}
if($_GET['r'] == 1){
    $read = "checked";
      
}else{
    $read = "";
}
if($_GET['u'] == 1){
    $update = "checked";
      
}else{
    $update = "";
}
if($_GET['d'] == 1){
    $delete = "checked";
      
}else{
    $delete = "";
}
$email = $_GET['email'];

?>

<div class="container">
    <h1>Alterar permissões</h1>
    <div class="col-md-10 offset-1 registration">

    <?php if($perm == 1):?>

        <form class="form-cad" action="user_process.php" method="post">
            
            <input type="hidden" name="action" value="update-permitions">
           
            <div>
                <input class="puts" type="email" name="email" id="" readonly value="<?= $email?>">
            </div>
           
            <hr>

            <h3 class="tite">Permissões</h3>

            <div class="row">

                <div class="col-md-2 offset-1 permition-check">   
                    <label for="admin">Administrador?</label>                 
                    <input type="checkbox" name="admin" id="" <?= $admin?>>
                </div>

                <div class="col-md-2 permition-check">     
                <label for="create">Criar</label>               
                    <input type="checkbox" name="create" id="" <?= $create?> >
                </div>

                <div class="col-md-2 permition-check">    
                <label for="read">Consultar</label>                 
                    <input type="checkbox" name="read" id="" <?= $read?> >
                </div>

                <div class="col-md-2 permition-check">    
                <label for="update">Atualizar</label>                
                    <input type="checkbox" name="update" id="" <?= $update?>>
                </div>

                <div class="col-md-2 permition-check">    
                <label for="delete">Excluir</label>                 
                    <input type="checkbox" name="delete" id="" <?= $delete?>>
                    
                </div>

            </div>
            <hr>
            <input class="puts" type="submit" value="Alterar">
            <?php else:?>

                <h1>Só admnistrador pode cadastrar novo usuário</h1>

                <?php endif;?>


        </form>

    </div>


</div>

<?php include_once("templates/footer.php") ?>