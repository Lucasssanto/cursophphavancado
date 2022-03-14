<?php require_once("../../conexao/conexao.php"); ?>

<?php 
     if ( isset($_POST["cidade"]) ){
        $nome       = utf8_decode($_POST["nometransportadora"]);
        $endereco   = utf8_decode($_POST["endereco"]);
        $cidade     = utf8_decode($_POST["cidade"]);
        $estado     = $_POST["estados"];
        $cep        = $_POST["cep"];
        $cnpj       = $_POST["cnpj"];
        $telefone   = $_POST["telefone"];
        $tID        = $_POST["transportadoraID"];

         // Objeto para alterar
         $alterar = "UPDATE transportadoras ";
         $alterar .= "SET ";
         $alterar .= "nometransportadora = '{$nome}', ";
         $alterar .= "endereco = '{$endereco}', ";
         $alterar .= "cidade = '{$cidade}', ";
         $alterar .= "estadoID = {$estado}, ";
         $alterar .= "cep = '{$cep}', "; 
         $alterar .= "cnpj = '{$cnpj}', ";
         $alterar .= "telefone = '{$telefone}' ";
         $alterar .= "WHERE transportadoraID = {$tID} ";
         $operacao_alterar = mysqli_query($conecta, $alterar);
         if(!$operacao_alterar) {
             die("Erro na alteracao");   
         } else {
             header("location:listagem.php");   
         }

    }

      // Consulta a tabela de transportadoras
    $transp= "SELECT * ";
    $transp .= "FROM transportadoras ";
    if(isset($_GET["codigo"]) ) {
        $sid = $_GET["codigo"];
        $transp .= "WHERE transportadoraID = {$id} ";
    } else {
        $transp .= "WHERE transportadoraID = 1 ";
    }
    
    $con_transp = mysqli_query($conecta,$transp);
    if(!$con_transp) {
        die("Erro na consulta");
    }

    $info_transp = mysqli_fetch_assoc($con_transp);

    // consulta aos estados
    $estados = "SELECT * ";
    $estados .= "FROM estados ";
    $lista_estados = mysqli_query($conecta, $estados);
    if(!$lista_estados) {
       die("erro no banco"); 
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css rel="stylesheet">
    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                 <form>
                <h2>Alteração de transportadora</h2>

                <label for="nometransportadora">Nome transportadora</label>
                <input type="tex" value="<?php echo $info_transp["nometransportadora"]?> nome="nometransportadora">

                
                <label for="endereco">Endereço</label>
                <input type="text" value="<?php echo $info_transp ["endereco"]  ?>" name="endereco" id="endereco">

                <label for="cidade">Cidade</label>
                <input type="text" value="<?php echo info_transp ["cidade"]  ?>" name="cidade" id="cidade">

                <label for="estados">Estados</label>
                <select id="estados" name="estados"> 
                    <?php 
                        $meuestado = info_transp ["estadoID"];
                        while($linha = mysqli_fetch_assoc($lista_estados)) {
                            $estado_principal = $linha["estadoID"];
                            if($meuestado == $estado_principal) {
                    ?>
                        <option value="<?php echo $linha["estadoID"] ?>" selected>
                            <?php echo $linha["nome"] ?>
                        </option>
                    <?php
                            } else {
                    ?>
                        <option value="<?php echo $linha["estadoID"] ?>" >
                            <?php echo $linha["nome"] ?>
                        </option>                        
                    <?php 
                            }
                        }
                    ?>
                </select>

                <label for="cep">CEP</label>
                <input type="text" value="<?php echo info_transp ["cep"]  ?>" name="cep" id="cep">                    

                <label for="telefone">Telefone</label>
                <input type="text" value="<?php echo info_transp ["telefone"] ?>" name="telefone" id="telefone">                    

                <label for="cnpj">CNPJ</label>
                <input type="text" value="<?php echo info_transp ["cnpj"] ?>" name="cnpj" id="cnpj">                    

                <input type="hidden" name="transportadoraID" value="<?php echo info_transp ["transportadoraID"] ?>">
                <input type="submit" value="Confirmar alteração">    
                 </form>
            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>