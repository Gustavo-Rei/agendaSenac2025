<?php
    include 'classes/contatos.class.php';

    $contatos = new Contatos();

    if(!empty($_POST['email'])){
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $redeSocial = $_POST['redeSocial'];
        $profissao = $_POST['profissao'];
        $dtNasc = $_POST['dtNasc'];
        $foto = $_POST['foto'];
        $ativo = $_POST['ativo'];
        $contatos -> adicionar($email, $nome, $endereco, $telefone, $redeSocial, $profissao, $dtNasc, $foto, $ativo);
        header('Location: index.php');
    } else {
        echo '<script type="text/javascript">alert("E-mail ja cadastrado")</script>';
    }