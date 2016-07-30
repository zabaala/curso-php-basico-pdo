<?php
include('includes/database-conn.php');
include("functions/login.php");

// verifica se há sessions ativas para o usuário
verificaUsuarioLogado();

$id         = $_POST['id'];
$nome       = $_POST['nome'];
$sobrenome  = $_POST['sobrenome'];
$idade      = $_POST['idade'];
$sexo       = $_POST['sexo'];
$email      = $_POST['email'];

$sql = "insert into pessoas (nome, sobrenome, idade, sexo, email, created_at) values (:nome, :sobrenome, :idade, :sexo, :email, now())";

if($id) {
    $sql = "update pessoas set nome = :nome, sobrenome = :sobrenome, idade = :idade, sexo = :sexo, email = :email, updated_at = now() where id = :id ";
}

$query = $pdo->prepare($sql);
$query->bindParam(':nome', $nome);
$query->bindParam(':sobrenome', $sobrenome);
$query->bindParam(':idade', $idade);
$query->bindParam(':sexo', $sexo);
$query->bindParam(':email', $email);

if ($id) {
    $query->bindParam(':id', $id);
}

try {
    $query->execute();
    $msg = 'Registro salvo com sucesso';
    $location = 'listagem-pessoas.php';
} catch (PDOException $e) {
    $msg = 'Erro\n' . $e->getMessage();
    $location = 'javascript:history.back()';
}

?>
<script>
    alert("<?=$msg?>");
    window.location = '<?=$location?>';
</script>
