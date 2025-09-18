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

<div class="container">
    <h1 style="text-align:center; margin-bottom:20px;">Cadastrar Usuário</h1>

    <form method="POST" class="form-contato">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required />

        <label for="email">Email:</label>
        <input type="mail" id="email" name="email" required />

        <label for="senha">Senha:</label>
        <div style="position:relative;">
            <input type="text" id="senha" name="senha" required placeholder="Digite a senha" />
            <span onclick="toggleSenha()" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer; color:#666; font-size:0.9em;">
                👁
            </span>
        </div>

        <label>Permissões:</label>
        <div style="display:flex; flex-wrap:wrap; gap:15px; margin-top:5px;">
            <label><input type="checkbox" name="permissoes[]" value="adicionar"> Adicionar</label>
            <label><input type="checkbox" name="permissoes[]" value="editar"> Editar</label>
            <label><input type="checkbox" name="permissoes[]" value="excluir"> Excluir</label>
            <label><input type="checkbox" name="permissoes[]" value="super"> Super</label>
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
    include 'inc/footer.inc.php';
?>
