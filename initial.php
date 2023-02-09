<?php include_once("templates/header.php");
include_once("verify_login.php");
include_once("permitions.php");


?>

<div class="container">
    <h1>Controle de Estoque</h1>

    <div class="row">
        <div class="col-md-4 act">
           <a href="replacement.php"><button class="btn-actions">Reposição de estoque</button></a> 
        </div>
        <div class="col-md-4 act">
        <a href="exped.php"><button class="btn-actions">Saída de insumos</button></a> 
        </div>
        <div class="col-md-4 act">
        <a href="stock.php"><button class="btn-actions">Consultar estoque</button></a> 
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4 act">
        <a href="register.php"><button class="btn-actions">Cadastrar produto</button></a> 
        </div>
        <div class="col-md-4 act">
        <a href="edit_prod.php"><button class="btn-actions">Editar Produto</button></a> 
        </div>
        <div class="col-md-4 act">
        <a href="register_base.php"><button class="btn-actions">Cadastrar destinatário</button></a> 
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4 act">
        <a href="in_out.php"><button class="btn-actions">Entrada e saída</button>
        </div>
        <div class="col-md-4 act">
        <a href="newUser.php"><button class="btn-actions">Cadsatra usuário</button>
        </div>
        <div class="col-md-4 act">
        <a href="setpass.php"><button class="btn-actions">Alterar senha</button>
        </div>
        
    </div>
   
   
</div>

<?php include_once("templates/footer.php") ?>