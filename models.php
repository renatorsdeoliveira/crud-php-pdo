<?php

//--------------------- Conexão ------------------------------//

try {
    $con = new PDO("mysql:host=localhost; dbname=crud_pdo","root","");
} catch (PDOException $e) {
    echo "Erro com a conexão de do banco".$e->getMessage();
} catch(Exception $e){
    echo "Erro generico".$e->getMessage();
}


//--------------------- Insert ------------------------------//

// $comando = $con->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES(:nome, :telefone, :email)");

// $nome = "Joao";
// $telefone = "62 9932030-4050";
// $email = "joao@gmail.com";
// $comando->bindParam(":nome",$nome);
// $comando->bindParam(":telefone",$telefone);
// $comando->bindParam(":email",$email);
// $comando->execute();


//--------------------- Delete ------------------------------//

// $comando = $con->prepare("DELETE FROM pessoa WHERE id = :id");

// $id = "3";
// $comando->bindParam(":id",$id);


//--------------------- Update ------------------------------//

// $comando = $con->prepare("UPDATE pessoa set email= :email WHERE id = :id");

// $id = "3";
// $email = "teste@gmail.com";
// $comando->bindParam(":email",$email);
// $comando->bindParam(":id",$id);


//--------------------- Select  ------------------------------//

    $comando = $con->prepare("SELECT * FROM pessoa");
    $comando->execute();

    $resu = $comando->fetchAll(PDO::FETCH_ASSOC);
    print_r($resu);
    

   
?>