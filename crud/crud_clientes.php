<?php
require '../util/conexao.php';

/*
echo ('<pre>');
print_r($_POST);
exit();
*/

$operacao_cliente = (isset($_POST['operacao_cliente'])) ? $_POST['operacao_cliente'] : "";
$nome = (isset($_POST['nome'])) ? $_POST['nome'] : "";
$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$celular = (isset($_POST['celulat'])) ? $_POST['celular'] : "";
$data_nascimento = (isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : "";
$rua = (isset($_POST['rua'])) ? $_POST['rua'] : "";
$numero = (isset($_POST['numero'])) ? $_POST['numero'] : "";
$bairro = (isset($_POST['bairro'])) ? $_POST['bairro'] : "";
$cidade = (isset($_POST['cidade'])) ? $_POST['cidade'] : "";
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : "";
$cep = (isset($_POST['cep'])) ? $_POST['cep'] : "";
$idCliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : 0;

// Realizar as operações de CRUD

// Vamor iniciar com o CREATE que insere um registro no BD
if ($operacao_cliente == 'CREATE') {
    // Monta a declaração SQL onde os ? serão trocados pelas variaveis
    $sql = "INSERT INTO clientes (nome, cpf, email, celular, data_nascimento, rua, numero, bairro, cidade, estado, cep)";
    $sql .= " VALUES(?,?,?,?,?,?,?,?,?,?,?);";

    // Prepara a consulta SQL com Prepared Stetament
    $stmt = $conn->prepare($sql);

    // Atribui as variaveis as ?
    // s é de STRING
    // d é de DOUBLE
    // i é de INTEGER
    // A ordem das variaveis deve ser a mesma do INSERT
    $stmt->bind_param('ssssssissss', $nome, $cpf, $email, $celular, $data_nascimento, $rua, $numero, $bairro, $cidade, $estado, $cep);

    // Executa o código preparado no BD.
    $stmt->execute();

    // Caso queira o ID do registro inserido
    $id = $stmt->insert_id;

    // Fechar as conexões para evitar erros ou ataques.
    $stmt->close();
    $conn->close();

    // Volta para a lista de Clientes
    header("Location: http://localhost/projeto_php/clientes");
} else if ($operacao_cliente == 'UPDATE') {
    $sql = "UPDATE clientes SET nome = ?,";
    $sql .= " cpf = ?,";
    $sql .= " email = ?,";
    $sql .= " celular = ?,";
    $sql .= " data_nascimento = ?,";
    $sql .= " rua = ?,";
    $sql .= " numero = ?,";
    $sql .= " bairro = ?,";
    $sql .= " cidade = ?,";
    $sql .= " estado = ?,";
    $sql .= " cep = ?";
    $sql .= " WHERE id_cliente = ?;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssssssissssi',
        $nome,
        $cpf,
        $email,
        $celular,
        $data_nascimento,
        $rua,
        $numero,
        $bairro,
        $cidade,
        $estado,
        $cep,
        $idCliente
    );
    $stmt->execute();

    $stmt->close();
    $conn->close();

    // Volta para a lista de Clientes
    header("Location: http://localhost/projeto_php/clientes");
} else if ($operacao_cliente == 'DELETE') {
    $sql = "DELETE FROM clientes WHERE id_cliente = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idCliente);

    $stmt->execute();

    $stmt->close();
    $conn->close();
} else {
    // Se não vier nenhuma operação, voltar para o listar Produtos.
    header("Location: http://localhost/projeto_php/clientes");
}
