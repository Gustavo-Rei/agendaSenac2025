<!-- TODO fazer verificao de checkbox para editar-->
<?php

    require 'inc/header.inc.php';
    include 'classes/usuario.class.php';

    $usuario = new Usuario();

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $info = $usuario->buscar($id);

        if (empty($info['email'])) {
            header("Location: /agendaSenac2025");
            exit;
        }
    } else {
        header("Location: /agendaSenac2025");
        exit;
    }

    //verificar permissoes
    $permissoesDisponiveis = ['adicionar', 'editar', 'excluir', 'super'];
    $permissoesUsuario = explode(',', $info['permissoes']); // transforma string em array

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $permissoes = implode(',', $_POST['permissoes']);
        $usuario->editar($id, $email, $nome, $senha, $permissoes);
        header("Location: gestaoUsuario.php");
    }
?>

<h1>EDITAR USUÁRIO</h1>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>"/> <br><br>

    Email: <br>
    <input type="email" name="email" value="<?php echo $info['email']; ?>"/> <br><br>

    Senha: <br>
    <input type="password" name="senha" value="<?php echo $info['senha']; ?>"/> <br><br>

    Permissões: <br>
    <?php foreach($permissoesDisponiveis as $perm): ?>
        <input type="checkbox" name="permissoes[]" value="<?php echo $perm; ?>"
        <?php echo in_array($perm, $permissoesUsuario) ? 'checked' : ''; ?>> <?php echo ucfirst($perm); ?>
    <?php endforeach; ?>
    <br><br>

    <input type="submit" value="Salvar" />
</form>