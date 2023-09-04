<?php

/*
 Para conectar no servidor de Banco de Dados (BD) precisamos:
    -> caminho do servidor (endereço)
    -> usuário do BD
    -> senha do BD
    -> nome do BD
Caso tenha sido alterada a porta padrão do BD, precisamos dela também.
*/

$servidor = 'localhost'; // Aqui vai o endereço do servidor
$usuario = 'root'; // Nome de Usuário do BD
$senha = ''; // Senha do BD
$bancoDeDados = 'sistema_php'; // Nome do BD

// Cria a conexão com o BD e salva na variavel $conn, passando os dados acima.
$conn = new mysqli($servidor, $usuario, $senha, $bancoDeDados);

// Verifica se ocorreu algum erro na conexão
if($conn->connect_error){
    die("Erro na conexão com o BD!" . $conn->connect_error);
}
