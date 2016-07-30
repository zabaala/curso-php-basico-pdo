<?php

@session_start();

unset($_SESSION['usuario']);

header('location: index.php?success=Logout efetuado com sucesso.');