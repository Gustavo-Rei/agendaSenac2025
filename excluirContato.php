<?php
    include 'classes/contatos.class.php';
    $con = new Contatos();

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $con->deletar($id);
        header('Location: /agendaSenac2025');
    } else {
        echo '<script type="text/javascript">alert("Erro ao excluir contato!!");</script>></script>';
        header('Location: /agendaSenac2025');
    }