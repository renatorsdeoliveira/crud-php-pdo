
<?php require_once('conteudo-fixo/header.php') ;?>


    <div class="container-fluid conteudo">
        <div class="row">
            <div class="col-md-4">
                
                <form action="" method="post" class="formulario">
                    <img src="assets/images/user.png" class="user" alt="">
                    <h2>Cadastro de pessoa</h2>
                    <div class="form-group">
                        <label for="nome"><i class="fa fa-user-o" aria-hidden="true"></i></label>
                        <input  class="control" type="text" placeholder="Digite seu nome" name="nome" value="<?php echo (isset($auterar)) ?  $auterar['nome'] : '' ?>" id="nome">
                    </div>
                   
                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i></label>
                        <input class="control" type="email"  placeholder="Digite seu e-mail" name="email"  value="<?php echo (isset($auterar)) ?  $auterar['email'] : '' ?>"id="email">
                    </div>

                    <div class="form-group">
                        <label for="telefone"><i class="fa fa-phone" aria-hidden="true"></i></label>
                        <input class="control" type="text" placeholder="Digite seu telefone" name="telefone"  value="<?php echo (isset($auterar)) ?  $auterar['telefone'] : '' ?>" id="telefone">
                    </div>
                    <?php echo "<p class='erro'>".$erro['erro']."</p>" ;?>
                    <input type="submit" class="btn btn-dark btn-submit " id="submit"  value="<?php echo (isset($auterar)) ?  "Atualizar"  : "Cadastrar" ?>" >

                </form>
            </div>
            <div class="col-md-8 tabela">
                <table class="table table-striped white text-center">
                    <thead>
                        <tr>
                        <th class="border-top-0 text-light bg-dark" scope="col">ID</th>
                        <th class="border-top-0 text-light bg-dark" scope="col">Nome</th>
                        <th class="border-top-0 text-light bg-dark" scope="col">E-mail</th>
                        <th class="border-top-0 text-light bg-dark" scope="col">Telefone</th>
                        <th class="border-top-0 text-light bg-dark" scope="col"></th>

                        </tr>
                    </thead>

                    <tbody>                    
                        <?php
                            $listar = $dados->listar();
                            if(count( $listar) > 0 ){  $i = 1;
                                foreach ($listar as  $pessoa) {  ?>
                                
                                <tr>
                                    <td class="align-middle"><?= $i;?></td>
                                    <td class="align-middle"><?= $pessoa["nome"] ;?></td>
                                    <td class="align-middle"><?= $pessoa["email"] ;?></td>
                                    <td class="align-middle"><?= $pessoa["telefone"] ;?></td>
                                    <td class="align-middle">
                                        <a href="index.php?editar=<?= $pessoa["id"] ;?>" class="btn btn-sm btn-warning">
                                            <span>Editar</span>
                                        </a>
                                        <a href="index.php?id=<?= $pessoa["id"] ;?>">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <span>Excluir</span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                        
                            <?php  $i++;} }else{
                                echo "<tr><td colspan='5'><p>Nenhum cadastro feito </p></td></tr>";
                        };  ?>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once('conteudo-fixo/footer.php') ;?>