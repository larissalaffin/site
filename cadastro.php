<!DOCTYPE html>

<?php

  require_once('config/config.php');


  if (isset($_POST['submit'])) {

    if (empty($_POST['tNome_Usuario']) || empty($_POST['tMail']) || empty($_POST['tSenha']) || empty($_POST['tNasc']) || empty($_POST['tuso']) || empty($_POST['tMsg'])) {

      print "<p style=''text-align: center;>Preencha os campos, por favor.</p>";

    } elseif (trim($_POST['tSenha']) != trim($_POST['tCSenha'])) {

      print "<p style=''text-align: center;>Senhas não conferem. Por favor, insira senhas iguais.</p>";

    } else {
    
            
            
                $nomeUsuario = trim(strip_tags(htmlspecialchars($_POST['tNome_Usuario'])));
                $email = trim(strip_tags(htmlspecialchars($_POST['tMail'])));
                $senha = trim(strip_tags(htmlspecialchars(sha1(md5($_POST['tSenha'])))));
                $dataNasc = trim(strip_tags(htmlspecialchars($_POST['tNasc'])));
                $finalidade = trim(strip_tags(htmlspecialchars($_POST['tuso'])));
                $mensagem = trim(strip_tags(htmlspecialchars($_POST['tMsg'])));
                
                $selectEmail = 'SELECT nome_usuario FROM usuario WHERE email = :email';
                $selectData = $conexao -> prepare($selectEmail);
                
                $selectData -> bindParam(':email', $email);
                
                $selectData -> execute();
                $emailsCount = $selectData -> rowCount();
                
                
                if ($emailsCount > 0) {
                
                        print "<p style='text-align: center;'>E-mail já cadastrado, insira outro, por favor.</p>";
                
                } else {
                
                        $query = 'INSERT INTO usuario SET nome_usuario = :usuarioNome, email = :usuarioEmail, senha = :usuarioSenha, data_nascimento = :usuarioNasc, finalidade_uso = :usuarioFinalidade, mensagem = :usuarioMensagem';
                        $submitData = $conexao -> prepare($query);
                        
                        $submitData -> bindParam(':usuarioNome', $nomeUsuario);
                        $submitData -> bindParam(':usuarioEmail', $email);
                        $submitData -> bindParam(':usuarioSenha', $senha);
                        $submitData -> bindParam(':usuarioNasc', $dataNasc);
                        $submitData -> bindParam(':usuarioFinalidade', $finalidade);
                        $submitData -> bindParam(':usuarioMensagem', $mensagem);
                        
                        
                        if ($submitData -> execute()) {
                        
                                print "<p id='success-message'>Cadastro bem-sucedido! <a href='login.php'>Fazer login</a> </p>";
                               
                        } else {
                        
                                print "<p>Ocorreu um erro, tente novamente mais tarde.</p>";
                        
                        }

            
         
            
      }
      }
      }

?>
    
  

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link href="https://fonts.googleapis.com/css?family=BenchNine&display=swap" rel="stylesheet">

    <meta charset="UTF-8" />

    <title>WEB SITE DE GASTRONOMIA E SAÚDE</title>
  </head>

  <body>
    <div class="baixo3"> <!--fundo do site todo-->
      <div class="conteudoo">
        <div class="boxumm">
          <form action="cadastro.php" method="post">
            <fieldset id="usuario"> <legend> CADASTRE-SE</legend>
              <p>Informações para Cadastro</p>
                <br>
                <p>
                  Nome: <input type="text" name="tNome_Usuario" id="cNome" maxlength="200" placeholder="Nome completo" type="text" required=""/> 
                  E-mail:<input type="email" name="tMail" id="cMail" maxlength="200" placeholder="email@com.br" type="email" required />
                </p>
              <!--tamanho da caixa, número de caracteres,dica do que vai dentro da caixa e campo do nome é obrigatório preenchimento--> 
                <br>
                <p>
                    Senha: <input type="password" name="tSenha" placeholder="Senha" id="password" maxlength="8" required>
                    Conf. Senha: <input type="password" name="tCSenha" placeholder="Confirme Senha" maxlength="8" id="confirm_password" required>
                </p>
<br>
              <p>Data Nasc.:<input type="date" name="tNasc" maxlength="100" id="cNasc">
                 Finalidade de Uso:<input type="text" name="tuso" id="cuso" maxlength="200" placeholder="Opções" list="opcoes" /> </p>
                  <datalist id="opcoes">
                  <option value="Emagrecer"></option>
                  <option value="Manter alimentação saudável"></option>  
                  <option value="Dieta"></option>
                </datalist>

                <br>
              
              <p> Mensagem:<br> <textarea name="tMsg" id="cMsg" cols="35" rows="5" placeholder="Deixe aqui sua mensagem" maxlength="600"> </textarea> </p>

                <br>
                
              <p style="text-align: center;"> <button type="submit" name="submit" class="pure-button pure-button-primary">Confirmar</button> </p>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>