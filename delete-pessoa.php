<?php
include('includes/database-conn.php');

$id = $_GET['id'];

$query = $pdo->prepare("delete from pessoas where id = :id");
$query->bindParam(':id', $id);

$msg = '';

try {
    $query->execute();
    $location = 'index.php';
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
