<?php
include('includes/header.php');
?>

</head>
<body>
    <div class="container">

        <h1>Bem-vindo</h1>
        <p>Efetue  seu login para acessar o sistema.</p>
        <hr class="separator">

        <?php if(isset($_GET['err'])): ?>
            <div class="container">
                <div class="label label-danger">Erro: <?= $_GET['err']; ?></div>
                <br><br>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="container">
                <div class="label label-success"><?= $_GET['success']; ?></div>
                <br><br>
            </div>
        <?php endif; ?>

        <form action="login.php" method="post">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                </div>
            </div>

            <div class="container">
                <input type="submit" value="Autenticar" class="btn btn-success btn-lg">
            </div>
        </form>

    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>

