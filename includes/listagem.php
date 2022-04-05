<?php 

$mensagem = '';
if(isset($_GET['status'])) {
    switch($_GET) {
        case 'success';
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break; 
        case 'error';
            $mensagem = 'div class="alert alert-danger"> Ação não executada!</div>';
            break;

    }
}

$resultados = '';
