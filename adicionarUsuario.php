<?php

    require 'inc/header.inc.php';
    require 'classes/usuario.class.php';

    $usuario = new Usuario();
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $permissoes = implode(',',$_POST['permissoes']);
        $usuario->adicionar($email, $nome, $senha, $permissoes);
        header('Location: gestaoUsuario.php');
    }

?>

    <h1>CADASTRAR USUÁRIO</h1>

    <form method="POST" >
        Nome: <br>
        <input type="text" name="nome" /> <br><br>
        
        Email: <br>
        <input type="email" name="email" /> <br><br>
        
        Senha: <br>
        <input type="password" name="senha" /> <br><br>

        Permissões: <br>
        <input type="checkbox" name="permissoes[]" value="adicionar"> Adicionar
        <input type="checkbox" name="permissoes[]" value="editar"> Editar
        <input type="checkbox" name="permissoes[]" value="excluir"> Excluir
        <input type="checkbox" name="permissoes[]" value="super"> Super<br><br>

        <input type="submit" value="Salvar" />
    </form>
