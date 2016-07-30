<?php
include("includes/database-conn.php");
include("functions/login.php");

// verifica se há sessions ativas para o usuário
verificaUsuarioLogado();

$search = isset($_GET['search']) ? $_GET['search'] : '';

$where = '';

if (!empty($search)) {
    $where = " where concat(nome, ' ', sobrenome) like '%${search}%' or email like '%${search}%' or id = '$search' ";
}

// consulta pessoas
$query = $pdo->query("select id, nome, sobrenome, email from pessoas ${where} order by nome asc");

include('includes/header.php');
?>

</head>
<body>
    <div class="container">

        <h1>Todas as Pessoas <a href="editar-pessoa.php" class="btn btn-success btn-sm pull-right">Nova Pessoa</a></h1>
        <hr class="separator">

        <form action="?" method="get">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="search">Pesquisar:</label>
                        <input type="text" name="search" id="serch" value="<?= $search; ?>" placeholder="Digite uma palavra-chave e pressione enter..." class="form-control">
                    </div>
                </div>
            </div>
        </form>

        <table class="table" width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>#</th>
            </tr>
            </thead>

            <tbody>
            <? while($pessoa = $query->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><a href="exibir-pessoa.php?id=<?= $pessoa['id']?>"><?= $pessoa['id']; ?>. <?= $pessoa['nome']; ?></a></td>
                    <td><a href="exibir-pessoa.php?id=<?= $pessoa['id']?>"><?= $pessoa['sobrenome']; ?></a></td>
                    <td><a href="exibir-pessoa.php?id=<?= $pessoa['id']?>"><?= $pessoa['email']; ?></a></td>
                    <td>
                        <smal>
                            <a href="editar-pessoa.php?id=<?= $pessoa['id']?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="delete-pessoa.php?id=<?= $pessoa['id']?>" class="btn btn-danger btn-sm deletar"><i class="glyphicon glyphicon-trash"></i></a>
                        </smal>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php include('includes/footer.php'); ?>
    <script type="text/javascript">
        $('a.deletar').bind('click', function(e){
            ok = confirm('Deseja realmente deletar este registro?');

            if (!ok) {
                e.preventDefault();
            }
        })
    </script>
</body>
</html>

