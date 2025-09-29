<?php
$name = '';
$lastname ='';
$email;
$telefone;

if($_POST['msg'] == 'c'){
    if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['tell'])){
        $name = trim($_POST['name']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['tell']);
        echo 'dados salvos.';
    }else{
        header('location:create.php?msg=1');
        exit;
    }
}
elseif($_POST['msg'] == 'r'){
    $email = trim($_POST['email']);
    echo 'dados serão retornados.';
}
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
elseif($_POST['msg'] == 'd'){
    if (!empty($_POST['email'])){
        $email = trim($_POST['email']);
        /**busca no banco de dados o email
         * if encontrado exclui a tupla (retornar para index com mensagem de execução)
            else retorna header('location:delete.php?msg=1'); exit;*/
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