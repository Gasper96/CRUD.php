<?php

$port = $_GET['msg'] ?? 0;

if($port == 3){
    echo 'Dados Inválidos.';
    $port = 0;
}

if($port == 2){
    echo 'Email inválido ou não cadastrado.';
    $port = 0;

}elseif($port == 1){
    require_once "pdo.php";
    $email = $_GET['email'];
    
    $sql = "SELECT * FROM userdb WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    //SETANDO DADOS E EXECUTANDO A BUSCA:
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upadate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if($port == 0 ):?>
        <form action='execute.php' method="POST">
            <label>informe o email: <input type="email" name='email' placeholder="email"> </label><br>
            <input type="hidden" name='msg' value='u'>
            <button>ENVIAR</button>
        </form>
        <form action="index.php">
            <button>VOLTAR</button>
        </form>
    <?php elseif($port == 1):?>
        <form action="execute.php" method="post">
            <h3>INSIRA OS NOVOS DADOS PARA A ALTERAÇÃO:</h3>
            <label>NAME:  <?= $data['name']; ?></label><br>
            <label>LASTNAME: <?= $data['lastname'] ?><br></label>
            <label>EMAIL: <input type="email" name='email'><br></label>
            <label>TELEFONE: <input type='tel' name="tell"><br></label>
            <input type='hidden' name ='msg' value="u2">
            <input type="hidden" name="oriemail" value='<?= $email ?>'>
            <button>ENVIAR</button>
        </form>
    <?php endif; ?>

</body>
</html>