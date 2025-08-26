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

<h1>EDITAR CONTATO</h1>

<form method="POST" action="editarContatoSubmit.php">
    <input type="hidden" name="id" value="<?php echo $info['id'];?>"/>
    Nome: <br>
        <input type="text" name="nome" value="<?php echo $info['nome'];?>"/><br><br>
    Endereço: <br>
        <input type="text" name="endereco" value="<?php echo $info['endereco'];?>"/><br><br>
    E-mail: <br>
        <input type="mail" name="email" value="<?php echo $info['email'];?>"/><br><br>
    Telefone: <br>
        <input type="text" name="telefone" value="<?php echo $info['telefone'];?>"/><br><br>
    Rede Social: <br>
        <input type="text" name="redeSocial" value="<?php echo $info['redeSocial'];?>"/><br><br>
    Profissão: <br>
        <input type="text" name="profissao" value="<?php echo $info['profissao'];?>"/><br><br>
    Data de Nascimento: <br>
        <input type="date" name="dtNasc" value="<?php echo $info['dtNasc'];?>"/><br><br>
    Foto: <br>
        <input type="text" name="foto" value="<?php echo $info['foto'];?>"/><br><br>
    Ativo: <br>
        <input type="text" name="ativo" value="<?php echo $info['ativo'];?>"/><br><br>
    
    <input type="submit" value="SALVAR"/>
</form>

<?php 
    require 'inc/footer.inc.php';
?>