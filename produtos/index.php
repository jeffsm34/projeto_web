<?php
require '../template/header.php';
// Busca o arquivo que faz conexão com o banco de dados
require '../util/conexao.php';

// Cria a consulta SQL para buscar os produtos.
$sql = "SELECT * FROM produtos";

// Executa a consulta no banco de dados
$resultado = $conn->query($sql);

?>

<div class="row mb-4">
    <div class="col-sm-10">
        <h1>Listar Produtos</h1>
    </div>
    <div class="col-sm-2 d-flex justify-content-end">
        <a href="http://localhost/projeto_php/produtos/create-produto.php" class="btn btn-success py-3" type="button">
            <i class="bi bi-plus-lg"></i> Adicionar
        </a>
    </div>
</div>
<div class="card text-bg-light mb-3">
    <div class="card-body">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Devemos deixar apenas uma linha da tabela que será usada para repetir conforme o BD -->
                <?php
                // Testa se veio alguma linha de informação do BD
                if ($resultado->num_rows > 0) {
                    // Se veio informação do BD, vamos percorrer cada linha com um WHILE
                    // o código abaixo pega cada item da lista e passa para a variavel $item
                    // Quando termina, ele automaticamente, retorna FALSE.
                    while ($item = $resultado->fetch_assoc()) {

                        // como estamos no meio do HTML precisamos fechar o PHP -> 
                ?>
                        <tr>
                            <th scope="row"><?php echo($item['id_produto']) ?></th>
                            <td><?= $item['nome'] ?></td>
                            <td class="text-end"><?= $item['estoque_atual'] ?> </td>
                            <td class="text-end"><?= $item['valor_unitario'] ?></td>
                            <td class="text-center">
                                <a href="update-produto.php?id=<?= $item['id_produto']?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="deletar(<?= $item['id_produto']?>)">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                <?php
                    } // fecha o while

                } // fecha o if do numero de linhas
                else{
                    // se não tiver nada na tabela do BD, exibe um aviso
                    echo("<tr><td colspan='5'>A tabela está vazia</td></tr>");
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<?php
require '../template/footer.php';
?>

    <script>
        function deletar(id) {
            if (confirm("Deseja realmente excluir o Produto: #" + id + "?")) {
                $.post("../crud/crud_produtos.php", {
                        id_produto: id,
                        operacao: "DELETE"
                    })
                    .done(function(data) {
                        alert("Produto Excluido!");
                        location.reload();
                    });
            }
            
        }
    </script>
</body>

</html>