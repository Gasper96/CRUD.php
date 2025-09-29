<?php

$erro = isset($_GET['msg']) ?? 0;
if($erro > 0 ){
    echo 'email inválido ou não registrado.';
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
    <form action='execute.php' method="POST">
        <label>informe o email: <input type="email" name='email' placeholder="email"> </label><br>
        <input type="hidden" name='msg' value='d'>
        <button>ENVIAR</button>
    </form>
</body>
</html>