<?php
include_once("pdo.php");

$option = $_POST['msg'];
$email = trim($_POST['email']);

function sourcemail($email){
    global $pdo;

    //CRIANDO E PREPARANDO A QUERRY:
    $sql = "SELECT * FROM userdb WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    //SETANDO DADOS E EXECUTANDO A BUSCA:
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    //RETORNANDO OS DADOS CASO EXISTAM:
    if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo 'NOME :'.$data['name']."<br>";
        echo 'SOBRENOME :'.$data['lastname'].'<br>';
        echo 'EMAIL :'.$data['email'].'<br>';
        echo 'TELEFONE :'.$data['tell'].'<br>';
        return true;
    }else{
        return false;
    }
};

//--------------------- ----->CREATE<------ ------------------------
if($option == 'c'){
    if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['tell'])){
        $name = trim($_POST['name']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['tell']);

        //CRIANDO E PREPARANDO QUERRY:
        $sql = "INSERT INTO userdb(name, lastname, email, tell) VALUES(:name, :lastname, :email, :tell)";
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
elseif($option == 'r'){
    if(sourcemail($email)){
        echo 'Dados Encontrados.';
    }else{
        header('location:read.php?msg=1');
        exit;
    }
}
// ---------------->UPDATE<---------------------------------------
elseif($option == 'u'){
    if(sourcemail($email)){
        header("location:update.php?msg=1&email=$email");
        exit;
    }else{
        header('location:update.php?msg=2');
        exit;
    }
}

// -------------------------->DELETE<----------------------------
elseif($option == 'd'){
    if(sourcemail($email)){
        $sql = 'DELETE FROM userdb where email = :email';
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email',$email);
        $stmt->execute();

        echo 'DADOS EXCLUÍDOS.';

    }else{
        header('location:delete.php?msg=1');
        exit;
    }
}
elseif($option == 'u2'){
    if(!empty($_POST['email']) && !empty($_POST['tell'])){
        $email = trim($_POST['email']);
        $telefone = trim($_POST['tell']);
        $emailoriginal = $_POST['oriemail'];
        
        $sql = "UPDATE userdb SET email = :email, tell = :tell WHERE email = :original_email";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tell', $telefone);
        $stmt->bindParam(':original_email', $emailoriginal);
        $stmt->execute();

        $rowcount = $stmt->rowcount();

        if($rowcount > 0){
            echo 'DADOS ATUALIZADOS.'.'<br>';
        }else{
            echo 'NÃO HOUVE ALTERAÇÃO NOS DADOS.'.'<br>';
        };
        sourcemail($email);
        
    }else{
        header('location:update.php?msg=3');
        exit;
    }
};
?>