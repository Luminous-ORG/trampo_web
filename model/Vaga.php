<?php
    require_once("Conexao.php");
class Vaga{
 

    private $idVaga;
    private $nomeVaga;
    private $descricaoVaga;
    private $idEmpresa;
    private $dataVaga;
    private $requisito;
    private $salario;
    private $cargahoraria;

    private $nomeEmpresa;
    private $cidade;
    private $foto;


    public function getIdVaga(){
        return $this->idVaga;
    }
    public function getNomeVaga(){
        return $this->nomeVaga;
    }
    public function getDescricaoVaga(){
        return $this->descricaoVaga;
    }
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    public function getDataVaga(){
        return $this->dataVaga;
    }
    public function getNomeEmpresa(){
        return $this->nomeEmpresa;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getCargahoraria(){
        return $this->cargahoraria;
    }


    public function getRequisito(){
        return $this->requisito;
    }
    public function getSalario(){
        return $this->salario;
    }
    public function getFoto(){
        return $this->foto;
    }


    public function setIdVaga($idVaga){
        $this->idVaga = $idVaga;
    }
    public function setNomeVaga($nomeVaga){
        $this->nomeVaga = $nomeVaga;
    }
    public function setDescricaoVaga($descricaoVaga){
        $this->descricaoVaga = $descricaoVaga;
    }
    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa = $idEmpresa;
    }
    public function setDataVaga($dataVaga){
        $this->dataVaga = $dataVaga;
    }
    public function setRequisito($requisito){
        $this->requisito = $requisito;
    }
    public function setSalario($salario){
        $this->salario = $salario;
    }
    public function setCargahoraria($cargahoraria){
        $this->cargahoraria = $cargahoraria;
    }

    public function setNomeEmpresa($nomeEmpresa){
        $this->nomeEmpresa = $nomeEmpresa;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function setFoto($foto){
        $this->foto = $foto;
    }


    public function listar($Vaga){
        $con = Conexao::conectar();
        $querySelect = "SELECT * FROM tbVaga WHERE idEmpresa = ".$Vaga->getIdEmpresa()."";
        $resultado = $con->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrar($Vaga){
        $con = Conexao::conectar();
        $stmt = $con->prepare("INSERT INTO tbVaga(nomeVaga,requisitos,cargaHoraria,
        salario, descricaoVaga , idEmpresa  , dataVaga , nomeEmpresa , cidade , foto)
        VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindValue(1, $Vaga->getNomeVaga());
        $stmt->bindValue(2, $Vaga->getRequisito());
        $stmt->bindValue(3, $Vaga->getCargahoraria());
        $stmt->bindValue(4, $Vaga->getSalario());
        $stmt->bindValue(5, $Vaga->getDescricaoVaga());
        $stmt->bindValue(6, $Vaga->getIdEmpresa());
        $stmt->bindValue(7, $Vaga->getDataVaga());
        $stmt->bindValue(8, $Vaga->getNomeEmpresa());
        $stmt->bindValue(9, $Vaga->getCidade());
        $stmt->bindValue(10, $Vaga->getFoto());
        $stmt->execute();
    }

    public function alterar($Vaga){
        $con = Conexao::conectar();

        $idVagaInterm = $Vaga->getIdVaga();
        $nomeInterm = $Vaga->getNomeVaga();
        $requisitointer = $Vaga->getRequisito();
        $cargahorariainter = $Vaga->getCargahoraria();
        $salarionter = $Vaga->getSalario();
        $descricaoInterm = $Vaga->getDescricaoVaga();
        $dataVagaInterm = $Vaga->getDataVaga();

        $nomeEmpresainter = $Vaga->getNomeEmpresa();
        $cidadeinter = $Vaga->getCidade();
        $fotointer = $Vaga->getFoto();


        $stmt = $con->prepare("update tbVaga set nomeVaga='$nomeInterm',requisitos='$requisitointer',
        cargaHoraria='$cargahorariainter', salario='$salarionter', descricaoVaga='$descricaoInterm', dataVaga='$dataVagaInterm',
         nomeEmpresa='$nomeEmpresainter',
        cidade='$cidadeinter', foto='$fotointer' where idVaga='$idVagaInterm'");	

       $stmt->execute();
    }

    public function excluir($Vaga){
        $con = Conexao::conectar();
        $stmt = $con->prepare("delete from tbVaga where idVaga=".$Vaga->getIdVaga()."");	
	    $stmt ->execute();
    }

    public function editar(){

    }
}

?>