<?php
// O Comando require insere o código de outro arquivo no atual.
// O Comando include faz o mesmo processo, porém, não torna a inserção obrigatória.
require '../template/header.php';
?>

<div class="row mb-4">
    <div class="col-sm-10">
        <h1 class="text-success">Cadastrar Cliente</h1>
    </div>

</div>

<div class="card text-bg-light mb-3">
    <div class="card-body">
        <form action="../crud/crud_clientes.php" method="post" class="row">
            <input type="hidden" name="operacao_cliente" value="CREATE">
            
            <div class="row">
				<div class="col">
					<label for="nome" class="form-label">Nome do Cliente</label>
					<input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do cliente...">
				</div>
				<div class="col-3">
					<label for="cpf" class="form-label">CPF</label>
					<input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o cpf do cliente...">
				</div>
				<div class="col">
					<label for="email" class="form-label">E-mail</label>
					<input type="email" class="form-control text-center" id="email" name="email" placeholder="Digite o email...">
				</div>
				<div class="col">
					<label for="data_nascimento" class="form-label">Data de Nascimento</label>
					<input type="date" class="form-control text-center" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000">
				</div>
            </div>
            <div class="row">
				<div class="col">
					<label for="celular" class="form-label">Celular</label>
						<input type="text" class="form-control" name="celular" id="celular" placeholder="Digite o celular...">
				</div>
				<div class="col">
					<label for="rua" class="form-label">Rua</label>
						<input type="text" class="form-control" name="rua" id="rua" placeholder="Digite o nome da rua...">
				</div>
				<div class="col">
					<label for="numero" class="form-label">Número</label>
						<input type="text" class="form-control" name="numero" id="numero" placeholder="Digite o numero do endereço...">
				</div>
				<div class="col">
					<label for="bairro" class="form-label">Bairro</label>
						<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o nome do bairro...">
				</div>
				</div>
				<div class="row">
				<div class="col">
					<label for="cidade" class="form-label">Cidade</label>
						<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a cidade...">
				</div>
				<div class="col">
					<label for="estado" class="form-label">Estado</label>
						<input type="text" class="form-control" name="estado" id="estado" placeholder="Digite o estado...">
				</div>
				<div class="col">
					<label for="cep" class="form-label">Cep</label>
						<input type="text" class="form-control" name="cep" id="cep">
				</div>
            </div>
            <!-- Botões abaixo do formulário -->
            <div class=" d-flex justify-content-between">
                <a href="http://localhost/projeto_php/clientes" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-90deg-left"></i>
                    Voltar
                </a>

                <button type="reset" class="btn btn-secondary">
                    <i class="bi bi-eraser"></i> Limpar
                </button>

                <button type="submit" class="btn btn-success">
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