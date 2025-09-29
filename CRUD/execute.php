<?php
include_once("pdo.php");

//--------------------- ----->CREATE<------ ------------------------
if($_POST['msg'] == 'c'){
    if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['tell'])){
        $name = trim($_POST['name']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['tell']);

        //CRIANDO E PREPARANDO QUERRY:
        $sql = "INSERT INTO user_date(name, lastname, email, tell) VALUES(:name, :lastname, :email, :tell)";
        $stmt = $pdo->prepare($sql);

        //SETANDO DADOS A QUERRY E EXECUTANDO:
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tell', $telefone);

        $stmt->execute();
        echo 'dados salvos.';

    }else{
        header('location:create.php?msg=1');
        exit;
    }
}

//   ----------------------->READ<----------------------------------
elseif($_POST['msg'] == 'r'){
        $email = trim($_POST['email']);

        //CRIANDO E PREPARANDO A QUERRY:
        $sql = "SELECT * FROM user_date WHERE email = :email";
        $stmt = $pdo->prepare($sql);

        //SETANDO DADOS E EXECUTANDO A BUSCA:
        $stmt->bindParam(":email",$email);
        $stmt->execute();

        //RETORNANDO OS DADOS:
        if($date = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo 'NOME :'.$date['name']."<br>";
            echo 'SOBRENOME :'.$date['lastname'].'<br>';
            echo 'EMAIL :'.$date['email'].'<br>';
            echo 'TELEFONE :'.$date['tell'].'<br>';

        }else{
            header('location:read.php?msg=1');
            exit;
        }
}
// ---------------->UPDATE<---------------------------------------
elseif($_POST['msg'] == 'u'){
    if (!empty($_POST['email'])){
        $email = trim($_POST['email']);
        /**executa a busca no banco de dados.
         * if encontrar o email retorna header('location:update.php?msg=1); exit;
         * senao retornar header('location:update.php?msg=2); exit;**/
    }else{
        header('location:update.php?msg=2');
        exit;
    }
}

// -------------------------->DELETE<----------------------------
elseif($_POST['msg'] == 'd'){
        $email = trim($_POST['email']);

        //CRIANDO E PREPARANDO A QUERRY:
        $sql = "SELECT * FROM user_date WHERE email = :email";
        $stmt = $pdo->prepare($sql);

        //SETANDO DADOS E EXECUTANDO A BUSCA:
        $stmt->bindParam(":email",$email);
        $stmt->execute();

        //RETORNANDO OS DADOS:
        if($date = $stmt->fetch(PDO::FETCH_ASSOC)){
            /**busca no banco de dados o email
         * if encontrado exclui a tupla (retornar para index com mensagem de execução)
            else retorna header('location:delete.php?msg=1'); exit;*/
            echo 'ESTES DADOS FORAM EXLUÍDOS:'.'<br>';
            echo 'NOME :'.$date['name']."<br>";
            echo 'SOBRENOME :'.$date['lastname'].'<br>';
            echo 'EMAIL :'.$date['email'].'<br>';
            echo 'TELEFONE :'.$date['tell'].'<br>';

            $sql = 'DELETE FROM user_date where email = :email';
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':email',$email);
            $stmt->execute();

        }else{
            header('location:delete.php?msg=1');
            exit;
        }
}
elseif($_POST['msg'] == 'up'){
    if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['tell'])){
        $name = trim($_POST['name']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['tell']);
    }
/**opção para execução do update, após receber o novo formulário a ser alterado no banco de dados */
}
?>
