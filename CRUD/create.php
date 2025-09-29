<?php

$erro = isset($_GET['msg']) ?? 0;

if($erro > 0){
    echo 'dados inválidos.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action ='execute.php' method="post">
            <h2>CADASTRO</h4>
            <label>NAME: <input type="text" name="name"></label><br>
            <label>LASTNAME: <input type="text" name="lastname"><br></label>
            <label>EMAIL: <input type="email" name='email'><br></label>
            <label>TELEFONE: <input type='tel' name="tell"><br></label>
            <input type="hidden" name='msg' value='c'>
            <button>REGISTRAR</button>
        </form>
    </div>
</body>
</html>