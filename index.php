<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php require_once './Conn.php';

$conn = new Conn();
$conn->getConn();

$email = "cleonildojunior@hotmail.com";
$usuario = "cleu";
$senha = "12345";


try {
    $result_cadastra = "INSERT INTO usuarios (email, usuario, senha, created) VALUES (:email, :usuario, :senha, NOW())";
    $cadastrar = $conn->getConn()->prepare($result_cadastra);
    $cadastrar->bindParam(':email', $email, PDO::PARAM_STR);
    $cadastrar->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $cadastrar->bindParam(':senha', $senha, PDO::PARAM_STR);

    $cadastrar->execute();
    if ($cadastrar->rowCount()):
        echo "Cadastrado com Sucesso";
    endif;

}catch(Exception $ex){


}


//    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//    var_dump($dados);
//
//    if (!empty($dados['SendCaduser'])):
//        unset($dados['SendCadUser']);
//    endif;

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