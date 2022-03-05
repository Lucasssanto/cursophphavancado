<header>
    <div id="header_central">
        <?php 
            if (isset( $_SESSION["user_portal"])){

                $user = $_SESSION["user_portal"];
                
                $saudacao         = " SELECT nomecompleto ";
                $saudacao        .= " FROM clientes ";
                $saudacao        .= " WHERE clienteID = {$user} ";
                $saudacao_login   = mysqli_query($conecta,$saudacao);

                    if( !$saudacao_login) {
                        die("Falha do banco de dados");
                    }

                    $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                    $nome           = $saudacao_login["nomecompleto"];
        ?>

            <div id="header_saudacao">
                <b>Seja bem vindo <?php echo $nome ?> |
                <a href="topo.php"> Sair </a>
                </b>

            </div>

        <?php   
                }
        ?>

        <img src="/avancado/public/_assets/logo_andes.gif">
        <img src="/avancado/public/_assets/text_bnwcoffee.gif">
    </div>
</header>