<?php

class Estado {
    /* estado (IDESTADO, SIGLA, NOME, CIDADES) */
    private $idEstado;
    private $sigla;
    private $nome;
    private $cidades;

    public function getIdEstado(){
        return $this->idEstado;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getSigla(){
        return $this->sigla;
    }
    public function getCidades(){
        return $this->cidades;
    }

    public function setIdEstado($valor){
        $this->idEstado = $valor;
    }
    public function setNome($valor){
        $this->nome = $valor;
    }
    public function setSigla($valor){
        $this->sigla = $valor;
    }
    public function setCidades($valor){
        $this->cidades = $valor;
    }
    
    /* Implementar os metodos do CRUD */
    public function inserir($sigla,$nome){
        require ("conexaobd.php");
        $comando="INSERT INTO estado (SIGLA,NOME) VALUES (:sigla,:nome)";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":sigla",$sigla);
        $resultado->bindParam(":nome",$nome);
        $resultado->execute();
        return ($resultado->rowCount() > 0) ? true : false;

    }

    public function alterar($idEstado,$sigla,$nome){
        require ("conexaobd.php");
        $comando="UPDATE estado SET SIGLA=:sigla,NOME=:nome WHERE (IDESTADO=:idEstado);";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":idEstado",$idEstado);
        $resultado->bindParam(":sigla",$sigla);
        $resultado->bindParam(":nome",$nome);
        $resultado->execute();
        return ($resultado->rowCount() > 0) ? true : false;
}

    public function excluir($idEstado){
        require ("conexaobd.php");
        $comando="DELETE FROM estado WHERE (IDESTADO=:idEstado);";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":idEstado",$idEstado);
        $resultado->execute();
        return ($resultado->rowCount() > 0) ? true : false;
}
    public function consultar($idEstado){
        require ("conexaobd.php");
        $comando="SELECT IDESTADO, SIGLA, NOME, CIDADES FROM estado WHERE (IDESTADO=:idEstado);";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(":idEstado",$idEstado);
        $resultado->execute();
        foreach($resultado as $registro){
            $this->idEstado = $registro["IDESTADO"];
            $this->sigla = $registro["SIGLA"];
            $this->nome = $registro["NOME"];
            $this->cidades = $registro["CIDADES"];
        }
        return ($resultado->rowCount() > 0) ? true : false;
}

public function listar() {
    require("conexaobd.php");
    $comando = "SELECT IDESTADO, SIGLA, NOME, CIDADES FROM estado ORDER BY NOME;";
    try {
        $resultado = $conexao->prepare($comando);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        die("Erro na execução da consulta: " . $e->getMessage());
    }
}


}