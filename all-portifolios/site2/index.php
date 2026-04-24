<?php
include_once("conexao.php");
$result_cursos = "SELECT * FROM cursos";
$resultado_cursos = mysqli_query($conn, $result_cursos);
$status = $_GET['status'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Catalogo de Cursos | Demo CRUD</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/site.css" rel="stylesheet">
</head>
<body>
	<div class="courses-shell" role="main">
		<div class="courses-card">
			<div class="courses-hero">
				<h1>Course Catalog Demo</h1>
				<p>
					Este subportfolio demonstra um CRUD simples em PHP e MySQL. A interface foi refinada para
					parecer mais organizada, mais atual e mais facil de validar visualmente.
				</p>
			</div>

			<?php if ($status === 'created') { ?>
				<div class="alert alert-success status-banner">Curso cadastrado com sucesso.</div>
			<?php } elseif ($status === 'updated') { ?>
				<div class="alert alert-success status-banner">Curso alterado com sucesso.</div>
			<?php } elseif ($status === 'deleted') { ?>
				<div class="alert alert-success status-banner">Curso apagado com sucesso.</div>
			<?php } elseif ($status === 'error') { ?>
				<div class="alert alert-danger status-banner">Nao foi possivel concluir a operacao.</div>
			<?php } ?>

			<div class="courses-toolbar">
				<h2>Lista de cursos</h2>
				<button type="button" class="btn btn-success btn-pill" data-toggle="modal" data-target="#myModalcad">Cadastrar novo curso</button>
			</div>

			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar curso</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="processa_cad.php" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label">Nome:</label>
									<input name="nome" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="control-label">Detalhes:</label>
									<textarea name="detalhes" class="form-control" rows="5" required></textarea>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success btn-pill">Cadastrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="table-wrap">
				<table class="table table-modern">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome do Curso</th>
							<th>Detalhes</th>
							<th>Acao</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) { ?>
							<tr>
								<td><?php echo (int) $rows_cursos['id']; ?></td>
								<td class="course-name"><?php echo htmlspecialchars($rows_cursos['nome']); ?></td>
								<td class="course-desc"><?php echo htmlspecialchars($rows_cursos['detalhes']); ?></td>
								<td>
									<div class="action-group">
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo (int) $rows_cursos['id']; ?>">Visualizar</button>
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo (int) $rows_cursos['id']; ?>" data-whatevernome="<?php echo htmlspecialchars($rows_cursos['nome'], ENT_QUOTES); ?>" data-whateverdetalhes="<?php echo htmlspecialchars($rows_cursos['detalhes'], ENT_QUOTES); ?>">Editar</button>
										<a href="processa_apagar.php?id=<?php echo (int) $rows_cursos['id']; ?>" class="btn btn-xs btn-danger">Apagar</a>
									</div>
								</td>
							</tr>

							<div class="modal fade" id="myModal<?php echo (int) $rows_cursos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title text-center" id="myModalLabel"><?php echo htmlspecialchars($rows_cursos['nome']); ?></h4>
										</div>
										<div class="modal-body">
											<p><strong>ID:</strong> <?php echo (int) $rows_cursos['id']; ?></p>
											<p><strong>Nome:</strong> <?php echo htmlspecialchars($rows_cursos['nome']); ?></p>
											<p><strong>Detalhes:</strong> <?php echo htmlspecialchars($rows_cursos['detalhes']); ?></p>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Editar curso</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="processa.php" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label">Nome:</label>
							<input name="nome" type="text" class="form-control" id="recipient-name" required>
						</div>
						<div class="form-group">
							<label class="control-label">Detalhes:</label>
							<textarea name="detalhes" class="form-control" id="detalhes-text" rows="5" required></textarea>
						</div>
						<input name="id" type="hidden" id="id_curso">
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger btn-pill">Alterar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget);
			var recipient = button.data('whatever');
			var recipientnome = button.data('whatevernome');
			var recipientdetalhes = button.data('whateverdetalhes');
			var modal = $(this);
			modal.find('.modal-title').text('ID do curso: ' + recipient);
			modal.find('#id_curso').val(recipient);
			modal.find('#recipient-name').val(recipientnome);
			modal.find('#detalhes-text').val(recipientdetalhes);
		});
	</script>
</body>
</html>
