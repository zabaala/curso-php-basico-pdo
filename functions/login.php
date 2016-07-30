<?php

function verificaUsuarioLogado() {
    if( !isset($_SESSION['usuario'])) {
        $err = 'Usuário inválido. Verifique suas credenciais e tente novamente.';
        header('location: index.php?err=' . $err);
    }
}