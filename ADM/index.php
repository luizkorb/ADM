<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
</head>
<body>

<?php
// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=seu_host;dbname=sua_base_de_dados", "seu_usuario", "sua_senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Consulta SQL para obter dados dos usuários
$comando = $pdo->prepare("SELECT * FROM cadastro_bombeiro");
$comando->execute();
?>

<!-- Exibir os dados em uma tabela HTML -->
<table border='1'>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Telefone</th>
        <th>CPF</th>
        <th>Usuário</th>
    </tr>

<?php
while ($linhas = $comando->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
        <td>{$linhas['nome']}</td>
        <td>{$linhas['email']}</td>
        <td>{$linhas['senha']}</td>
        <td>{$linhas['telefone']}</td>
        <td>{$linhas['cpf']}</td>
        <td>{$linhas['usuario']}</td>
    </tr>";
}
?>

</table>

</body>
</html>