<?php
class Conexao {
    private $host;
    private $user;
    private $pass;
    private $bank;
    private $banco;
    
    public function __construct($host ="localhost", $user = "root", $pass = "", $bank = "agenda") {
        $this->setHost($host);
        $this->setUser($user);
        $this->setPass($pass);
        $this->setBank($bank);
        $this->Conectar();
    }

    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getBank() {
        return $this->bank;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setBank($bank) {
        $this->bank = $bank;
    }
    public function Conectar(){
        $this->banco = new mysqli($this->getHost(),  $this->getUser(),  $this->getPass(),  $this->getBank());
        if($this->banco->connect_errno){
            die('Erro de conexão('.  $this->banco->connect_errno . '):' . $this->banco->connect_error);
            
        }
   
    }
    public function getBanco(){
        return $this->banco;
    }
    public function Desconectar(){
        $this->banco->close();
    }
}

