<?php

	session_start();

?>

<!DOCTYPE html>

<html lang="PT-BR">
	<head>
		<meta charset="UTF-8" />

		<link rel="stylesheet" type="text/css" href="css/userProfile.css" />
		<link href="https://fonts.googleapis.com/css?family=BenchNine&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

		<title>Usuário - Alteração</title>
	</head>

	<body>
		<div class="main-content">
			<div class="header-box">
				<div class="user-name-box">
					<h1> <?php print $_SESSION['usuario_nome']; ?> </h1>
				</div>

				<div class="edit-profile-box">
					<a href="update.php"> <i class="material-icons">edit</i> </a>
					<a href="delete.php"> <i class="material-icons">delete</i> </a>
				</div>

				<?php
				
					require_once('config/config.php');
					
					$select = 'SELECT * FROM usuario WHERE cod_usuario = :codigo';
					$selectData = $conexao -> prepare($select);
					
					$selectData -> bindValue(':codigo', $_SESSION['cod_usuario']);

					
					if ($selectData -> execute()) {

						while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

							extract($row);

							?>

							<div class="database-data">
								<p> <b>E-mail: </b> <?php print $usuario_email; ?> </p> 
								<p> <b>Data de Nascimento: </b> <?php print $usuario_data_nasc; ?> </p> 
								<p> <b>Finalidade: </b> <?php print $usuario_finalidade; ?> </p>
								<p> <b>Mensagem: </b> <?php print $usuario_mensagem; ?> </p>
								<p id="sair"> <a href="logout.php">SAIR</a> </p>
							</div>

							<?php

						}

					}
					
				?>

			</div>
		</div>
	</body>
</html>