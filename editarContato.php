<?php 
    require 'inc/header.inc.php';
    include 'classes/contatos.class.php';
    $contatos = new Contatos();

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $info = $contatos->buscar($id);

        if (empty($info['email'])){
            header("Location: /agendaSenac2025");
            exit;
        }
    }else {
        header("Location: /agendaSenac2025");
        exit;
    }
?>
<div class="container">
    <h1>EDITAR CONTATO</h1>

    <form method="POST" action="editarContatoSubmit.php">
    <input type="hidden" name="id" value="<?php echo $info['id'];?>"/>

    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $info['nome'];?>"/>

    <label>Endereço:</label>
    <input type="text" name="endereco" value="<?php echo $info['endereco'];?>"/>

    <label>E-mail:</label>
    <input type="mail" name="email" value="<?php echo $info['email'];?>"/>

    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?php echo $info['telefone'];?>"/>

    <label>Rede Social:</label>
    <input type="text" name="redeSocial" value="<?php echo $info['redeSocial'];?>"/>

    <label>Profissão:</label>
    <input type="text" name="profissao" value="<?php echo $info['profissao'];?>"/>

    <label>Data de Nascimento:</label>
    <input type="date" name="dtNasc" value="<?php echo $info['dtNasc'];?>"/>

    <label>Foto (URL):</label>
    <input type="text" name="foto" value="<?php echo $info['foto'];?>"/>

    <label>Ativo:</label>
    <input type="text" name="ativo" value="<?php echo $info['ativo'];?>"/>

    <input type="submit" value="SALVAR"/>
</form>

</div>
<?php 
    require 'inc/footer.inc.php';
?>