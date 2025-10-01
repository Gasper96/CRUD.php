<?php

$erro = $_GET['msg'] ?? 0;

if($erro > 0){
    echo 'dados inválidos.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <form action ='execute.php' method="post">
            <h2>CADASTRO</h4>
            <label>NAME: <input type="text" name="name"></label><br>
            <label>LASTNAME: <input type="text" name="lastname"><br></label>
            <label>EMAIL: <input type="email" name='email' placeholder="xxx@xxx.com"><br></label>
            <label>TELEFONE: <input type='tel' name="tell" placeholder="xxxxxxxxxxx"><br></label>
            <input type="hidden" name='msg' value='c'>
            <button>REGISTRAR</button>
        </form>
        <form action="index.php">
            <button>VOLTAR</button>
        </form>
    </div>
</body>
</html>