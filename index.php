<?php include_once("templates/header.php") ?>

<div class="container">
    <h1>Controle de Estoque</h1>

    <div class="row">
        <div class="col-md-6 offset-3 login" >
            <div class="in">
            <h3>Faça seu login</h3><br>
               <form action="authenticate.php" method="post">
                
                <div>
                    <input type="email" name="email" id="" placeholder="Digite se e-mail">
                </div>
                <div>
                    <input type="password" name="password" id="" placeholder="Digite sua senha">
                </div>

                <input type="submit" value="Entrar">

               </form>
            </div>
             
        </div>
    </div>
    
</div>

<?php include_once("templates/footer.php") ?>