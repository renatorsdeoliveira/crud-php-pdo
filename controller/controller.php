<?php
    require_once("models/classe-pessoa.php"); 
    $dados = new Pessoa("crud_pdo","localhost","root",""); 
    $erro['erro'] = '';
    // --- VERIFICAÇÃO PARA SABER SE CLICOU NO BOTÃO PARA CADASTRAR OU EDITAR
    if(isset($_POST['nome'])){

        // editar
        if(isset($_GET['editar']) && !empty($_GET['editar'])){
            $id = addslashes($_GET['editar']);
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);

            if(!empty($nome) && !empty($email) && !empty($telefone) ){
                
                $dados->atualizarDados($id, $nome, $email, $telefone);
                header('Location: index.php');
            
            }else{
                $erro['erro'] .= "Preecha todos os campos";
                return  $erro['erro'];
            }

        }
        // cadastrar
        else {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);

            if(!empty($nome) && !empty($email) && !empty($telefone) ){

                if(!$dados->inserir($nome, $email, $telefone)){
                    $erro['erro'] .= "Email já cadastrado";
                    return $erro['erro'];
                }
            
            }else{
                $erro['erro'] .= "Preecha todos os campos";
                return $erro['erro'];
            }
            
        }

    }

    //------ FUNÇÃO PARA DELETAR POR ID VIA GET
    if (isset($_GET['id'])) {
        $delete = addslashes($_GET['id']);
        $dados->delete($delete);
        header('Location: index.php');
    }
    
    //------ FUNÇÃO PARA EDITAR VIA GET
    if (isset($_GET['editar'])) {
        $update = addslashes($_GET['editar']);
        $auterar = $dados->buscarDados($update);
        
    }
?>  