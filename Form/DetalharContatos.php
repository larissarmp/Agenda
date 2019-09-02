<?php
    $contato = new Contato();
    if(isset($_POST['cadastrar'])){
        $nome =$_POST['nome'];
        $telefone =$_POST['telefone'];
        $conexao = new Conexao();
        $dalContato = new DALContato($conexao);
        $contato = new Contato(0, $nome, $telefone);
        $dalContato->Inserir($contato);
        $contato = new Contato();
    }
    
      if(isset($_POST['btalterar'])){
        $id = $_POST["id"];
        $nome =$_POST['nome'];
        $telefone =$_POST['telefone'];
        $conexao = new Conexao();
        $dalContato = new DALContato($conexao);
        $contato = new Contato($id, $nome, $telefone);
        $dalContato->Alterar($contato);
        $contato = new Contato();
    }

    if(isset($_GET["op"])&&$_GET["op"] == "excluir"){
        $conexao = new Conexao();
        $dalContato = new DALContato($conexao);
        $retorno = $dalContato->Excluir($_GET["id"]);
        if($retorno == TRUE){
            $msg = 'Excluído';
        ?>
            <!--<script> alert("Registro foi excluido com sucesso.")</script>;-->
        <?php
       
        }  else {
            $msg = 'Não excluído';
            ?>
            <!--<script>alert("Não foi possível excluir o registro");</script>-->
            <?php
        }echo $msg; 
    }
    
    if(isset($_GET["op"])&&$_GET["op"] == "alterar"){
        $conexao = new Conexao();
        $dalContato = new DALContato($conexao);
        $contato = $dalContato->CarregaContato($_GET["id"]);
        
    }
?>
<form method="post" action="index.php?pg=contato&op=listar">
    <p><label for="nome">Nome    </label><br>
    <input type="text" name="nome" value="<?php echo $contato->getNome();?>"></p>
    <p><label for="nome">Telefone</label><br>
        <input type="text" name="telefone" value="<?php echo $contato->getTelefone();?>"><br>
        <?php 
        if($contato->getId() == 0){
        ?>
        <input type="submit" name="cadastrar" value="Inserir"></p>
        <?php
        }  else {
        ?>
             <input type="submit" name="btalterar" value="Alterar">
             <input type="submit" name="tbcancelar" value="Cancelar">
             <input type="hidden" name="id" value="<?php echo $contato->getId();?>"
        <?php }
        ?>
</form>
<?php
    $valor = "";
    if(isset($_POST['buscar'])){
        $valor =$_POST['nome'];
    }
    ?>
<form method="post">
    <p><label for="nome">Informe o nome:</label><br>
    <input type="text" name="nome"><br>
    <input type="submit" name="buscar" value="Buscar"></p>
</form>
    
<form method="post" action="ListarContato.php">
    <hr>
    <label for="nome">Listagem de contatos</label>
    <input type="submit" value="Listar">
</form>

<table border="1">
  <tr> 
    <td>id</td>  
    <td>Nome</td>
    <td>Excluir</td>
    <td>Alterar</td>
  </tr>

<?php
   
    $conexao = new Conexao();
    $dalContato = new DALContato($conexao);
    $resultado =$dalContato->Buscar($valor);
    
    while ($registro = $resultado->fetch_array()){
        $linkexcluir = "index.php?pg=contato&op=excluir&id=".$registro["id"];
        $linkalterar = "index.php?pg=contato&op=alterar&id=".$registro["id"];
        ?>
        <tr>
            <td><?php echo $registro['id'];?></td>
            <td><?php echo $registro['nome']; ?></td>
            <td><a href="<?php echo $linkexcluir;?>">Excluir</a></td>
            <td><a href="<?php echo $linkalterar;?>">Alterar</a></td>
       </tr>
       <?php
       
    }?>
</table>



  
 
