<?php
require '../util/conexao.php';

/*
echo ('<pre>');
print_r($_POST);
exit();
*/

/*
No IF ternário, todo o código é feito em apenas 1 linha
1º fazemos a condição ()
2º Colocamos um ? e o que vai acontecer se a condição for verdadeira
3º Colocamos um : e o que vai acontecer se a condição for falsa.
*/
$operacao = (isset($_POST['operacao'])) ? $_POST['operacao'] : "";
$nome = (isset($_POST['nome'])) ? $_POST['nome'] : "";
$origem = (isset($_POST['origem'])) ? $_POST['origem'] : "";
$validade = (isset($_POST['validade'])) ? $_POST['validade'] : "";
$ativo = (isset($_POST['ativo'])) ? 1 : 0;
$descricao = (isset($_POST['descricao'])) ? $_POST['descricao'] : "";
$estoqueMinimo = (isset($_POST['estoque_minimo'])) ? $_POST['estoque_minimo'] : 0;
$estoqueAtual = (isset($_POST['estoque_atual'])) ? $_POST['estoque_atual'] : 0;
$valorUnitario = (isset($_POST['valor_unitario'])) ? $_POST['valor_unitario'] : 0;
$idProduto = (isset($_POST['id_produto'])) ? $_POST['id_produto'] : 0;

// Realizar as operações de CRUD

// Vamor iniciar com o CREATE que insere um registro no BD
if ($operacao == 'CREATE') {
    // Monta a declaração SQL onde os ? serão trocados pelas variaveis
    $sql = "INSERT INTO produtos (nome, descricao, origem, validade, estoque_atual, 
    estoque_minimo, valor_unitario, ativo)";
    $sql .= " VALUES(?,?,?,?,?,?,?,?);";

    // Prepara a consulta SQL com Prepared Stetament
    $stmt = $conn->prepare($sql);

    // Atribui as variaveis as ?
    // s é de STRING
    // d é de DOUBLE
    // i é de INTEGER
    // A ordem das variaveis deve ser a mesma do INSERT
    $stmt->bind_param('ssssdddi', $nome, $descricao, $origem, $validade, $estoqueAtual, $estoqueMinimo, $valorUnitario, $ativo);

    // Executa o código preparado no BD.
    $stmt->execute();

    // Caso queira o ID do registro inserido
    $id = $stmt->insert_id;

    // Fechar as conexões para evitar erros ou ataques.
    $stmt->close();
    $conn->close();

    // Volta para a lista de Produtos
    header("Location: http://localhost/projeto_php/produtos");
} else if ($operacao == 'UPDATE') {
    $sql = "UPDATE produtos SET nome = ?,";
    $sql .= " descricao = ?,";
    $sql .= " origem = ?,";
    $sql .= " validade = ?,";
    $sql .= " estoque_atual = ?,";
    $sql .= " estoque_minimo = ?,";
    $sql .= " valor_unitario = ?,";
    $sql .= " ativo = ?";
    $sql .= " WHERE id_produto = ?;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssssdddii',
        $nome,
        $descricao,
        $origem,
        $validade,
        $estoqueAtual,
        $estoqueMinimo,
        $valorUnitario,
        $ativo,
        $idProduto
    );
    $stmt->execute();

    $stmt->close();
    $conn->close();

    // Volta para a lista de Produtos
    header("Location: http://localhost/projeto_php/produtos");
} else if ($operacao == 'DELETE') {
    $sql = "DELETE FROM produtos WHERE id_produto = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idProduto);

    $stmt->execute();

    $stmt->close();
    $conn->close();
} else {
    // Se não vier nenhuma operação, voltar para o listar Produtos.
    header("Location: http://localhost/projeto_php/produtos");
}
