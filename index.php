<?php
    session_start();
    include 'inc/header.inc.php';
    include 'classes/contatos.class.php';
    include 'classes/funcoes.class.php';
    include 'classes/usuarios.class.php';

    if (!isset($_SESSION['logado'])){
        header ('location: login.php');
        exit;
    }

    $usuario = new Usuarios();
    $contatos = new Contatos();
    $fn = new Funcoes();
?>

<div class="container">
    <h1>Contatos</h1>
    <div class="button-group">
        <a href="adicionarContato.php" class="btn">Adicionar Contato</a>
        <a href="gestaoUsuario.php" class="btn">Gerenciar Contato</a>
        <a href="sair.php" class="btn"> Sair</a>
    </div>

    <table border="4" width="100%">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Rede Social</th>
            <th>Profissão</th>
            <th>Data de Nascimento</th>
            <th>Foto</th>
            <th>Ativo</th>
            <th>Ações</th>
        </tr>

        <?php
            $lista = $contatos->listar();
            foreach ($lista as $item):
        ?>

        <tbody>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['endereco']; ?></td>
                <td><?php echo $item['telefone']; ?></td>
                <td><?php echo $item['redeSocial']; ?></td>
                <td><?php echo $item['profissao']; ?></td>
                <td><?php echo $fn->dtNasc($item['dtNasc'], 2); ?></td>
                <td><?php echo $item['foto']; ?></td>
                <td><?php echo $item['ativo']; ?></td>
                <td>
                    <a href="editarContato.php?id=<?php echo $item['id']?>">EDITAR</a>
                    <a href="excluirContato.php?id=<?php echo $item['id']?>" onclick="return confirm('Você tem certeza que excluir este contato?')">| EXCLUIR</a>
                </td>
            </tr>
        </tbody>

        <?php
            endforeach;
        ?>
    </table>
</div>

<?php
    include 'inc/footer.inc.php';
?>    
