<?php
/**
 * Description of DALContato
 *
 * @author Larissa
 */
require_once './classes/Conexao.php';
require_once './classes/Contato.php';
class DALContato {
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
       // $this->conexao = new Conexao();
        
    }
    public function Inserir($contato){
        $sql = "INSERT INTO contato (nome, telefone) VALUES ('";
        $sql = $sql . $contato->getNome()."','";
        $sql = $sql .$contato->getTelefone()."')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query($sql);
        $this->conexao->Desconectar();
        
    }
    public function Alterar($contato){
        $sql = "UPDATE contato SET nome = '" . $contato->getNome().
        "', telefone = '" . $contato->getTelefone().
        "'WHERE id= " . $contato->getId();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query($sql);
        $this->conexao->Desconectar();
    }
    public function Excluir($id){
        $sql = "DELETE FROM contato WHERE id=$id ";
      //  echo $sql;
        $banco = $this->conexao->getBanco();
        $retorno = $banco->query($sql);
        $this->conexao->Desconectar();
        return $retorno;
    }
    public function Buscar($nome){
        $sql = "SELECT* FROM contato WHERE nome LIKE '" .$nome ."%'";
        //echo $sql;
        $this->conexao->Conectar();
        $banco = $this->conexao->getBanco();
        $retorno = $banco->query($sql);
        $this->conexao->Desconectar();
        return $retorno;
    }
    
    public function CarregaContato($id){
        $sql = "SELECT* FROM contato WHERE id = $id";
        $this->conexao->Conectar();
        $banco = $this->conexao->getBanco();
        $tabela = $banco->query($sql);
        $registro = $tabela->fetch_array();
        $contato = new Contato($registro["id"],$registro["nome"],$registro["telefone"]);
        $this->conexao->Desconectar();
        return $contato;
    }

}
