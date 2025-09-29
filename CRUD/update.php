<?php

$port = isset($_GET['msg']) ?? 0;
if($port == 2){
    echo 'Email inválido ou não cadastrado.';
    $port = 0;
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
    <?php if($port == 0 ):?>
        <form action='execute.php' method="POST">
            <label>informe o email: <input type="email" name='email' placeholder="email"> </label><br>
            <input type="hidden" name='msg' value='u'>
            <button>ENVIAR</button>
        </form>
    <?php elseif($port == 1):?>
        <form>
            <label>NAME: <input type="text" name="name"></label><br>
            <label>LASTNAME: <input type="text" name="lastname"><br></label>
            <label>EMAIL: <input type="email" name='email'><br></label>
            <label>TELEFONE: <input type='tel' name="tell"><br></label>
            <input type="hidden" name ='msg' value='up'>
            <button>ENVIAR</button>
    <?php endif; ?>

</body>
</html>