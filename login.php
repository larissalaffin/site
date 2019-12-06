<!DOCTYPE html>

<?php

  require_once('config/config.php');



  if (isset($_POST['submit'])) {

    $email = trim(strip_tags(htmlspecialchars($_POST['tMail'])));
    $senha = trim(strip_tags(htmlspecialchars(sha1(md5($_POST['tSenha'])))));

    try {

      $query = 'SELECT * FROM usuario WHERE email = :usuarioEmail AND senha = :usuarioSenha';
      $selectDados = $conexao -> prepare($query);

      $selectDados -> bindParam(':usuarioEmail', $email);
      $selectDados -> bindParam(':usuarioSenha', $senha);

      $selectDados -> execute();
      $quantidadeUsuarios = $selectDados -> rowCount();


      if ($quantidadeUsuarios > 0) {

        while ($row = $selectDados -> fetch(PDO::FETCH_ASSOC)) {

          /**
           * extract() transforms $row['databaseItem'] in $databaseItem
           */
          extract($row);

      

        }
        
        session_start();

          $_SESSION['estaLogado'] = time();
          $_SESSION['cod_usuario'] = $id;
          $_SESSION['usuario_nome'] = $nome_usuario;
          $_SESSION['usuario_email'] = $email;
          header('Location: usuario.php');


      } else {

      

        print "<p style='text-align: center;'>E-mail ou Senha incorretos.</p>";

      }

    } catch (PDOException $error) {

      print 'Conexão falhou! ' . $error -> getMessage();

    }

  }

?>

<html>
  <head>
    <link rel= "stylesheet" type="text/css" href="css/layout.css" />
    <link href="https://fonts.googleapis.com/css?family=BenchNine&display=swap" rel="stylesheet">

    <meta charset="utf-8">

    <title>WEB SITE DE GASTRONOMIA E SAÚDE</title>
  </head>


  <body>
    <div class="baixo3"> <!--fundo do site todo-->
      <div class="conteudoo">
        <div class="boxdoiss"> 
          <nav id="links">
            <p id="back-link"><a href="index.php">Voltar a Página Inicial </a></p>
          </nav>
                  
          <form method="POST" action="login.php">
            <fieldset id="usuario"> <legend> Login </legend>
              <p>E-mail:<input type="e-mail" name="tMail" id="cMail" size="20" maxlength="40" placeholder="email@com.br" type="cMail" required />  </p> </br>
            
              <p>Senha:<input type="password" name="tSenha" id="cSenha" size="8" maxlength="8" pattern="[a-zA-Z0-9]+" title="Usar números e letras somente" placeholder="8 dígitos" /> </p>

              <p style="text-align: center;"><button type="submit" name="submit" class="pure-button pure-button-primary">Entrar</button> </p>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>