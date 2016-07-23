<?php
include("includes/database-conn.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';

$titulo = 'Editar';

if(!$id) {
    $titulo = 'Criar';
}

// consulta pessoas
$query = $pdo->prepare("select * from pessoas where id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$pessoa = $query->fetch(PDO::FETCH_ASSOC);

include('includes/header.php');
?>

</head>
<body>
    <div class="container">

        <h1><?= $titulo; ?></h1>
        <hr class="separator">

        <form action="atualizar-pessoa.php" method="post">
            <input type="hidden" name="id" value="<?= $pessoa['id']; ?>">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?=$pessoa['nome']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome" value="<?=$pessoa['sobrenome']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="text" name="idade" id="idade" value="<?=$pessoa['idade']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <input type="text" name="sexo" id="sexo" value="<?=$pessoa['sexo']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" value="<?=$pessoa['email']?>" class="form-control">
                </div>
            </div>

            <div class="container">
                <input type="submit" value="Salvar" class="btn btn-success btn-lg">
                <a href="index.php" class="btn">cancelar</a>
            </div>
        </form>

    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>

