<?php
include('includes/database-conn.php');
include("functions/login.php");

// verifica se há sessions ativas para o usuário
verificaUsuarioLogado();

$id = $_GET['id'];

$query = $pdo->prepare("delete from pessoas where id = :id");
$query->bindParam(':id', $id);

$msg = '';

try {
    $query->execute();
    $location = 'listagem-pessoas.php';
} catch (PDOException $e) {
    $msg = 'Erro\n' . $e->getMessage();
    $location = 'javascript:history.back()';
}

?>
<script>
    <? if($msg): ?>
        alert("<?=$msg?>");
    <? endif; ?>
    window.location = '<?=$location?>';
</script>
