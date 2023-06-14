<?php

include_once("models/Message.php");
require_once("global.php");
include_once("conexao.php");

$message = new Message($BASE_URL);

/*Cadastro de usuários */
$action = filter_input(INPUT_POST, "action");
$name = filter_input(INPUT_POST, "name");
$lastName = filter_input(INPUT_POST, "lastName");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "passsword");
$confirmPassword = filter_input(INPUT_POST, "confirmPasssword");
$admin = filter_input(INPUT_POST, "admin");
$create = filter_input(INPUT_POST, "create");
$read = filter_input(INPUT_POST, "read");
$update = filter_input(INPUT_POST, "update");
$delete = filter_input(INPUT_POST, "delete");




/*Cadástro de produtos */
$amount = filter_input(INPUT_POST, "amount");


/*Cadasttrar destino, exped*/
$base = filter_input(INPUT_POST, "base");

/* exped*/
$item = filter_input(INPUT_POST, "item");
$tipo = filter_input(INPUT_POST, "tipo");
$coment = filter_input(INPUT_POST, "coment");
$user = filter_input(INPUT_POST, "user");
$qt_exit = filter_input(INPUT_POST, "qt_exit");
$id = filter_input(INPUT_POST, "id");


/* */
$list = filter_input(INPUT_GET, "change");
$lista = filter_input(INPUT_GET, "action");



if($list == "in"){
    $view = "in";
}elseif("$list == out"){
    $view = "out";
}





if ($admin == null) {
    $padm = 0;
} else {
    $padm = 1;
}
if ($create == null) {
    $pcreate = 0;
} else {
    $pcreate = 1;
}
if ($read == null) {
    $pread = 0;
} else {
    $pread = 1;
}
if ($update == null) {
    $pupdate = 0;
} else {
    $pupdate = 1;
}
if ($delete == null) {
    $pdelete = 0;
} else {
    $pdelete = 1;
}

       if($action === "create") {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $message->setMessage("O email " . $email . " já está em uso. Tente com outro", "fall");
    } else {

        if ($name && $lastName && $email && $password) {

            if ($password === $confirmPassword) {

                $stmt = $conn->prepare("INSERT INTO users(name, lastName, email, pass, admin, permitionC, permitionR, permitionU, permitionD, inputDate)
            VALUES(:name, :lastName,  :email, md5(:pass),  :admin,  :permitionC, :permitionR,  :permitionU,  :permitionD, CURRENT_DATE);");

                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":lastName", $lastName);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":pass", $password);
                $stmt->bindParam(":admin", $padm);
                $stmt->bindParam(":permitionC", $pcreate);
                $stmt->bindParam(":permitionR", $pread);
                $stmt->bindParam(":permitionU", $pupdate);
                $stmt->bindParam(":permitionD", $pdelete);

                $stmt->execute();

                $message->setMessage("show muleque", "win");
            } else {
                $message->setMessage("Seu burro, as senhas não sao iguais ainda", "fall");
            }
        } else {
            $message->setMessage("Seu burro preencha todos os campos", "fall");
        }
    }
    header("location:newUser.php");
} elseif ($action === "update-pass") {
    if ($password && $confirmPassword && $email) {
        //Se vierem as duas senhas

        if ($password === $confirmPassword) {
            //Se as senhas forem iguais
            //Aqui vem o executável

            $stmt = $conn->prepare("UPDATE users SET pass = md5(:pass) WHERE email = :email");

            $stmt->bindParam(":pass", $password);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $message->setMessage("Muito bem, senha alterada", "win");
        } else {
            // Se as senhas forem diferentes
            $message->setMessage("As senhas não conferem", "fall");
        }

    } else {
        //Se vier apenas uma
        $message->setMessage("Preencha os dois campos", "fall");
    }
    header("location:setpass.php");
} elseif ($action === "register-product") {

    $stmt = $conn->query("SELECT * FROM insumos WHERE name = '$name'");
    $stmt->execute();
    $lines = $stmt->rowCount();

   
    if($lines == 1){
        $message->setMessage("Já existe um produto com o nome $name!", "fall");
    }else{

        if ($name) {
            $amount = 0;

            if (!is_int($amount)) {
                //Se digitar valor menor que 1
                $message->setMessage("Não digite valores negativos", "fall");
            } else {
                
                //Campos necessários preenchidos
                $stmt = $conn->prepare("INSERT INTO insumos ( name, amount, inputDate, user)
                VALUES(:name, :amount, CURRENT_DATE, :user)");


                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":amount", $amount);
                $stmt->bindParam(":user", $user);
                $stmt->execute();

                $message->setMessage("Produto cadastrado com sucesso", "win");
            }

        } else {
            //Algum campo incompleto
            $message->setMessage("Preencha os campos obrigatórios", "fall");
        }
    }

    header("location: register.php");

} elseif ($action === "register-base") {

    if ($base) {

        $stmt = $conn->prepare("INSERT INTO bases(base_name) VALUES(:base_name)");
        $stmt->bindParam(":base_name", $base);
        $stmt->execute();

        $message->setMessage("Base cadastrada com sucesso", "win");
    } else {
        $message->setMessage("Insira um nome de base", "fall");
    }

    header("location: register_base.php");
} elseif ($action === "exit-prod") {

    if ($item && $base && $qt_exit && $tipo && $user) {

        $stmtSel = $conn->prepare("SELECT amount FROM insumos  WHERE name = :name");
        $stmtSel->bindParam(":name", $item);
        $stmtSel->execute();
        $qt = $stmtSel->fetch();

        if ($qt_exit > $qt["amount"]) {
            //Se a quantidade de saída for maior que a do estoque

            $message->setMessage("Saldo insuficiente para esta saída. Verificar estoque", "fall");

        } else {

            $update_balance = $qt["amount"] - $qt_exit;

            $stmt = $conn->prepare("INSERT INTO exit_items(product, base, amount, exit_date, coment, int_out, user)
            VALUES (:product, :base, :amount, CURRENT_DATE , :coment, :int_out, :user)");

            $stmt->bindParam(":product", $item);
            $stmt->bindParam(":base", $base);
            $stmt->bindParam(":amount", $qt_exit);
            $stmt->bindParam(":coment", $coment);
            $stmt->bindParam(":int_out", $tipo);
            $stmt->bindParam(":user", $user);

            $stmt->execute();

            $stmtUpdate = $conn->prepare("UPDATE `insumos` SET `amount` = :amount WHERE name = :name");
            $stmtUpdate->bindParam(":amount", $update_balance);
            $stmtUpdate->bindParam(":name", $item);
            $stmtUpdate->execute();

            $message->setMessage("Saída efetivada com sucesso", "win");
        }




    } else {
        $message->setMessage("Preencha todos os dados corretamente", "fall");
    }
    header("location: exped.php");
} elseif ($action === "replacement-prod"){

    if($item && $qt_exit){

        $stmtSel = $conn->prepare("SELECT amount FROM insumos  WHERE name = :name");
        $stmtSel->bindParam(":name", $item);
        $stmtSel->execute();
        $qt = $stmtSel->fetch();

        $update_balance = $qt["amount"] + $qt_exit;

        $stmtUpdate = $conn->prepare("UPDATE `insumos` SET `amount` = :amount WHERE name = :name");
        $stmtUpdate->bindParam(":amount", $update_balance);
        $stmtUpdate->bindParam(":name", $item);
        $stmtUpdate->execute();


        $stmtReport = $conn->prepare("INSERT INTO replace_items(name, amount, replaceDate, user) 
        VALUES (:name, :amount, CURRENT_DATE, :user)");

        $stmtReport->bindParam(":name", $item);
        $stmtReport->bindParam(":amount", $qt_exit);
        $stmtReport->bindParam(":user", $user);

        $stmtReport->execute();    

        $message->setMessage("Saldo atualizado com sucesso", "win");
    }else{
        $message->setMessage("Prencha os dois campos", "fall");
    }
    
    header("location:replacement.php");
} elseif ($action === "update-permitions"){


    $stmt = $conn->prepare("UPDATE users SET admin = :admin, permitionC = :create, permitionR = :read, permitionU = :update, permitionD = :delete   WHERE email =:email");

    $stmt->bindParam(":admin", $padm);
    $stmt->bindParam(":create", $pcreate);
    $stmt->bindParam(":read", $pread);
    $stmt->bindParam(":update", $pupdate);
    $stmt->bindParam(":delete", $pdelete);
    $stmt->bindParam(":email", $email);

    $stmt->execute();


    $message->setMessage("Permissões alteradas com sucesso", "win");
    header("location:user_manage.php");
} elseif ($lista === "change_list"){

    $stmtChange = $conn->prepare("UPDATE actions SET action1 = :action1");
    $stmtChange->bindParam(":action1", $view );
    $stmtChange->execute();
    $changeView = $stmtChange->fetch();    
    // $message->setMessage("Alista foi alterada", "win");
    header("location:in_out.php");
} elseif ($action === "edit_price"){
    
    $message->setMessage("Opção editar preço", "win");
    header("location:edit_prod.php");

} elseif ($action == "editar"){
    
$stmt = $conn->prepare("UPDATE insumos SET name = :name WHERE id = :id" );
$stmt->bindParam(":name",$name);
$stmt->bindParam(":id",$id);
$stmt->execute();


    $message->setMessage("Nome alterado com sucesso", "win");
    header("location:stock.php");
    
} elseif ($action === "delete_prod"){
    
    $message->setMessage("Opção deletar ítem", "win");
    header("location:edit_prod.php");
} 



?>