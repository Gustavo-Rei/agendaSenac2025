<?php
    require 'inc/header.inc.php';
    include 'classes/usuarios.class.php';

    $usuario = new Usuarios();

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

    // permissões disponíveis
    $permissoesDisponiveis = ['adicionar', 'editar', 'excluir', 'super'];
    $permissoesUsuario = explode(',', $info['permissoes']); // string → array

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);

        // Se o campo senha for preenchido, aplica md5
        if (!empty($_POST['senha'])) {
            $senha = md5(addslashes($_POST['senha']));
        } else {
            $senha = $info['senha']; // mantém a senha antiga
        }

        $permissoes = implode(',', $_POST['permissoes']);

        $usuario->editar($id, $email, $nome, $senha, $permissoes);
        header("Location: gestaoUsuario.php");
        exit;
    }
?>

<div class="container">
    <h1 style="text-align:center; margin-bottom:20px;">Editar Usuário</h1>

    <form method="POST" class="form-contato">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $info['nome']; ?>" required />

        <label for="email">Email:</label>
        <input type="mail" id="email" name="email" value="<?php echo $info['email']; ?>" required />

        <label for="senha">Senha:</label>
        <div class="input-senha">
            <input type="password" id="senha" name="senha" placeholder="Digite uma nova senha (opcional)" />
            <span onclick="toggleSenha()" class="toggle-senha">👁</span>
        </div>
        
        <label>Permissões:</label>
        <div style="display:flex; flex-wrap:wrap; gap:15px; margin-top:5px;">
            <?php foreach($permissoesDisponiveis as $perm): ?>
                <label>
                    <input type="checkbox" name="permissoes[]" value="<?php echo $perm; ?>"
                    <?php echo in_array($perm, $permissoesUsuario) ? 'checked' : ''; ?>>
                    <?php echo ucfirst($perm); ?>
                </label>
            <?php endforeach; ?>
        </div>

        <input type="submit" value="Salvar" />
    </form>
</div>

<script>
function toggleSenha() {
    const input = document.getElementById("senha");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>

<?php 
    require 'inc/footer.inc.php';
?>
