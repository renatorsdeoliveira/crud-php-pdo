<?php

    class Pessoa{
        private $con;

        public function __construct($dbname, $host,  $user, $senha){
            try {
                $this->con = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $senha);
            } catch (Exception $e) {
                echo "Erro com a conexão do banco".$e->getMessage();
                die();
            } catch (Exception $e){
                echo "Erro Generico".$e->getMessage();
                die();
            }
        
        }

        public function listar(){
            $restorno = array();
            $sql = $this->con->query("SELECT * FROM pessoa ORDER BY id DESC");
            $restorno = $sql->fetchAll(PDO::FETCH_ASSOC);
            return  $restorno;
        }

        public function inserir($nome, $email, $telefone){
            $cmd = $this->con->prepare("SELECT id FROM pessoa WHERE email = :email");
            $cmd->bindValue(":email", $email);
            $cmd->execute();
    
            if($cmd->rowCount() > 0){
                return false;

            }else{
                $cmd = $this->con->prepare("INSERT INTO pessoa(nome, email, telefone)VALUES(:nome, :email, :telefone);");
                $cmd->bindParam(":nome", $nome);
                $cmd->bindParam(":email", $email);
                $cmd->bindParam(":telefone", $telefone);
                $cmd->execute();
                return true;
            }

        }

        public function delete($id){
            $cmd = $this->con->prepare("DELETE FROM pessoa WHERE id = :id");
            $cmd->bindParam(":id", $id);
            $cmd->execute();

        }

        public function buscarDados($id){
            $cmd = $this->con->prepare("SELECT * FROM pessoa WHERE id = :id");
            $cmd->bindParam(":id", $id);
            $cmd->execute();
            $resultado = $cmd->fetch(PDO::FETCH_ASSOC);

            return $resultado;

        }

        public function atualizarDados($id, $nome, $email, $telefone){

            $cmd = $this->con->prepare("UPDATE pessoa SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id ");
            $cmd->bindParam(":id", $id);
            $cmd->bindParam(":nome", $nome);
            $cmd->bindParam(":email", $email);
            $cmd->bindParam(":telefone", $telefone);
            $cmd->execute();
    
        }

    }


?>