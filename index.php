<?php include_once("templates/header.php") ?>

<div class="container">
    <h1>Controle de Estoque</h1>

    <div class="row">
        <div class="col-md-6 offset-3 login" >
            <div class="in">
            <h3>Faça seu login</h3><br>
               <form action="authenticate.php" method="post">
                
                <div>
                    <label for="mail"> <i class="fas fa-envelope"></i>  </label>
                    <input type="email" name="email" id="mail" placeholder="Digite se e-mail">
                </div>
                <div>
                    <label for="pass"> <i class="fas fa-key"></i>  </label>
                    <input type="password" name="password" id="pass" placeholder="Digite sua senha">
                </div>
                <i class="fas fa-sign-in"></i>
                <input type="submit" value="Entrar">

               </form>
            </div>
             
        </div>
    </div>
    
</div>

<?php include_once("templates/footer.php") ?>