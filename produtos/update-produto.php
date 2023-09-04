<?php
// O Comando require insere o código de outro arquivo no atual.
// O Comando include faz o mesmo processo, porém, não torna a inserção obrigatória.
require '../template/header.php';
// Conectar com o Banco de dados
require '../util/conexao.php';

// Pega o ID que veio por GET
$id = $_GET['id'];

// Cria a consulta SQL
$sql = "SELECT * FROM produtos WHERE id_produto = $id";

// Executa a consulta no BD
$resultado = $conn->query($sql);

//Verifica se encontrou algum registro
if ($resultado->num_rows > 0) {
    // Se encontrou pega os dados e coloca cada um em uma variavel
    while ($item = $resultado->fetch_assoc()) {
        $nome = $item['nome'];
        $descricao = $item['descricao'];
        $origem = $item['origem'];
        $validade = $item['validade'];
        $estoqueMinimo = $item['estoque_minimo'];
        $estoqueAtual = $item['estoque_atual'];
        $valorUnitario = $item['valor_unitario'];
        $ativo = $item['ativo'];
    }
}
?>
<div class="row mb-4">
    <div class="col-sm-10">
        <h1 class="text-warning">Alterar Produto</h1>
    </div>

</div>

<div class="card text-bg-light mb-3">
    <div class="card-body">
        <form action="../crud/crud_produtos.php" method="post" class="row">
            <input type="hidden" name="operacao" value="UPDATE">
            <input type="hidden" name="id_produto" value="<?= $id ?>">
            <div class="mb-3 col-md-7">
                <label for="nome" class="form-label">Nome do Produto</label>
                <!-- Adiciona a propriedade value que recebe a variavel do campo -->
                <input value="<?= $nome ?>" type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do produto...">
            </div>
            <div class="col-md-2">
                <label for="origem" class="form-label">Origem</label>
                <select class="form-select" id="origem" name="origem">
                    <!-- Fazemos um IF para saber se devemos imprimir a propriedade selected em cada option 
                         Se o valor for igual ao value do campo, imprimimos selected, se não, não imprimos nada 
                         Precisamos fazer esse IF para cada option do select -->
                    <option <?= ($origem == 'N') ? 'selected' : '' ?> value="N" selected>Nacional</option>
                    <option <?= ($origem == 'I') ? 'selected' : '' ?> value="I">Importado</option>
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <label for="validade" class="form-label">Validade</label>
                <input value="<?= $validade ?>" type="date" class="form-control text-center" id="validade" name="validade" placeholder="00/00/0000">
            </div>
            <div class="col-md-1">
                <label for="ativo" class="form-label">Ativo</label>
                <div class="form-check form-switch mt-1">
                    <!-- Se a variavel ativo vier com 1, imprimimos checked, se não, não imprimimos nada -->
                    <input <?= ($ativo) ? 'checked' : '' ?> class="form-check-input" type="checkbox" role="switch" name="ativo" id="ativo" checked>
                </div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="descricao" class="form-label">Descrição do Produto</label>
                <textarea class="form-control" id="descricao" rows="3" name="descricao"><?= $descricao ?></textarea>
            </div>
            <div class="mb-3 col-md-4">
                <label for="estoque_minimo" class="form-label">Estoque Mínimo</label>
                <input value="<?= $estoqueMinimo ?>" type="number" step="0.01" class="form-control text-end" id="estoque_minimo" placeholder="0.00" name="estoque_minimo">
            </div>
            <div class="mb-3 col-md-4">
                <label for="estoque_atual" class="form-label">Estoque Atual</label>
                <input value="<?= $estoqueAtual ?>" type="number" step="0.01" class="form-control text-end" id="estoque_atual" placeholder="0.00" name="estoque_atual">
            </div>
            <div class="mb-3 col-md-4">
                <label for="valor_unitario" class="form-label">Valor Unitário</label>
                <input value="<?= $valorUnitario ?>" type="number" step="0.01" class="form-control text-end" id="valor_unitario" placeholder="0.00" name="valor_unitario">
            </div>

            <div class=" d-flex justify-content-between">
                <a href="http://localhost/projeto_php/produtos" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-90deg-left"></i>
                    Voltar
                </a>

                <button type="reset" class="btn btn-secondary">
                    <i class="bi bi-eraser"></i> Limpar
                </button>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-check-lg"></i> Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require '../template/footer.php';
?>
</body>
</html>