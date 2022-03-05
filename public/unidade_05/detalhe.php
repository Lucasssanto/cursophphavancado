<?php require_once("../../conexao/conexao.php"); ?>
<?php
    
    //testar parâmentro

    if( isset($_GET["codigo"]) ) {
        $produtoID = $_GET["codigo"];
    } else {
        header("location: listagem.php");
    }

    //consulta

    $consulta  = "SELECT * ";
    $consulta .= "FROM produtos ";
    $consulta .= " WHERE produtoID = {$produtoID} ";
   $detalhe    = mysqli_query($conecta,$consulta);

    
    if ( !$detalhe ) {
        die("Falha no Banco de dados");
    } else {
        $dados_detalhe = mysqli_fetch_assoc($detalhe);
        $produtoID        =   $dados_detalhe["produtoID"];
        $nomeproduto      =   $dados_detalhe["nomeproduto"];
        $descricao        =   $dados_detalhe["descricao"];
        $codigobarra      =   $dados_detalhe["codigobarra"];
        $tempoentrega     =   $dados_detalhe["tempoentrega"];
        $precorevenda     =   $dados_detalhe["precorevenda"];
        $precounitario    =   $dados_detalhe["precounitario"];
        $estoque          =   $dados_detalhe["estoque"];
        $imagemgrande     =   $dados_detalhe["imagemgrande"];
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
        <link href="_css/reset.css rel="stylesheet">
    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <img src="<?php echo $imagemgrande?>" >
                </ul>
                <ul>
                    <h2>
                        <?php echo $nomeproduto?>
                    </h2>
                </ul>
                <ul> 
                    <b>
                        <?php echo $descricao?>
                    </b>    
                </ul>
                <ul>
                    <b>Codigo de barra:
                        <?php echo $codigobarra?>
                    </b> 
                </ul>
                <ul>
                     <b>Tempo de entrega: 
                        <?php echo $tempoentrega?> Dias
                    </b> 
                </ul>
                <ul>
                    <b>Preço revenda:
                       <?php echo real_format($precorevenda)?>
                    </b> 
                </ul>
                <ul><b>Preço unitário:
                        <?php echo Real_format($precounitario)?>
                    </b>
                </ul>
                <ul><b> Estoque:
                        <?php echo $estoque?>
                    </b>
                </ul>
                
            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>