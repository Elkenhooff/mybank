<?php

class Cidade{
    private $idCidade;
    private $nome;
    private $idEstado;
    private $clientes;
    private $agencias;

    public function setId($id){
        $this->idCidade = $id;
    }

    public function getId(){
        return $this->idCidade;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setIdEstado($idEstado){
        $this->idEstado = $idEstado;
    }

    public function getIdEstado(){
        return $this->idEstado;
    }

    public function setClientes($cliente){
        $this->clientes = $cliente;
    }

    public function getClientes(){
        return $this->clientes;
    }

    public function setAgencias($agencia){
        $this->agencias = $agencia;
    }

    public function getAgencias(){
        return $this->agencias;
    }

    public function inserir($nome, $idEstado, $clientes, $agencias) {
        require("conexaobd.php");
        $comando = "INSERT INTO cidade (NOME, IDESTADO, CLIENTES, AGENCIAS) VALUES (:nome, :idEstado, :clientes, :agencias)";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":nome", $nome);
        $resultado->bindParam(":idEstado", $idEstado);
        $resultado->bindParam(":clientes", $clientes);
        $resultado->bindParam(":agencias", $agencias);
        $resultado->execute();
        return ($resultado->rowCount() > 0) ? true : false;
    }

    public function alterar($idCidade, $nome, $idEstado, $clientes, $agencias) {
        require("conexaobd.php");
        $comando = "UPDATE cidade SET NOME=:nome, IDESTADO=:idEstado, CLIENTES=:clientes, AGENCIAS=:agencias WHERE IDCIDADE=:idCidade";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":idCidade", $idCidade);
        $resultado->bindParam(":nome", $nome);
        $resultado->bindParam(":idEstado", $idEstado);
        $resultado->bindParam(":clientes", $clientes);
        $resultado->bindParam(":agencias", $agencias);
        $resultado->execute();
        return ($resultado->rowCount() > 0) ? true : false;
    }

    public function excluir($idCidade) {
        require("conexaobd.php");
        $comando = "DELETE FROM cidade WHERE IDCIDADE=:idCidade";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":idCidade", $idCidade);
        $resultado->execute();
        return ($resultado->rowCount() > 0) ? true : false;
    }

    public function consultar($idCidade) {
        require("conexaobd.php");
        $comando = "SELECT * FROM cidade WHERE IDCIDADE=:idCidade";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":idCidade", $idCidade);
        $resultado->execute();
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($registro) {
            $this->idCidade = $registro['IDCIDADE'];
            $this->nome = $registro['NOME'];
            $this->idEstado = $registro['IDESTADO'];
            $this->clientes = $registro['CLIENTES'];
            $this->agencias = $registro['AGENCIAS'];
            return true;
        }
        return false;
    }

    public function listar() {
        require("conexaobd.php");
        $comando = "SELECT * FROM cidade ORDER BY NOME";
        $resultado = $conexao->prepare($comando);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>