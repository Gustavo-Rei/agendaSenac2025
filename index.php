<?php
 include 'inc/header.inc.php';
 include 'classes/contatos.class.php';

 $contatos = new Contatos();
?>

<h1>Agenda Senac 2025</h1>
<button><a href="adicionarContato.php">ADICIONAR</a></button>

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
            <td><?php echo $item['dtNasc']; ?></td>
            <td><?php echo $item['foto']; ?></td>
            <td><?php echo $item['ativo']; ?></td>
            <td>
                <a href="editarContato.php?id=<?php echo $item['id']?>">EDITAR</a>
                <a href="#">/ EXCLUIR</a>
            </td>
        </tr>
    </tbody>

    <?php
        endforeach;
    ?>
</table>

<?php
 include 'inc/footer.inc.php';
?>    
