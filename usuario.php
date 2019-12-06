<?php

    session_start();

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel= "stylesheet" type="text/css" href="css/layout.css" />
        <link href="https://fonts.googleapis.com/css?family=BenchNine&display=swap" rel="stylesheet">

        <meta charset="UTF-8" />

        <title>WEB SITE DE GASTRONOMIA E SAÚDE</title>
    </head>

    <body>
        <header class="topo">
            <h1>Gastronomia & Saúde</h1>
            <h3>since 2019</h3>
        
            <h2>SEJA BEM VINDO <a href="perfilUsuario.php" title="Visualizar Perfil"> <?php echo $_SESSION['usuario_nome']; ?> </a> </h2>
        </header>

        



        <div class="baixo"> <!--fundo do site todo-->
            <div class="conteudo"> <!--conteudo que contem as duas caixas-->
                <div class="boxum"> 
                    <div class = "opcao1">
                        <fieldset id="calendario"> <legend> Calendário Alimentar</legend>
                            <p>Clique no botão para ter acesso ao seu calendário alimentar, você poderá imprimi-lo e preenche-lo da forma que quiser</p>

                            <button type="submit" class="pure-button pure-button-primary">Link Aqui</button> </p>
                        </fieldset>
                    </div>

                    <div class = "opcao2">
                        <fieldset id="listasedicas"> <legend> Listas e Dicas</legend>
                            <p>Muitas listas e dicas para você seguir uma dieta ou melhorar sua alimentação. É só clicar no botão.</p>

                            <button type="submit" class="pure-button pure-button-primary">Link Aqui</button> </p>
                        </fieldset>
                    </div>
                    
                    <div class = "opcao3">
                        <fieldset id="receitas"> <legend> Receitas</legend>
                            <p>Receitas deliciosas que você irá poder experimentar sem sair da dieta. Clique no botão para mais!</p>

                            <button type="submit" class="pure-button pure-button-primary">Link Aqui</button> </p>
                        </fieldset>
                    </div>

                    <div class = "opcao4">
                        <fieldset id="listassalvas"> <legend> Listas Salvas</legend>
                            <p>Ao clicar no botão terá acesso as suas listas salvas</p>

                            <button type="submit" class="pure-button pure-button-primary">Link Aqui</button> </p>
                        </fieldset>
                    </div>


                    <div class = "opcao5">
                        <fieldset id="receitassalvas"> <legend> Receitas Salvas</legend>
                            <p>Ao clicar no botão terá acesso as receitas salvas</p>

                            <button type="submit" class="pure-button pure-button-primary">Link Aqui</button> </p>
                        </fieldset>
                    </div>

                    <div class = "opcao6">
                        <fieldset id="dicassalvas"> <legend> Dicas Salvas</legend>
                            <p> Ao clicar no botão terá acesso as dicas salvas</p>

                            <button type="submit" class="pure-button pure-button-primary">Link Aqui</button> </p>
                        </fieldset>
                    </div>

                    <!--
                    <div class = "mensagem">
                        <fieldset id="mensagem"> <legend> Mensagem </legend>
                            <p> Abaixo irá aparecer a mensagem deixada por você no formulário de cadastro</p>
                            <p> <?php //echo  $_SESSION['mensagem']?> </p>
                        </fieldset>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </body>
</html>