<?php
$msg = $_GET['msg'] ?? 0;
if($msg > 0){
    echo 'EMAIL NÃO REGISTRADO OU INVÁLIDO.';
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
        <label>Informe o email: <input name='email' type="email" placeholder="email"></label><br>
        <input type="hidden" name='msg' value='r'>
        <button>ENVIAR</button>
    </form>
</body>
</html>