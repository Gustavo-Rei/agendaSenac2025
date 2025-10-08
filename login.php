<?php
    include 'inc/header.inc.php';
    include 'classes/contatos.class.php';
    include 'classes/funcoes.class.php';
        session_start();
        require 'classes/usuarios.class.php';

        if (!empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            $usuarios = new Usuarios();
            if($usuarios->fazerLogin($email, $senha)){
                header("Location: index.php");
                exit;
            }else {
                echo '<span style="color: red">'."Email e/ou senha incorretos!".'</span>';
            }
        }
?>

<h1>LOGIN</h1>
<form method="POST">
    Email: <br>
    <input type="email" name="email"><br><br>
    Senha: <br>
    <input type="password" name="senha"><br><br>
    <a href="esqueceuSenha.php">ESQUECEU SUA SENHA ANIMAL?</a><br>
    <input type="submit" value="Fazer Login">
</form>

<?php
 include 'inc/footer.inc.php';
?>   