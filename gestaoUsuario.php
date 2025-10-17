<?php
    include 'inc/header.inc.php';
    include 'classes/usuarios.class.php'; 
    include 'classes/funcoes.class.php'; 

    $usuario = new Usuarios();
    $usuario->setUsuario($_SESSION['logado']);
    $fn = new Funcoes(); 
?>

<div class="container">
    <h1>Usuarios</h1>
    <div>
        <a href="adicionarUsuario.php" class="btn">Adicionar Usuario</a>
        <a href="index.php" class="btn">Voltar para Agenda</a>
        <a href="sair.php" class="btn"> Sair</a>
    </div>
    <table border="3" width="100%" >
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>PERMISSOES</th>
            <th>AÇÕES</th>
        </tr>
        <?php
        $lista = $usuario->listar();
        foreach($lista as $item):
        ?>
        <tbody>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['permissoes']; ?></td>
                <td>
                    <div>
                        <a href="editarUsuario.php?id=<?php echo $item['id']; ?>" class="btn">Editar</a>
                        <a href="excluirUsuario.php?id=<?php echo $item['id']; ?>" class="btn">Excluir</a>
                    </div>
                </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>

<?php
 include 'inc/footer.inc.php';
?>    