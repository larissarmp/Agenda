<?php
/**
 * Description of Contato
 *
 * @author Larissa
 */
class Contato {
    private $id;
    private $nome;
    private $telefone;
    public function __construct($id=0, $nome="", $telefone="") {
        $this->setId($id);
        $this->setNome($nome);
        $this->setTelefone($telefone);
    }
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
         
}
