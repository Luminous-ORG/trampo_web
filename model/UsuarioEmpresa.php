<?php
    require_once("Conexao.php");
class UsuarioEmpresa{
 

    private $IdUsuarioEmpresa;
    private $nomeEmpresa;
    private $emailEmpresa;
    private $senhaEmpresa;
    private $cnpjEmpresa;

    private $cepEmpresa;
    private $estadoEmpresa;
    private $bairroEmpresa;
    private $cidadeEmpresa;  
    private $ruaEmpresa;
    private $numeroEmpresa;
    private $complementoEmpresa;
   
    private $celularEmpresa;
    private $telefoneEmpresa;

    private $nomeImagemEmpresa;
    private $caminhoImagemEmpresa;
    private $fotoEmpresaEmpresa;


    public function getIdUsuarioEmpresa(){
        return $this->IdUsuarioEmpresa;
    }
    public function getNomeEmpresa(){
        return $this->nomeEmpresa;
    }
    public function getEmailEmpresa(){
        return $this->emailEmpresa;
    }
    public function getSenhaEmpresa(){
        return $this->senhaEmpresa;
    }
    public function getCnpjEmpresa(){
        return $this->cnpjEmpresa;
    }

    public function getCepEmpresa(){
        return $this->cepEmpresa;
    }
    public function getEstadoEmpresa(){
        return $this->estadoEmpresa;
    }
    public function getBairroEmpresa(){
        return $this->bairroEmpresa;
    }
    public function getCidadeEmpresa(){
        return $this->cidadeEmpresa;
    }
    public function getRuaEmpresa(){
        return $this->ruaEmpresa;
    }
    public function getNumeroEmpresa(){
        return $this->numeroEmpresa;
    }
    public function getComplementoEmpresa(){
        return $this->complementoEmpresa;
    }

    public function getCelularEmpresa(){
        return $this->celularEmpresa;
    }
    public function getTelefoneEmpresa(){
        return $this->telefoneEmpresa;
    }

    public function getNomeImagemEmpresa(){
        return $this->nomeImagemEmpresa;
    }
    public function getCaminhoImagemEmpresa(){
        return $this->caminhoImagemEmpresa;
    }
    public function getFotoEmpresaEmpresa(){
        return $this->fotoEmpresaEmpresa;
    }


    public function setIdUsuarioEmpresa($IdUsuarioEmpresa){
        $this->IdUsuarioEmpresa = $IdUsuarioEmpresa;
    }
    public function setNomeEmpresa($nomeEmpresa){
        $this->nomeEmpresa = $nomeEmpresa;
    }
    public function setEmailEmpresa($emailEmpresa){
        $this->emailEmpresa = $emailEmpresa;
    }
    public function setSenhaEmpresa($senhaEmpresa){
        $this->senhaEmpresa = $senhaEmpresa;
    }
    public function setCnpjEmpresa($cnpjEmpresa){
        $this->cnpjEmpresa = $cnpjEmpresa;
    }

   
    public function setCepEmpresa($cepEmpresa){
        $this->cepEmpresa = $cepEmpresa;
    }
    public function setEstadoEmpresa($estadoEmpresa){
        $this->estadoEmpresa = $estadoEmpresa;
    }
    public function setBairroEmpresa($bairroEmpresa){
        $this->bairroEmpresa = $bairroEmpresa;
    }
    public function setCidadeEmpresa($cidadeEmpresa){
        $this->cidadeEmpresa = $cidadeEmpresa;
    }
    public function setRuaEmpresa($ruaEmpresa){
        $this->ruaEmpresa = $ruaEmpresa;
    }
    public function setNumeroEmpresa($numeroEmpresa){
        $this->numeroEmpresa = $numeroEmpresa;
    }
    public function setComplementoEmpresa($complementoEmpresa){
        $this->complementoEmpresa = $complementoEmpresa;
    }

    public function setCelularEmpresa($celularEmpresa){
        $this->celularEmpresa = $celularEmpresa;
    }
    public function setTelefoneEmpresa($telefoneEmpresa){
        $this->telefoneEmpresa = $telefoneEmpresa;
    }

    public function setNomeImagemEmpresa($nomeImagemEmpresa){
        $this->nomeImagemEmpresa = $nomeImagemEmpresa;
    }
    public function setCaminhoImagemEmpresa($caminhoImagemEmpresa){
        $this->caminhoImagemEmpresa = $caminhoImagemEmpresa;
    }
    public function setFotoEmpresaEmpresa($fotoEmpresaEmpresa){
        $this->fotoEmpresaEmpresa = $fotoEmpresaEmpresa;
    }



    public function cadastrar($UsuarioEmpresa){
        $con = Conexao::conectar();
        $stmt = $con->prepare("INSERT INTO tbEmpresa(nomeEmpresa,emailEmpresa,senhaEmpresa,cnpjEmpresa)
        VALUES (?,?,?,?)");
        $stmt->bindValue(1, $UsuarioEmpresa->getNomeEmpresa());
        $stmt->bindValue(2, $UsuarioEmpresa->getEmailEmpresa());
        $stmt->bindValue(3, $UsuarioEmpresa->getSenhaEmpresa());
        $stmt->bindValue(4, $UsuarioEmpresa->getCnpjEmpresa());
        $stmt->execute();

        $id = $con->lastInsertId();
        
        
        
        $stmt2 = $con->prepare("INSERT INTO tbEnderecoEmpresa(logradouroEnderecoEmpresa,numeroEnderecoEmpresa,
        complementoEnderecoEmpresa,cepEnderecoEmpresa,estadoEnderecoEmpresa,bairroEnderecoEmpresa,cidadeEnderecoEmpresa,idEmpresa)
        VALUES (?,?,?,?,?,?,?,?)");
        $stmt2->bindValue(1, $UsuarioEmpresa->getRuaEmpresa());
        $stmt2->bindValue(2, $UsuarioEmpresa->getNumeroEmpresa());
        $stmt2->bindValue(3, $UsuarioEmpresa->getComplementoEmpresa());
        $stmt2->bindValue(4, $UsuarioEmpresa->getCepEmpresa());
        $stmt2->bindValue(5, $UsuarioEmpresa->getEstadoEmpresa());
        $stmt2->bindValue(6, $UsuarioEmpresa->getBairroEmpresa());
        $stmt2->bindValue(7, $UsuarioEmpresa->getCidadeEmpresa());                   
        $stmt2->bindValue(8, $id);   

        $stmt2->execute();


        $stmt3 = $con->prepare("INSERT INTO tbContatoEmpresa(numeroTelefoneContatoEmpresa,numeroCelularContatoEmpresa,
        idEmpresa)
        VALUES (?,?,?)");
        $stmt3->bindValue(1, $UsuarioEmpresa->getTelefoneEmpresa());
        $stmt3->bindValue(2, $UsuarioEmpresa->getCelularEmpresa());
        $stmt3->bindValue(3, $id);   
        
        $stmt3->execute();


        $nomeImagemPadrao = "padrão";
        $caminhoImagemPadrao = "http://localhost/28-11-2TrampoSistema/img/padrao.png";

    
            
        

        $stmt4 = $con->prepare("INSERT INTO tbImagemPerfilEmpresa(nomeImagemPerfilEmpresa,caminhoImagemPerfilEmpresa,
        idEmpresa)
        VALUES (?,?,?)");
        $stmt4->bindValue(1, $UsuarioEmpresa->getNomeImagemEmpresa());
        $stmt4->bindValue(2, $UsuarioEmpresa->getCaminhoImagemEmpresa());
        $stmt4->bindValue(3, $id);   
        
        $stmt4->execute();

    }

    public function cadastrarImagemEmpresa($UsuarioEmpresa){
        $con = Conexao::conectar();
        
    $idEmpresaInfoAbacaxi = $UsuarioEmpresa->getIdUsuarioEmpresa();
    $nomeImagem = $UsuarioEmpresa->getNomeImagemEmpresa();
    $caminho = $UsuarioEmpresa->getCaminhoImagemEmpresa();

    $stmt = $con->prepare("INSERT INTO tbImagemPerfilEmpresa(nomeImagemPerfilEmpresa,caminhoImagemPerfilEmpresa,
        idEmpresa)
        VALUES (?,?,?)");
        $stmt->bindValue(1, $UsuarioEmpresa->getNomeImagemEmpresa());
        $stmt->bindValue(2, $UsuarioEmpresa->getCaminhoImagemEmpresa());
        $stmt->bindValue(3, $UsuarioEmpresa->getIdUsuarioEmpresa());   
        
        $stmt->execute();

    }

    public function exclusaoImagemEmpresa($UsuarioEmpresa){
        $con = Conexao::conectar();

        $id = $UsuarioEmpresa->getIdUsuarioEmpresa();
    
        
        

        $stmt = $con->prepare("delete from tbImagemPerfilEmpresa where idEmpresa='$id'");	
        $stmt ->execute();

        
    }

    public function alterarImagemEmpresa($UsuarioEmpresa){
        $con = Conexao::conectar();
        
        $idEmpresaInfoAbacaxi = $UsuarioEmpresa->getIdUsuarioEmpresa();
        $nomeImagem = $UsuarioEmpresa->getNomeImagemEmpresa();
        $caminho = $UsuarioEmpresa->getCaminhoImagemEmpresa();

        $stmt = $con->prepare("UPDATE tbImagemPerfilEmpresa set 
        nomeImagemPerfilEmpresa='$nomeImagem',caminhoImagemPerfilEmpresa='$caminho'
        where idEmpresa='$idEmpresaInfoAbacaxi'");	

        $stmt2 = $con->prepare("UPDATE tbVaga set 
        foto='$caminho' where idEmpresa='$idEmpresaInfoAbacaxi'");	

        $stmt2 ->execute();
        
        $stmt->execute();

    }

    

    public function logar($UsuarioEmpresa){
    $con = Conexao::conectar();    
    $emailUser = $UsuarioEmpresa->getEmailEmpresa();
    $senhaUser = $UsuarioEmpresa->getSenhaEmpresa();
    $checkLogado = 2;


    $stmt = $con -> prepare("Select * From tbEmpresa;");

    //echo ("$emailUser $senhaUser");

    $stmt -> execute();

    while($row = $stmt -> fetch(PDO::FETCH_BOTH)){

   // echo (" $row[2] $row[3] ");

    if($emailUser == $row[2] AND $senhaUser == $row[3]){
        
        session_start();
        $_SESSION['id-session'] = $row[0];
        $_SESSION['login-session'] = $emailUser;
        $_SESSION['senha-session'] = $senhaUser;

        $checkLogado = 1;
        header("Location:vagas.php");

        echo $_SESSION['id-session'];
        echo $_SESSION['login-session'];
        echo $_SESSION['senha-session'];
    }
    }
    if($checkLogado == 2){  
        header("Location:login.php");
    }

    


    }

    public function alterarInformacoesEmpresa($UsuarioEmpresa){
        $con = Conexao::conectar();

        $idEmpresa = $UsuarioEmpresa->getIdUsuarioEmpresa();

        $nomeEmpresa = $UsuarioEmpresa->getNomeEmpresa();
        $email = $UsuarioEmpresa->getEmailEmpresa();
        
        

        $stmt = $con->prepare("update tbEmpresa set nomeEmpresa='$nomeEmpresa',emailEmpresa='$email' where idEmpresa='$idEmpresa'");	

       $stmt->execute();
    }

    public function alterarInformacoesEnderecoEmpresa($UsuarioEmpresa){
        $con = Conexao::conectar();

        $idEmpresa = $UsuarioEmpresa->getIdUsuarioEmpresa();

        $logradouro = $UsuarioEmpresa->getRuaEmpresa();
        $numero = $UsuarioEmpresa->getNumeroEmpresa();
        $complemento = $UsuarioEmpresa->getComplementoEmpresa();
        $cep = $UsuarioEmpresa->getCepEmpresa();
        $estado = $UsuarioEmpresa->getEstadoEmpresa();
        $bairro = $UsuarioEmpresa->getBairroEmpresa();
        $cidade = $UsuarioEmpresa->getCidadeEmpresa();
        

        $stmt = $con->prepare("UPDATE tbEnderecoEmpresa SET 
        logradouroEnderecoEmpresa='$logradouro',numeroEnderecoEmpresa='$numero',
        complementoEnderecoEmpresa='$complemento', cepEnderecoEmpresa='$cep' ,
        estadoEnderecoEmpresa='$estado' , bairroEnderecoEmpresa='$bairro',
        cidadeEnderecoEmpresa='$cidade'  
        where idEmpresa='$idEmpresa'");	

       $stmt->execute();
    }

    public function alterarInformacoesContatoEmpresa($UsuarioEmpresa){
        $con = Conexao::conectar();

        $idEmpresa = $UsuarioEmpresa->getIdUsuarioEmpresa();

        $telefoneEmpresa = $UsuarioEmpresa->getTelefoneEmpresa();
        $celularEmpresa = $UsuarioEmpresa->getCelularEmpresa();
        

        $stmt = $con->prepare("update tbContatoEmpresa set 
        numeroTelefoneContatoEmpresa='$telefoneEmpresa',
        numeroCelularContatoEmpresa='$celularEmpresa' where idEmpresa='$idEmpresa'");	

        $stmt->execute();
    }

    public function BuscaInformacoes($UsuarioEmpresa){
        $con = Conexao::conectar();

        $querySelect = "SELECT * FROM tbEmpresa WHERE idEmpresa = ".$UsuarioEmpresa->getIdUsuarioEmpresa()."";
        $resultado = $con->query($querySelect);
        $lista = $resultado->fetch(PDO::FETCH_BOTH);
        return $lista;
    }

    public function BuscaImagem($UsuarioEmpresa){
        $con = Conexao::conectar();
        $querySelect = "SELECT * from tbImagemPerfilEmpresa WHERE idEmpresa =".$UsuarioEmpresa->getIdUsuarioEmpresa()."";	
        $stmtImagem = $con->query($querySelect);
        $rowImagem = $stmtImagem->fetch(PDO::FETCH_BOTH);
        return $rowImagem;
    }


    
}

 
 




?>