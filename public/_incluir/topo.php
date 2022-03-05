<header>
    <div id="header_central">
        <?php 
            if (isset( $_SESSION["user_portal"])){

                $user = $_SESSION["user_portal"];
                
                $saudacao         = " SELECT nomecompleto ";
                $saudacao        .= " FROM clientes ";
                $saudacao        .= " WHERE clienteID = {$user}";
                $saudacao_login   = mysqli_query($conecta,$saudacao);
            }
        ?>

        <img src="/avancado/public/_assets/logo_andes.gif">
        <img src="/avancado/public/_assets/text_bnwcoffee.gif">
    </div>
</header>