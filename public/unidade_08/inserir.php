<?php require_once("../../conexao/conexao.php"); ?>

<?php 
    // insercao no banco
    if (isset( $_POST["cidade"] )) {
        $nome       = $_POST["nometransportadora"];
        $endereco   = $_POST["endereco"];
        $telefone   = $_POST["telefone"];
        $cidade     = $_POST["cidade"];
        $estado     = $_POST["estado"];
        $cep        = $_POST["cep"];
        $cnpj       = $cnpj["cnpj "];
        

        $inserir    = "INSERT INTO transportadoras ";
        $inserir   .= "(nometransportadora, endereco, telefone, cidade, estadoID, cep, cnpj)";
        $inserir   .= "VALUES ('$nome', '$endereco', '$telefone,'$cidade', '$estado', '$cep', '$cnpj')"; 

        $operacao_inserir = mysqli_query($conecta,$inserir);
        if ( !$operacao_iserir) {
            die("Falha na inserçao");
        } else {
            header("location:listagem.php");
        }
    }

    //selecao de estados
     $estados        = " SELECT nome, estadoID FROM estados ";
     $linha_estados   = mysqli_query($conecta,$estados);

     if ( !$linha_estados ) {
         die("Erro no banco");
     }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/crud.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                <form action="inserir.php" method="POST">
                    <input type="text" name="nometrasnportadora" placeholder="Nome da transportadora">
                    <input type="text" name="endereco" placeholder="Endereço">
                    <input type="text" name="cidade" placeholder="Cidade">
                    <section name="estados">
                            <?php while($linha = mysqli_fetch_assoc($linha_estados) ) { ?>
                                <option value=" <?php echo $linha["estadoID"]; ?> ">
                                    <?php echo $linha["nome"]; ?>   
                            <?php } ?>  
                    </section>
                    <input type="text" name="telefone" placeholder="Telefone">
                    <input type="text" name="cep" placeholder="CEP">
                    <input type="text" name="cnpj" placeholder="CNPJ">
                    <input type="submit" value="inserir">
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