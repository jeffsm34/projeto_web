﻿</div>
<footer class="container-fluid navbar-dark bg-dark fixed-bottom">
        <p class="text-white">Desenvolvido por Jefferson.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
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