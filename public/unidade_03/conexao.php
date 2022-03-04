<?php
    //passo1
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conecta =mysqli_connect( $servidor,$usuario,$senha,$banco);

    //passo 2
    if (mysqli_connect_errno()) {
        die("Conexão falhou:" . mysqli_connect_error());
    }

    //passo 3
    $consulta_produtos = "SELECT nomeproduto, precounitario, tempoentrega ";
    $consulta_produtos .= " FROM produtos" ;
   
    $produtos = mysqli_query($conecta, $consulta_produtos );

    if( !$produtos) {
        die("Falha na consulta ao banco de dados");
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
    </head>

    <body>
         <ol>
            <?php
                while ($registro = mysqli_fetch_assoc($produtos)) {
                    echo "<br>";
            ?>    
                <li><?php echo $registro["nomeproduto"]  ?></li>
            <?php       
                }
            ?>
         </ol>   

         <?php 
            mysqli_free_result($produtos);
         ?>
    </body>
</html>
<?php
    mysqli_close($conecta);
?>