<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php require_once 'Conn.php';

    $conn = new Conn();
    $conn->getConn();

    var_dump($conn);

?>
<h1>Cadastrar Usuário</h1>
<form action="" name="CadUsuario" method="post">
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="Digite seu nome"><br><br>
    <label>Email:</label>
    <input type="email" name="email" placeholder="SeuEmail@exemplo.com.br"><br><br>
    <label>Usuário:</label>
    <input type="text" name="usuario" placeholder="Usuário para acessar"><br><br>
    <label>Senha:</label>
    <input type="password" name="senha" placeholder="Senha"><br><br>
    <input type="submit" value="Cadastrar" name="SendCadUser">
</form>

</body>
</html>